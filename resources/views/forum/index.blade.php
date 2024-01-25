<x-app-layout>

    @include('components.categories')

    <article class="post">
        
        <article class="post">
    
                @foreach ($posts as $post)
                
                    <div class="container-topic">
                        <div>
                            <input type="hidden" name="user_id" value="{{ $post->user->id }}"/>
                            <h2><a href="{{ route('post.show', $post) }}">{{ $post->post_name }}</a></h2>
                            <p>Post créé par {{ $post->user->pseudo }}</p>
                        </div>
                        <div>
                            <div class="tags {{ $post->topic->topic_name }}">{{ $post->topic->topic_name }}</div>
                            <i class="fa-solid fa-message">{{ $post->comment->count() }}</i>
                        </div>
                    </div>
                    <x-text-input type="hidden" name="topic_id" value="{{ $post->topic_id }}" />
                @endforeach
        </article>

        
    </article>


</x-app-layout>


{{--             <form action="{{route('forum.create')}}" method="GET">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}"/>
                    <button type="submit" class="button">
                        <span class="label">Ajouter</span>
                        <i class="fa-solid fa-plus"></i>
                      </button> 
                </form>                 --}}
