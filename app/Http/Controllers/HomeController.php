<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrintFile;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        try {

            $notifications = auth()->user()->unreadNotifications;
            $title = "Dashboard";
            if (auth()->user()->hasRole('admin')) {
                $title = "Dashboard";
                $shopOwners = User::where('user_type', 'shopOwner')->where('status', '!=', 'approved')->orderBy('id', 'desc')->get();
                return view('admin.index', compact('title', 'shopOwners', 'notifications'));
            } else if (auth()->user()->hasRole('user')) {

                return view('home', compact('title'));
            } else {
                $shopOwners = User::where('user_type', 'shopOwner')->where('status', '!=', 'approved')->orderBy('id', 'desc')->get();

                return view('shop-owner.index', compact('title', 'shopOwners'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function history()
    {
        $title = 'History';
        if (auth()->user()->hasRole('shopOwner')) {
            $files = PrintFile::with('user')->where('shop_id', auth()->user()->id)->orderBy('id', 'desc')->where('is_downloaded', 1)->get();
            return view('shop-owner.history', compact('title', 'files'));
        } else if (auth()->user()->hasRole('user')) {
            $files = PrintFile::where('user_id', auth()->user()->id)->where('is_downloaded', 1)->orderBy('id', 'desc')->get();
            // $files = PrintFile::with('user')->where('shop_id', auth()->user()->id)->orderBy('id', 'desc')->get();
            return view('user.history', compact('title', 'files'));
        }
    }
}
