@extends('../layouts.main')

@section('title', 'Aviato - '.$search)

@section('content')

@if($results->count() > 0)
    
@foreach($results as $result)
    @php
        $category = explode(',', $result->category);
        $count = count($category);
    @endphp


    <div class="post">
        <div class="post-media post-thumb">
            <a href="{{ route('post.show', $result->id) }}">
                <img src="{{ asset('assets/images/blog/'.$result->img) }}" alt="">
            </a>
        </div>
        <h2 class="post-title"><a href="{{ route('post.show', $result->id) }}">{{ $result->title }}</a></h2>
        <div class="post-meta">
            <ul>
                <li>
                    <i class="tf-ion-ios-calendar"></i> {{ date('d/m/Y - H:i:s', strtotime($result->created_at)) }}
                </li>
                <li>
                    <i class="tf-ion-android-person"></i> <strong>{{Str::title($result->user->name)}}</strong>
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
            <p style="max-width: 140ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $result->content }} </p>
            <a href="{{ route('post.show', $result->id) }}" class="btn btn-main">Continue Lendo</a>
        </div>
    
    </div>


@endforeach

{{$results->links('pagination::bootstrap-4')}}

@else
    <p align="center">Nenhum resultado encontrado!</p> 
@endif

@endsection