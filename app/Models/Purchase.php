<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use App\Events\ProductReachedLowStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Purchase extends Model
{
    use HasFactory,Notifiable;

    protected $fillable =[
        'name','category_id','price','quantity',
        'image','expiry_date','supplier_id',
    ];

    public function getNameAttribute($value)
    {
        return Str::of($value)->title();

    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }
   

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
