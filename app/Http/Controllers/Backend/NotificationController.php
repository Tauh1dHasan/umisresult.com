<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Message;

class NotificationController extends Controller
{
    public function read_view($model,$reference_id)
    {
        $notification = Notification::where([
            'model' => $model,
            'reference_id' => $reference_id
        ])->first();
        if (!$notification) {
            return back()->with('error', 'বিজ্ঞপ্তি পাওয়া যায়নি..!');
        }
        $query = Message::where([
            'group_id' => $reference_id
        ]);

        if(auth()->user()->roll_id > 1) {
            $query->where([
                'office_id' => auth()->user()->office_id,
                'role_id' => auth()->user()->roll_id
            ]);
        }
        
        $message = $query->first();
        if (!$message) {
            return back()->with('error', 'বার্তা খুঁজে পাওয়া যায় নি..!');
        }
        if(auth()->user()->role_id > 1) {
            if (!$notification->read_by) {
                
                $notification->read_by = auth()->user()->id;
                $notification->read_at = date('Y-m-d');
                $notification->save();
            }
        }
        
        $menu_expand = route('admin.notification.index');
        return view('backend.admin.notification.read_view', compact("notification","menu_expand","message"));
    }
}
