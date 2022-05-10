<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name','email','phone','company',
        'address','product','description'
    ];

     public function getNameAttribute($value)
    {
        return ucfirst($value);

    }// end of getNameAttribute

    
    public function getAddressAttribute($value)
    {
        return ucfirst($value);

    }// end of getAddressAttribute

    public function getCompanyAttribute($value)
    {
        return ucfirst($value);

    }

    public function getProductAttribute($value)
    {
        return ucfirst($value);

    }

    
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('company', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('product', 'like', "%$search%");
        });

    }
    
    
}
