<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function scopeActive($query) { /* laravel punya fitur scope yang mendefinisakn kumpulan query, nanti tinggal panggi nama scope nya dengan huruf kecil */
        return $query->where('active',true);
    }
}
