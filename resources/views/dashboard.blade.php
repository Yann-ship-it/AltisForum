<x-app-layout>
    
    @if (session('succes'))
        <div class="succes">
            {{ session('succes') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <section class="showuser">
        <div class="cont">
            @if ($user->avatar === null)
                <img src="" alt="">
            @else
                <img class="showprofile_img" src="{{ asset($user->avatar) }}" alt="Avatar de {{ $user->pseudo }}">
            @endif
            <p>{{ $user->pseudo }}</p>
            <p class="{{ $user->role->role_name }}">{{ $user->role->role_name }}</p>
            <p>Compte crée le {{ $user->created_at->format('j F Y à H\hi') }}</p>

            

        </div>
    </section>

    <div class="cont">
        <h2>Topic</h2>
        @foreach ($topics as $topic)
            @if ($topic->user_id === $user->id)
                <div>
                    <h2 class="text-white text-4xl font-semibold pt-3 pb-2">{{ strip_tags($topic->topic_name) }} par <span
                            class="créateur">{{ $topic->user->pseudo }}</span> </h2>

                    <div class="flex pb-5">
                        <x-link href="{{ route('forum.edit', $topic) }}">Modifier</x-link>

                        <form class="pl-5" action={{ route('forum.destroy', $topic) }} method="post"
                            id="topic-destroy">
                            @csrf
                            <input type="hidden" name="topic_id" id="topic_id">
                            <input
                                class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                type="submit" value="Supprimer">
                            @method('delete')
                        </form>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

    <div class="cont">
        <h2>Posts</h2>
        @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
                <div>
                    <h2 class="text-white text-4xl font-semibold pt-3 pb-2">{{ strip_tags($post->post_name) }} par <span
                            class="créateur">{{ $post->user->pseudo }}</span> </h2>

                    <div class="flex pb-5">
                        <x-link href="{{ route('post.edit', $post) }}">Modifier</x-link>

                        <form class="pl-5" action={{ route('post.destroy', $post) }} method="post"
                            id="post-destroy">
                            @csrf
                            <input type="hidden" name="topic_id" id="topic_id">
                            <input
                                class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                type="submit" value="Supprimer">
                            @method('delete')
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="cont">
        <h2>Commentaires</h2>
        @foreach ($comments as $comment)
            @if ($comment->user_id === $user->id)
                <div>
                    <h2 class="text-white text-4xl font-semibold pt-3 pb-2">{{ strip_tags($comment->comment_content) }}, <span
                            class="créateur">{{ $post->post_name }}</span> </h2>

                    <div class="flex pb-5">

                        <form class="pl-5" action={{ route('comments.destroy', $comment) }} method="post"
                            id="post-destroy">
                            @csrf
                            <input type="hidden" name="comment_id" id="comment_id">
                            <input
                                class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                type="submit" value="Supprimer">
                            @method('delete')
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</x-app-layout>
