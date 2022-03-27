@extends('../layouts.main')

@section('title', 'Aviato - '.$post->title)

@section('content')
<div class="col-md-12">
    <div class="post post-single">
        <div class="post-thumb">
            <img class="img-responsive" src="{{asset('assets/images/blog/'.$post->img)}}" alt="">
        </div>
        <h2 class="post-title">{{$post->title}}</h2>
        <div class="post-meta">
            <ul>
                <li>
                    <i class="tf-ion-ios-calendar"></i> {{ date('d/m/Y', strtotime($post->created_at))}}
                </li>
                <li>
                    <i class="tf-ion-android-person"></i> <strong>{{Str::title($post->user->name)}}</strong>
                </li>
                <li>
                    @php
                        $category = explode(',', $post->category);
                        $count = count($category);
                    @endphp
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
        <div class="post-content post-excerpt">
            <p>{{$post->content}}</p>
        </div>
        <div class="post-social-share">
            <h3 class="post-sub-heading">Share this post</h3>
            <div class="social-media-icons">
                <ul>
                    <li><a class="facebook" href="https://themefisher.com/"><i class="tf-ion-social-facebook"></i></a></li>
                    <li><a class="twitter" href="https://themefisher.com/"><i class="tf-ion-social-twitter"></i></a></li>
                    <li><a class="dribbble" href="https://themefisher.com/"><i class="tf-ion-social-dribbble-outline"></i></a></li>
                    <li><a class="instagram" href="https://themefisher.com/"><i class="tf-ion-social-instagram"></i></a></li>
                    <li><a class="googleplus" href="https://themefisher.com/"><i class="tf-ion-social-googleplus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection