<section id="forum">

    @foreach ($categories as $category)
    <div class="container-forum">
        <article>
            <h2>{{ $category->category_name }}</h2>
            <hr>
            @foreach ($category->topics as $topic)
                <div class="topic">
                    <i class="fa-solid fa-folder"></i>
                    <a href="{{ route('forum.show', $topic->id) }}">{{ $topic->topic_name }}</a>
                </div>
                
            @endforeach

            <form action="{{ route('forum.create') }}" method="GET">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}" />
                <button type="submit" class="button">
                    <span class="label">Ajouter</span>
                    <i class="fa-solid fa-plus"></i>
                </button>
            </form>
        </article>
    </div>
@endforeach


</section>