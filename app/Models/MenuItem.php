<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'weight', 'price', 'category_id', 'image_path', 'is_favourite'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('discount', 'amount');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
// $table->string('name');  // Имя блюда
//             $table->text('ingredients');  // Состав блюда
//             $table->integer('weight');  // Граммовка блюда
//             $table->decimal('price', 8, 2);  // Цена блюда
//             $table->string('image')->nullable();