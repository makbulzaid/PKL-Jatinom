<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nomor_sertifikat', 'like', '%' . $search . '%');
        });
        
        $query->when($filter['owner'] ?? false, function ($query, $owner) {
            if (Land::firstWhere('slug_pemilik', $owner)){
                return $query->where('slug_pemilik', $owner);
            }
            elseif($owner == 'arsip'){
                return $query->where('status', 6);
            }
        });
    }
    
}
