<?php

namespace App\Livewire\Avtoas;

use App\Models\avtoas\Order;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersShow extends Component
{

    use WithPagination;

    public $menuActive = 'new';
    public $menuList = [
        'all' => [
            'name' => 'Все',
            'class' => 'info',
            'count' => 0
        ],
        'new' => [
            'name' => 'Новые',
            'class' => 'warning',
            'count' => 0],
        'start' => [
            'name' => 'В работе',
            'class' => 'primary',
            'count' => 0],
        'finish' => [
            'name' => 'Завершённые',
            'class' => 'success',
            'count' => 0],
        'cancel' => [
            'name' => 'Отменённые',
            'class' => 'secondary',
            'count' => 0]
    ];

    public $order_status = [
        //                (отправлено в работу,
        'injob',
        //принято,
        'prinyato',
        //сборка,
        'sborka',
        // доставка,
        'dostavke',
        //пришло в Пункт Выдачи,
        'inpostpoint',
        //выдано,
        'vudano',
        //отменено)
        'cancel'
    ];

    function __construct()
    {
        $this->refreshCounts();
    }

    public function refreshCounts(): void
    {

        try {
            $ee = Order::limit(1)->get();
        } catch (\Exception $ex) {
//            dd($ex);
            if (strpos($ex->getMessage(), 'Connection refused') !== false) {
                dd('ошибка конекта');
            }
        }


        foreach ($this->menuList as $s => $d) {
            try {
                $this->menuList[$s]['count'] = Order::where(function (Builder $query) use ($s) {
                    if ($s !== 'all') {
                        return $query->where('status', $s);
                    } else {
                        return $query;
                    }
                })
//            where('status', $s)
                    ->count()//                            ->get()
                ;
            } catch (\Exception $ex) {
                dd([2,$ex]);
                $this->menuList[$s]['count'] = 'x';
            }

        }

    }

    public function setMenuActive($a = 'all')
    {
        $this->menuActive = $a;
    }

    public function setOrderStatus(Order $order, $new_status)
    {


        if ($new_status == 'cancel') {
            $order->status = $new_status;
        } else if ($new_status == 'vudano') {
            $order->status = 'finish';
        } else {
            $order->status = 'start';
        }

        $order->order_status = $new_status;
        $order->save();

        $this->refreshCounts();

        return redirect()->back();
    }

    public function render()
    {

        $in = [];
        $in['range'] = [];
        foreach (range(0, 99) as $i) {
            $in['range'][] = $i;
        }

        $menuActive = $this->menuActive;

        try {
            $in['orders'] = Order::with(['user', 'phone'
                , 'order_goods', 'order_goods.good'])
//            ->append(['order_status_class_bg'])

                ->limit(20)

//            ->where('status', $this->menuActive)
                ->where(function (Builder $query) use ($menuActive) {
                    if ($this->menuActive !== 'all') {
                        return $query->where('status', $menuActive);
                    } else {
                        return $query;
                    }
                })->orderByDesc('id')
                ->paginate(20)//            ->get()
            ;
        } catch (\exception $ex) {
        }

        return view('livewire.avtoas.orders-show', $in);

    }
}
