<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $search = request('search');

        if($search){
            $posts = Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
            /*
                ------  usar essa forma para fazer paginacao e criar a pagina propria da paginacao  ------
                
                $posts = Post::where('title', 'LIKE', '%'.$search.'%')->paginate(1);

                ------ usar essa forma no blade para puxar paginacao -----

                $posts->links('pagination::bootstrap-4')

            */
            

        }else{
            $posts = Post::all();
            // $posts = Post::paginate(1);
            //$posts = Post::table('posts')->paginate(1);
            
        }

        

        return view('site.home', ['posts' => $posts, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $post = Post::findOrFail($id);

        return view('site.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
