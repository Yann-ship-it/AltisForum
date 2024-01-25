<x-app-layout>
    <section id="create-topic">

        <h2 class="label">Création d'un post</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <x-input-label class="label" for="post_name" value="Titre"/>
            <x-text-input type="text" name="post_name" />

            <x-input-label class="label" for="post_content" value="Contenu"/>
            <textarea type="text" name="post_content"> </textarea>

            <x-text-input type="hidden" name="category_id" value="{{ $category_id }}" />
            
            <x-text-input type="hidden" name="user_id" value="{{ $user_id }}" />
            <x-text-input type="hidden" name="topic_id" value="{{ $topic_id }}" />

            <button type="submit" class="button">
                <span class="label">Envoyer</span>
            </button>
        </form>
    </section>
</x-app-layout> 1708x2560
