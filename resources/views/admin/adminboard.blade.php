<x-app-layout>
    <section id="admin">

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


        <section class="edit">
            <div class="topics">
                <h2 class="text-3xl text-white">Topics</h2>
                @foreach ($topics as $topic)
                    <div>
                        <h4 class="text-white text-2xl font-semibold pt-3 pb-2">{{ strip_tags($topic->topic_name) }}</h4>

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
                    @endforeach
            </div>
            

            <div class="posts">
                <h2 class="text-3xl text-white">Posts</h2>
                @foreach ($posts as $post)
                    <div>
                        <h4 class="text-white text-2xl font-semibold pt-3 pb-2">{{ strip_tags($post->post_name) }}</h4>

                        <div class="flex pb-5">
                            <x-link href="{{ route('post.edit', $post) }}">Modifier</x-link>

                            <form class="pl-5" action={{ route('post.destroy', $post) }} method="post"
                                id="post-destroy">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id">
                                <input
                                    class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    type="submit" value="Supprimer">
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

        @include('components.left')

        @include('components.stats')

        @foreach ($comments as $comment)
            @if ($comment->user_id === $user)
                <div>
                    <h2 class="text-white text-4xl font-semibold pt-3 pb-2">{{ strip_tags($comment->comment_content) }}
                        par <span class="créateur">{{ $post->user->pseudo }}</span> </h2>

                    <div class="flex pb-5">

                        <form class="pl-5" action={{ route('comments.destroy', $comment) }} method="post"
                            id="post-destroy">
                            @csrf
                            <input type="hidden" name="comment_id" id="comment_id">
                            <input
                                class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                type="submit" value="Supprimer !">
                            @method('delete')
                        </form>
                    </div>
                </div>
            @endif
        @endforeach

        <div id="user-panel">
            <div class="sort">
                <select class="form-control" aria-label="sort" id="change-status">
                    <option selected value="id">Id</option>
                    <option value="role">Role</option>
                    <option value="user">User</option>
                </select>
                <input type="text" id="searchInput" placeholder="Recherche par pseudo">
            </div>
            <table class="table align-middle mb-0 w-full">
                <thead id="praject-table">
                    <tr>
                        <th class="text-start" style="width:65px;">ID</th>
                        <th class="text-start">Role</th>
                        <th class="text-start">Utilisateur</th>
                        <th class="text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td data-sort="id">{{ $user->id }}</td>
                            <td data-sort="role" class="role {{ $user->role->role_name }}">{{ $user->role->role_name }}</td>
                            <td data-sort="user"><a href="{{ route('user.show', $user) }}">
                                    {{ $user->pseudo }}
                                </a></td>

                            <td class="text-center"><a href="{{ route('ban.create', ['user_id' => $user->id]) }}"
                                    class="button">Bannissement</a></td>
                            <td>
                                <form method="POST" action="{{ route('user.update', $user) }}"
                                    id="user-update-form-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <select class="button" name="role" id="role_id_{{ $user->id }}">
                                        @foreach ($roles as $role)           
                                            <option value="{{ $role->id }}"                                           
                                                @if (Auth::user()->role->role_name === $user->role->role_name) selected @endif>{{ $user->role->role_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="submit" value="Envoyer">
                                </form>
                            </td>
                            <td>
                                <form class="pl-5" action={{ route('user.destroy', $user) }} method="post"
                                id="post-destroy">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id">
                                <input
                                    class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    type="submit" value="Supprimer">
                                @method('delete')
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

</x-app-layout>
