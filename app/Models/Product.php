<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sku',
        'image_path',
        'is_active',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset($this->image_path) : null;
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2);
    }

    public function getFormattedStockAttribute()
    {
        return number_format($this->stock);
    }
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function getActiveStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }


}
