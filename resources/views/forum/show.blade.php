<x-app-layout>

    @include('components.categories')
    
<section id="topic">
    <div class="contain">
        <div>
            <article class="plus"> 
            
            <form action="{{route('post.create')}}" method="GET">
                @csrf
                <input type="hidden" name="topic_id" value="{{ $topics->id }}"/>
                <button type="submit" class="button">
                    <span class="label">Ajouter</span>
                    <i class="fa-solid fa-plus"></i>
                </button>
            </form>                
        </article>

        <article class="post">
        
            

            @if ($topics->posts)
                @foreach ($topics->posts as $post)
                
                    <div class="container-topic">
                        <div>
                            <input type="hidden" name="user_id" value="{{ $post->user->id }}"/>
                            <h2><a href="{{ route('post.show', $post) }}">{{ $post->post_name }}</a></h2>
                            <p>Post créé par {{ $post->user->pseudo }}</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-eye">0</i>
                            <i class="fa-solid fa-message">{{ $post->comment->count() }}</i>
                        </div>
                    </div>
                    <x-text-input type="hidden" name="topic_id" value="{{ $post->topic_id }}" />
                @endforeach
            @else
                <p>Aucun message trouvé.</p>
            @endif
        </article>
    </div>

        </div>
    </div>
</section>
</x-app-layout>