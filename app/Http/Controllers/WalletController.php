<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\PrintFile;
use App\Models\Amount;
use Illuminate\Support\Facades\DB;
use App\Notifications\AddDeductMoneyNotification;

class WalletController extends Controller
{

    public function wallet()
    {
        $title = 'Wallet';
        $receivedAmounts = Amount::where('user_id', auth()->user()->id)->where('add_money', '>', 0)->orderBy('id', 'desc')->get();
        return view('user.receivedMoneyDetail', compact('title', 'receivedAmounts'));
    }

    public function documents()
    {
        $title = 'Documents';
        $files = PrintFile::with('user')->where('shop_id', auth()->user()->id)->orderBy('id', 'desc')->where('is_downloaded', 0)->get();
        return view('shop-owner.document', compact('title', 'files'));
    }
    public function receivedMoneyDetail($id)
    {
        $title = 'Received Money';
        $receivedAmounts = Amount::where('user_id', $id)->where('add_money', '>', 0)->orderBy('id', 'desc')->get();
        return view('user.receivedMoneyDetail', compact('title', 'receivedAmounts'));
    }
    public function addMoney(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'add_amount' => 'required|integer'
        ]);
        try {
            $amount = (int)$request->add_amount;
            $shop = auth()->user();
            $user = User::find($request->user_id);
            Amount::insert([
                'user_id' => $request->user_id,
                'shop_id' => $shop->id,
                'add_money' => (int)$request->add_amount,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

            // Wallet::where('user_id', $request->user_id)->increment('total', $amount);
            if (Wallet::where('user_id', $request->user_id)->exists()) {
                Wallet::where('user_id', $request->user_id)->increment('total', $amount);
            } else {
                Wallet::create(['user_id' => $request->user_id, 'total' => $amount]);
            }
            $notification  = $shop->name . ' Added ' . $amount . '$ In Your Account';
            $user->notify(new AddDeductMoneyNotification($notification));
            DB::commit();
            return redirect()->back()->with('success', 'Amount Added Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deductMoney(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'deduct_money' => 'required|integer'
        ]);
        $deduct_money = (int)$request->deduct_money;
        $shop = auth()->user();
        $user = User::find($request->user_id);
        try {
            Amount::insert([
                'user_id' => $request->user_id,
                'shop_id' => $shop->id,
                'deduct_money' => $deduct_money,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            Wallet::where('user_id', $request->user_id)->decrement('total', $deduct_money);
            if (Wallet::where('user_id', $shop->id)->exists()) {
                Wallet::where('user_id', $shop->id)->increment('total', $deduct_money);
            } else {
                Wallet::create(['user_id' => $shop->id, 'total' => $deduct_money]);
            }
            $notification  = $shop->name . ' Deduct ' . $deduct_money . '$ From Your Account';
            $user->notify(new AddDeductMoneyNotification($notification));
            DB::commit();
            return redirect()->back()->with('success', 'Amount Deducted Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function addMoneyForm(Request $request)
    {
        $title = 'Add Money';
        $users =  User::with('wallet')->where('user_type', 'user')->where('status', '<>', 'blocked')->orderBy('id', 'desc')->get();
        return view('shop-owner.addMoney', compact('title', 'users'));
    }

    public function deductMoneyForm(Request $request)
    {
        $title = 'Deduct Money';
        $users =  User::with('wallet')->where('user_type', 'user')->where('status', '<>', 'blocked')->orderBy('id', 'desc')->get();
        return view('shop-owner.deductMoney', compact('title', 'users'));
    }
}
