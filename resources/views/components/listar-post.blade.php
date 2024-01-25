<div>
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-6 gap-0">
        @foreach ($posts as $post)
            <div class="">
                <a href="{{route('post.show', ['post'=>$post, 'user'=>$post->user])}}">
                    <img
                    class="rounded-lg object-cover"
                    src="{{asset('uploads') . '/' . $post->imagen}}" alt="imagen del post {{$post->titulo}}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="my-10">
        {{$posts->links('pagination::tailwind')}}
    </div>
    
    @else
    <p class="text-center">No hay posts</p>
    
    @endif
</div>