<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;    

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts',)
                    ->select('id','title','content','created_at')
                    ->where('active',true) //ketika data kolom active = 1 
                    ->get();
        $view_data = [
            'posts'=>$posts
        ];


        return view('posts.index',$view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)   /* tujuan store ini adalah memasukkan data dari form(create.blade.php ke dalam database(post.txt)) */
    {
        $title = $request->input('title');
        $content = $request->input('content');

        DB::table('posts')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
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
        return redirect('posts'); /* kembailkan, redirect ke endpoint posts */

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $post = DB::table('posts')
        ->select('id','title','content','created_at') 
        ->where('id','=',$id) //boleh operatornya tidak di tulis, jadi hanya 2 parameter
        ->first();
        $view_data = [
            'post' => $post
        ];

        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = DB::table('posts',)
        ->select('id','title','content','created_at') 
        ->where('id','=',$id)
        ->first();
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
        $title = $request->input('title');
        $content = $request->input('content');// bila ada eror sintax cek titik koma sebelumnya

        DB::table('posts')
            ->where('id','=',$id)
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
       DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect("posts");
    }
}
