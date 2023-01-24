<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Notification as DataNotification;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $query = DataNotification::where([
            'model'=>'message'
        ])->whereNull('read_by');

        if (auth()->user()->role_id > 1) {
            $query->where([
                'role_id'=>auth()->user()->role_id,
                'office_id'=>auth()->user()->office_id
            ]);
        }
        
        $notifications = $query->latest()->paginate(4);
        return view('components.notification', compact('notifications'));
    }
}
