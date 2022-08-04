<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function selectShop(Request $request)
    {
        try {

            $title = "Select Shop";
            $user = auth()->user();
            if ($request->array_data == null) {
                return redirect()->back()->with('error', 'Please Select File For Send');
            } elseif ($user->latitude == '' or $user->longitude == '') {
                return redirect()->back()->with('error', 'Update Your Account Address For Find Nearest Shop');
            }

            $ids = explode(',', $request->array_data);

            $files = File::whereIn('id', $ids)->get();

            // **************** Get Distance Accourding Nearest User ***********************
            $shops  =  DB::table("users")->join('rates', 'users.id', '=', 'rates.user_id')->where('user_type', 'shopOwner')->where('status', 'approved');
            $shops  =  $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $user->latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $user->longitude . "))
                                + sin(radians(" . $user->latitude . ")) * sin(radians(latitude))) AS distance"));
            // $shops          =       $shops->having('distance', '<', 20);
            $shops   =       $shops->orderBy('distance', 'asc');
            $shops   =       $shops->get();


            return view('selectShop', compact('title', 'files', 'shops'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
