<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use App\Models\PrintFile;
use App\Mail\RemindUserMail;
use App\Notifications\RemindUserNotification;


class UserController extends Controller
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

    public function createAccount()
    {
        $title = 'Create Account';
        $user = auth()->user();

        return view('user.createAccount', compact('title', 'user'));
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'address' => 'required',
            'mobile' =>  'required|integer|unique:users,mobile,' . $id,
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'identifier' => $request->identifier,
                'address' => $request->address,
                'surname' => $request->surname,
                'mobile' => $request->mobile,
                'whatsapp_number' => $request->whatsapp_number,
                'email' => $request->email
            ]);
            return redirect()->back()->with('success', 'Account Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function searchUser(Request $request)
    {
        try {
            $title = 'Search Users';
            $view = 'shop-owner.' . $request->file;
            $users = User::where('name', 'LIKE', '%' . $request->name_code . '%')
                ->where('user_type', 'user')->where('status', '<>', 'blocked')
                ->orWhere('identifier', 'LIKE', '%' . $request->name_code . '%')->get();

            return view($view, compact('users', 'title'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function remindUser(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'date' => 'required'
        ]);
        try {
            $user = User::find($request->user_id);
            $notification = 'Reminder: Collect Your File ' . $request->file_name . ' at ' . $request->date . ' ' . $request->time . ' at ' . auth()->user()->name;
            $user->Notify(new RemindUserNotification($notification));
            \Mail::to($user->email)->send(new RemindUserMail($notification));
            return redirect()->back()->with('success', 'Send Reminder to user');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
