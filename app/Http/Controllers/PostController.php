<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){  

        $posts = Post::orderBy('id', 'desc')->get();
        
        //$categories = $posts->categories()->get();


        /*foreach($posts as $category){
            echo $category->categories[0]->id;
        }*/
        //$usersPost = User::where('id', $posts->user_id)->toArray();

        // quando se tem o relacionamento 1xN se chama na listagem todos os usuarios dos artigos desta forma "$post->user->name"; nesta caso eu quero ir na tabela posts e pegar somente o nome relacionado da tabela usuario. assim sendo post = tabela post, user = tabela usuario e name = nome do usuario na tabela


        return view('site.home', ['posts' => $posts]);
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
        //$usersPost = User::where('id', $posts->user_id)->toArray();
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
