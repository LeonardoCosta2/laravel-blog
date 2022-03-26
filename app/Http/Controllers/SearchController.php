<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;



class SearchController extends Controller{
    
    public function search(){
        
        $requests = addslashes(strip_tags(trim(request('q'))));
        $slug = Str::slug(Str::lower($requests), '-');

        $results = Post::where('slug', 'LIKE', '%'.$slug.'%')->paginate(1)->withQueryString();
        
       return view('site.search', ['results' => $results, 'search' => Str::slug(Str::lower($requests), ' ')]);
      
    }
}
