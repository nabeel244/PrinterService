<?php

namespace App\Http\Controllers\ShopOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function addRate(Request $request)
    {
        $this->validate($request, [
            'black_white' => 'required',
            'color' => 'required',
        ]);
        try {
            Rate::updateOrCreate([
                'user_id'   => Auth::user()->id,
            ], [
                'user_id' => Auth::user()->id,
                'color'     => $request->color,
                'black_white' => $request->black_white,

            ]);
            return redirect()->back()->with('success', 'Account Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
