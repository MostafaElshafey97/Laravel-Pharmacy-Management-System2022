<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = [
        'purchase_id','price',
        'discount','description',
    ];

  
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('purchase_id', 'like', "%$search%");
        });
    }

   

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
}
