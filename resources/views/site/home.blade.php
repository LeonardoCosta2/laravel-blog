@extends('../layouts.main')

@section('title', 'Aviato - Blog')

@section('content')

@foreach($posts as $post)

    <div class="post">
        <div class="post-media post-thumb">
            <a href="{{ route('post.show', $post->id) }}">
                <img src="{{ asset('assets/images/blog/'.$post->img) }}" alt="">
            </a>
        </div>
        <h2 class="post-title"><a href="{{ route('post.show', $post->id) }}">{{ Str::title($post->title) }}</a></h2>
        <div class="post-meta">
            <ul>
                <li>
                    <i class="tf-ion-ios-calendar"></i> {{ date('d/m/Y - H:i:s', strtotime($post->created_at)) }}
                </li>
                <li>
                    <i class="tf-ion-android-person"></i> <strong>{{Str::title($post->user->name)}}</strong>
                </li>
                <li>
                    <i class="tf-ion-ios-pricetags"></i>
                
                    @php
                        $categorys = $post->categories()->get();
                    @endphp
                    

                    @foreach($categorys as $category)
                        @php
                            // gambiara para conseguir pegar o ultimo elemento do array da tabela relacionada, para conseguri fazer a verificar e exibicao.
                            // existe um metodo mais facil de se mostrar isso, mas eu precisava desse metodo para minha necessidade 
                            // para subir no banco de dados relacionando, possivelmente terei que criar um array das categorias e cadastrar 1 por uma na tabela pivo do relacionamento NxN
                            $ultimo = array($category->title);
                            
                        @endphp
                        
                    @endforeach



                    @for($i = 0; $i < count($post->categories); $i++)
                    
                        @if($post->categories[$i]->title != end($ultimo))
                            <a href="#!/category/{{$post->categories[$i]->title}}"> {{ $post->categories[$i]->title }} </a>,
                        @else
                            <a href="#!/category/{{$post->categories[$i]->title}}"> {{ $post->categories[$i]->title }} </a>
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