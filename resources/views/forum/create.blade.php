<x-app-layout>
    <section id="create-topic">

        <h2 class="label">Création d'un topic</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('forum.store')}}" method="POST">
            @csrf

            <x-input-label class="label" for="topic_name" value="Titre"/>
            <x-text-input type="text" name="topic_name" />

            <x-input-label class="label" for="topic_content" value="Contenu"/>
            <textarea type="text" name="topic_content"> </textarea>

            <x-text-input type="hidden" name="category_id" value="{{ $category_id }}" />
            <x-text-input type="hidden" name="user_id" value="{{ $user_id }}" />

            <button type="submit" class="button">
                <span class="label">Envoyer</span>
            </button>
        </form>
    </section>
</x-app-layout>
