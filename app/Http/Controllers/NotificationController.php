<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notification()
    {
        try {
            auth()->user()->notifications->markAsRead();
            $title = 'Notification';
            if (auth()->user()->hasRole('admin')) {

                $notifications = json_decode(auth()->user()->notifications, true);
                return view('admin.notification', compact('title', 'notifications'));
            } elseif (auth()->user()->hasRole('shopOwner')) {

                $notifications = json_decode(auth()->user()->notifications, true);
                return view('shop-owner.notification', compact('title', 'notifications'));
            } else {

                $notifications = json_decode(auth()->user()->notifications, true);
                return view('user.notification', compact('title', 'notifications'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function countNotifications()
    {
        try {

            $total = auth()->user()->unreadNotifications->count();
            return response()->json([
                'success' => true,
                'total' => $total
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function markAsRead(Request $request)
    {
        try {

            auth()->user()->unreadNotifications
                ->when($request->has('id'), function ($q)  use ($request) {
                    return $q->where('id', $request->id);
                })->markAsRead();

            return response()->noContent();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
