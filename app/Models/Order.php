<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class)->withPivot('discount', 'amount');
    }
}
