<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\BlogPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;    
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;   

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $posts = Post::active()->get();  //ketika data kolom active = 1  /* ketika model sudah di buat dalah hal ini post, maka use di atas otomatis terisi */
                                       /* karena ('active',true) akan sering digunakan maka bisa dimasukkan scope kedalam model di dalam [class] post untuk meringkasnya */
        $view_data = [ /* post::active()->withTrashed()->get(); >>>> withTrased adalah scope bawaan laravel untuk menampilkan data yang sudah di deleted(fungsi destroy)*/
            'posts'=>$posts
        ];


        return view('posts.index',$view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)   /* tujuan store ini adalah memasukkan data dari form(create.blade.php ke dalam database(post.txt)) */
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content,
           /* ini nama table  | 
           di data base       | */    
        ]);

        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);

        // $new_post = [
        //     count($posts)+1, $title , $content, date('Y-m-d H:i:s') /* date ini fungsi untuk ambil waktu saat ini */
        // ];

        // $new_post = implode(',', $new_post);
        // array_push($posts,$new_post); /* newpost dimasukkan ke post , dd() untuk detailnya*/
        // $posts = implode("\n", $posts);
        // /* dalam kasus ini, karena databasenya .txt, maka kita akan menimpa apa yang ada di post.txt dengan isi $post yang baru */
        // Storage::write('posts.txt', $posts); /* kalau salah penulisan nama file, maka akan create file baru sesuai nama */
        
        Mail::to('bima.bakti.mandala@gmail.com')->send(new BlogPosted());

        return redirect('posts'); /* kembailkan, redirect ke endpoint posts */

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        if (!Auth::check()) {
            return redirect('login');
        }
        $post = Post::where('id','=',$id)->first();//boleh operatornya tidak di tulis, jadi hanya 2 parameter
        $comments = $post->comments()->get();
        $total_comments = $post->total_comments();     /* ingat kalau method nya class harus di instance dulu, karena sudah di instance di $post */
                                                        /* tinggal panggil $post */
        $view_data = [
            'post'                              => $post,
            'comments'                          => $comments, 
            'total_comments'                    => $total_comments, 
        ];/* ini yang kita panggi di blade   */
               return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $post = Post::where('id','=',$id)->first();
        $view_data = [
            'post' => $post
        ];
        return view('posts.edit', $view_data);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');// bila ada eror sintax cek titik koma sebelumnya

        Post::where('id','=',$id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        Post::where('id', $id)->delete();
        return redirect("posts");
    }
}
