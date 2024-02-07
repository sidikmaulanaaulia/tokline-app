<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;


class Produk extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [''];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_produk')
            ->saveSlugsTo('slug');
    }

    public function keranjang()
{
    return $this->hasMany(Keranjang::class);
}
    public function pemesanan()
{
    return $this->hasMany(Pemesanan::class);
}
    public function order()
{
    return $this->hasMany(Order::class);
}
public function produk_size()
{
    return $this->hasMany(Produk_size::class);
}
}
