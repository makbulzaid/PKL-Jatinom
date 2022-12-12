<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nomor_polisi_bpkb', 'like', '%' . $search . '%');
        });
        
        $query->when($filter['status'] ?? false, function ($query, $status) {
            if($status == 'aset'){
                return $query->where('status', 1);
            }
            elseif ($status == 'peminjaman'){
                return $query->where('status', 2);
            }
            elseif($status == 'penitipan'){
                return $query->where('status', 3);
            }
            else{
                return $query->where('status', 4);
            }
        });
    }
}
