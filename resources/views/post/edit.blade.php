<x-app-layout>
    <section id="edit-post">

        <h2 class="label">Modification d'un post</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('post.update', $post)}}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <x-input-label class="label" for="post_name" value="Titre"/>
            <x-text-input class="form-btn w-full px-2 py-2" id="post_name" name="post_name" value="{{ $post->post_name }}"/>

            <x-input-label class="mt-5 label" for="post_content" value="Contenu du post"/>
            <textarea class="form-btn w-full" id="post_content" name="post_content">{{ $post->post_content }}</textarea>

            <button type="submit" class="button">
                <span class="label">Modifier</span>
            </button>
        </form>
    </section>
</x-app-layout>
