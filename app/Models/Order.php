<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'commentary', 'delivery_type', 'street', 'house_number', 'flat_number', 'payment_type', 'total_payment'];

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'order_menu_items')
            ->withPivot('quantity'); // Добавляем поле quantity из pivot таблицы
    }
}
