<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $fillable = [
        'title',
        'content',
    ];

    public static function boot() { /* jadi jika memanggil event handler baiknya pakai boot, dalah hal ini "creating" */
        parent::boot(); /* ini juga perlu */
        static::creating(function ($post) {/* tinggal tulis event handler yang di inginkan */
            $post->slug = str_replace(' ','-',$post->title);/* $post bisa di isi apa saja , tapi agar memudahkan karena ini juga merupakan instansi dari tabel Post */
        });        /* ini kolom slug yang sudah dibuat migrasinya sebelumnya */                         

    }
    

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
        return $this->comments()->count();/* count bawaan laravel */
    
    }
    
}
