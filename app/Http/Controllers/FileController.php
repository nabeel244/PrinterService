<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintFile;
use App\Models\Amount;
use App\Models\Wallet;
use App\Models\File;
use App\Models\User;
use App\Notifications\SendFileNotification;
use App\Notifications\UpdateFileStatusNotification;
use PDF;





class FileController extends Controller
{
    public function upload()
    {
        try {
            $title = 'Upload';
            // $files = PrintFile::with('file')->where('user_id', auth()->user()->id)->where('is_downloaded', '<>', 1)->orderBy('id', 'desc')->get();
            $files = File::with('printFiles')->where('user_id', auth()->user()->id)->where('is_downloaded', '<>', 1)->orderBy('id', 'desc')->get();

            return view('user.upload', compact('title', 'files'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function fileStatus()
    {
        try {
            $title = "File Status";
            $files = PrintFile::where('user_id', auth()->user()->id)->where('is_downloaded', '<>', 1)->orderBy('id', 'desc')->get();
            return view('user.fileStatus', compact('title', 'files'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateFileStatus(Request $request)
    {
        try {
            $updateFile = PrintFile::find($request->id);
            $user = User::find($updateFile->user_id);

            if ($updateFile->is_downloaded == 0) {
                $amount =   Amount::updateOrCreate(
                    [
                        'print_file_id'   => $updateFile->id,
                    ],
                    [
                        'user_id' => $updateFile->user_id,
                        'print_file_id'   => $updateFile->id,
                        'shop_id' => auth()->user()->id,
                        'deduct_money' =>  $updateFile->total


                    ]
                );
                if ($amount) {
                    $amount =   Wallet::updateOrCreate(
                        [
                            'user_id'   => $updateFile->user_id,
                        ],
                        [
                            'user_id' => $updateFile->user_id,
                        ]
                    );
                    $amount->decrement('total', $updateFile->total);
                }
            }
            $updateFile->update([
                'is_downloaded' => 1
            ]);
            File::where('id', $updateFile->file_id)->update([
                'is_downloaded' => 1
            ]);
            $user->notify(new UpdateFileStatusNotification($updateFile));
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteFile($id)
    {
        try {
            $file = File::find($id);
            $file->delete();
            return response()->json([
                'message' => 'Deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadFile(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        try {

            $pdftext = file_get_contents($request->file('file'));
            $num = preg_match_all("/\/Page\W/", $pdftext, $matches);   //get total number of pages of pdf

            $fileName = time() . auth()->user()->id . '.' . $request->file->extension();
            $request->file->move(public_path('files'), $fileName);

            $fileId = File::insertGetId([
                'name' => $fileName,
                'user_id' => auth()->user()->id,
                'num_of_pages' => $num,
                'num_of_copies' => 1,
                'original_name' => $request->file('file')->getClientOriginalName()
            ]);
            $file  = File::where('id', $fileId)->first();
            return response()->json([
                'success' => 'File uploaded successfully',
                'file' => $file,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function updateFile(Request $request)
    {

        try {

            $file = File::find($request->id);
            if ($request->data_value == 'num_of_copies') {
                $file->update([
                    'num_of_copies' => $request->update_value
                ]);
            } else if ($request->data_value == 'recto_verso') {
                $file->update([
                    'recto_verso' => $request->update_value == 0 ? 1 : 0
                ]);
            } else if ($request->data_value == 'color') {
                $file->update([
                    'color' => $request->update_value == 0 ? 1 : 0,
                    'black_white' => $request->update_value == 1 ? 0 : 0
                ]);
            } else if ($request->data_value == 'black_white') {
                $file->update([
                    'color' => $request->update_value == 1 ? 0 : 0,
                    'black_white' => $request->update_value == 0 ? 1 : 0
                ]);
            }


            return response()->json([
                'success' => true,
                'message' => 'Update File successfully!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function sendFile(Request $request)
    {

        try {
            $fielIds = $request->file_id;
            $files = '';
            foreach ($fielIds  as $key => $value) {
                $explode_id = array_map('intval', explode(',', $value));
                $ids =  array_values($explode_id);
                $get_files = File::whereIn('id', $ids)->get();
                $files = $get_files;
            }
            $total_files = $files->count();

            $data = [];
            foreach ($files as $file) {

                $data[] = [
                    'user_id' => auth()->user()->id,
                    'shop_id' => $request->shop_id,
                    'file_id' => $file->id,
                    'name' => $file->name,
                    'original_name' => $file->original_name,
                    'num_of_pages' => $file->num_of_pages,
                    'num_of_copies' => $file->num_of_copies,
                    'recto_verso' => $file->recto_verso,
                    'black_white' => $file->black_white,
                    'color' => $file->color,
                    'is_downloaded' => 0,
                    'total' => (int)$request->total / $total_files,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ];
            };
            PrintFile::insert($data);
            $shop = User::find($request->shop_id);
            $shop->notify(new SendFileNotification($total_files));
            return redirect()->route('user.file.status')->with('success', 'File Send Successfully To Shop');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function viewPdf($id)
    {
        try {

            $file = File::find($id);
            $path = public_path('files/' . $file->name);
            return response()->file($path);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
