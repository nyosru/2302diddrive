<?php

namespace App\Models\avtoas;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Соединение с БД, которое должна использовать модель.
     *
     * @var string
     */
    protected $connection = 'datas';
//    protected $attributes = [];

    protected $fillable = [
        'user_id',
        'status'
    ];

    /**
     * Получить каталог
     */
    public function user()
    {
        // return $this->belongsTo(User::class, 'id', 'a_categoryid');
        return $this->belongsTo(User::class);
    }

    /**
     * Получить товары к заказу
     */
    public function order_goods()
    {
//        return $this->hasMany(OrderGood::class, 'good_id');
        return $this->hasMany(OrderGood::class);
    }

//    public function goods()
//    {
////        return $this->hasMany(OrderGood::class, 'good_id');
//        return $this->hasMany(Good::class);
//    }

    /**
     * телефон покупателя
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phone()
    {
        // return $this->belongsTo(User::class, 'id', 'a_categoryid');
        return $this->belongsTo(Phone::class, 'user_id', 'user_id');
    }

    /**
     * стиль для статуса
     * @return string
     */
    public function getStatusClassAttribute(): string
    {
        if ($this->status == 'cancel') {
            return 'bg-secondary';
        } else if ($this->status == 'finish') {
            return 'bg-success';
        } else if ($this->status == 'new') {
            return 'bg-warning';
        } else {
            return 'bg-info';
        }
////        } else {
//////            return $this->status . '_' . $this->order_status;
////        }
    }

    /**
     * сколько дней произошло от последних изменений
     * @return integer
     */
    public function getUpdateOldDaysAttribute()
    {
        return round((time() - strtotime($this->updated_at)) / 3600 / 24);
    }


}
