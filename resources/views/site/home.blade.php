@extends('../layouts.main')

@section('title', 'Aviato - Blog')

@section('content')

@foreach($posts as $post)
    @php
        $category = explode(',', $post->category);
        $count = count($category);
    @endphp


    <div class="post">
        <div class="post-media post-thumb">
            <a href="{{ route('post.show', $post->id) }}">
                <img src="{{ asset('assets/images/blog/'.$post->img) }}" alt="">
            </a>
        </div>
        <h2 class="post-title"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
        <div class="post-meta">
            <ul>
                <li>
                    <i class="tf-ion-ios-calendar"></i> {{ date('d/m/Y - H:i:s', strtotime($post->created_at)) }}
                </li>
                <li>
                    <i class="tf-ion-android-person"></i> POSTED BY ADMIN
                </li>
                <li>
                    <i class="tf-ion-ios-pricetags"></i>
                    @for($i = 0; $i < $count; $i++)
                        @if($category[$i] != end($category))
                            <a href="#!/category/{{$category[$i]}}"> {{ $category[$i] }} </a>,
                        @else
                            <a href="#!/category/{{$category[$i]}}"> {{ $category[$i] }} </a>
                        @endif
                        
                    @endfor
                    
                </li>
                <li>
                    <a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
                </li>
            </ul>
        </div>
        <div class="post-content">
            <p style="max-width: 140ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $post->content }} </p>
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-main">Continue Lendo</a>
        </div>
    
    </div>


@endforeach

@endsection