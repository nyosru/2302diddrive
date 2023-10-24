<?php

namespace App\Livewire\Didrive;

use App\Models\didrive\log as logAlias;
use Livewire\Component;

class Log extends Component
{
    public function render()
    {

        $in = [];
        $in['logs'] = logAlias::
//            with(['user', 'phone', 'order_goods','order_goods.good'])->
//        limit(100)->
        orderByDesc('id')->
        paginate(100);

        return view('livewire.didrive.log', $in)
            ->layout('didrive.layouts.app');
    }
}
