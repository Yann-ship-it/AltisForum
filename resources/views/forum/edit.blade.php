<x-app-layout>
    <section id="edit-topic">

        <h2 class="label">Modification d'un topic</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('forum.update', $topic)}}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <x-input-label class="label" for="topic_name" value="Titre"/>
            <x-text-input class="form-btn w-full px-2 py-2" id="topic_name" name="topic_name" value="{{ $topic->topic_name }}"/>

            <x-input-label class="mt-5 label" for="topic_content" value="Contenu du post"/>
            <textarea class="form-btn w-full" id="topic_content" name="topic_content">{{ $topic->topic_content }}</textarea>

            <button type="submit" class="button">
                <span class="label">Modifier</span>
            </button>
        </form>
    </section>
</x-app-layout>
