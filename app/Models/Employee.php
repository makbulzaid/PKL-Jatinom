<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['companies'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
        
        $query->when($filter['company'] ?? false, function ($query, $company) {
            if (Company::firstWhere('slug_company', $company)){
                return $query->whereHas('companies', function ($query) use ($company) {
                    $query->where('slug_company', $company);
                });
            }
        });
    }
    
    public function companies(){
        return $this->belongsToMany(Company::class);
    }
}
