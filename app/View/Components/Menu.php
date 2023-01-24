<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu as Menudata;

class Menu extends Component
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
        $menus = Menudata::with('frontChildTreeInfo')->where('status',1)->whereNull('parent_id')->get();    
        return view('components.menu', compact('menus'));
    }
}
