<?php

namespace App\Http\Controllers\ShopOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrintFile;

class ShopOwnerController extends Controller
{




    public function myAccount()
    {
        $title = 'My Account';
        $user = User::with('rate')->where('id', auth()->user()->id)->first();
        return view('shop-owner.myAccount', compact('title', 'user'));
    }

    public function userInfo($id)
    {
        try {

            $title = 'User Information';
            $user = User::with(['printFiles' => function ($q) {
                // $q->where('shop_id', auth()->user()->id)->where('is_downloaded', 1)->get();
                $q->where('shop_id', auth()->user()->id)->get();
            }])->with('wallet')->where('id', $id)->first();

            return view('shop-owner.userInfo', compact('title', 'user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
