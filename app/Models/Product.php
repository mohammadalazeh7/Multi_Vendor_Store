<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        "price",
        "compare_price",
        "quantity",
        "category_id",
        "store_id",
        "status",
    ];
    //
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, // Related Model
            "product_tag", // Pivot table name
            "product_id", // Fk in pivot table for the current model
            "tag_id", // Fk in pivot table for the related model
            'id', // Pk current model
            'id', // Pk related model
        );
    }
    protected static function booted()
    {
        static::addGlobalScope('store', new StoreScope());
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function scopeActive(Builder $builder)
    {
        return $builder->where('status', '=', 'active');
    }
    // Accessors
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset("uploads/products/default.png");
        }
        if(Str::startsWith($this->image,["http://","https://"])) {
            return $this->image;
        }

        return asset("storage/" . $this->image);
    }
    public function getSalePercentAttribute(){
        if (!$this->compare_price){
            return 0;
        }
        return number_format(100-(100*($this->price/$this->compare_price)),1);
    }
}
