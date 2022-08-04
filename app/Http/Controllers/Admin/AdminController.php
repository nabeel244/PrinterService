<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use App\Models\PrintFile;
use App\Models\Amount;
use App\Notifications\UpdateStatusNotification;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Admin';
        return view('admin.index', compact('title'));
    }

    public function userDetail($id)
    {
        try {
            $title = 'User Detail';
            $user = User::with('printFiles')->where('id', $id)->first();

            return view('admin.userDetail', compact('title', 'user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function shopOwner(Request $request)
    {
        try {
            $title = 'Shop Owner';
            $shopOwners = User::where('user_type', 'shopOwner')->where('status', 'approved')->orderBy('id', 'desc')->get();
            return view('admin.shopOwner', compact('title', 'shopOwners'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function shopOwnerDetail($id)
    {
        try {
            $title = 'Shop Owner Detail';
            $shopOwner = User::with('wallet')->where('id', $id)->first();
            $files = PrintFile::where('shop_id', $shopOwner->id)->orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('admin.shopOwnerDetail', compact('title', 'shopOwner', 'files'));
    }

    public function paidMoneyDetail($id)
    {
        try {
            $title = 'Total Payed Money';
            $totalPaids = Amount::selectRaw('user_id , SUM(deduct_money) as "total"')->with('user')->where('shop_id', $id)
            ->whereNull('print_file_id')->where('deduct_money','>',0)->groupBy('user_id')->orderby('id', 'desc')->get();

            return view('admin.paidMoneyDetail', compact('title','totalPaids'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function shopToApprove()
    {
        try {
            $title = "Shop Owner to Approve";
            $shopOwners = User::where('user_type', 'shopOwner')->where('status', '!=', 'approved')->orderBy('id', 'desc')->get();
            return view('admin.shopToApprove', compact('title', 'shopOwners'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function users(Request $request)
    {
        try {
            $title = "Users";
            $users = User::where('user_type', 'user')->orderBy('id', 'desc')->get();
            return view('admin.users', compact('title', 'users'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateShopStatus(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'status' => $request->status
            ]);
            $notification = 'Admin ' . $request->status . ' you';
            $user->notify(new UpdateStatusNotification($notification));
            return redirect()->back()->with('success', 'Status Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
