<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function comments( ){
        return $this->hasMany(Comment::class); /* jadi,  */
                                                /*  1. $this disini adalah merujuk pada class post  */
    }                                              /* bacanya post punya banyak komen */
                                                    /* hasMany maksudnya SELECT * FROM comments WHERE post_id=$this->id(id nya Post) */
                                                    /* makanya di table comments dibuat field post_id */

    public function scopeActive($query) { /* laravel punya fitur scope yang mendefinisakn kumpulan query, nanti tinggal panggi nama scope nya dengan huruf kecil */
        return $query->where('active',true);
    }

    public function total_comments(){
        return $this->comments()->count();
    }

}
