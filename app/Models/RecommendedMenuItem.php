<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendedMenuItem extends Model
{
    use HasFactory;

    protected $table = 'recommended_menu_items';

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
    
}
