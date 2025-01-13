<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu_items';
    protected $guarded = ['id'];

    protected $casts = [
        'featured' => 'boolean',
        'rating' => 'decimal:1'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
