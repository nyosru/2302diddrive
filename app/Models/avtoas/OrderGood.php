<?php

namespace App\Models\avtoas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderGood extends Model
{
    use HasFactory;

    /**
     * Соединение с БД, которое должна использовать модель.
     *
     * @var string
     */
    protected $connection = 'datas';

    protected $fillable = [
        'good_id',
//        'order_id',
        'order_a_id',
        'goodOrigin',
        'price',
        'kolvo'
    ];
    // protected $fillable = ['good_id'];

    /**
     * Получить запись, указанного заказа
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function good()
    {
        return $this->hasOne(Good::class , 'a_id', 'good_a_id');
    }

}
