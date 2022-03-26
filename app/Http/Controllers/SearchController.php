<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;



class SearchController extends Controller{
    
    public function search(){

        
        $requests = request('search');
        $slug = Str::slug(Str::lower($requests), '-');
        $results = Post::where('slug', 'LIKE', '%'.$slug.'%')->paginate(1)->withQueryString();
        /*$search = request('search');
        $results = Post::where('title', 'LIKE', '%'.$search.'%')->paginate(1);

        return view('site.search', ['results' => $results, 'search' => $search]);*/

        return view('site.search', ['results' => $results]);
      
    }
}
