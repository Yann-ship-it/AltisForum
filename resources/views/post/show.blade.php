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

    <section id="topic">
        <div class="contain">
            <div>

                <article class="topic">

                    <div class="container-topic">
                        <div style="width: 100%;">
                            <h2>{{ $posts->post_name }}</h2>
                            <p>{!! $posts->post_content !!}</p>
                            <span>{{ $posts->timeElapsed() }}</span>
                        </div>
                    </div>

                    <div class="container-topic com">
                        <h2>Commentaire</h2>
                        <form class="form-com w-full" action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <div class="form-group w-full">
                                <textarea class="w-full" name="comment_content" id="comment_content" rows="4"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $posts->id }}">
                            <input type="hidden" name="user_id" value="{{ $posts->user->id }}">
                            <button type="submit" class="button">
                                <span class="label">Publier</span>
                            </button>
                        </form>
                    </div>

                    @foreach ($posts->comment as $comment)
                        <div class="container-topic">
                            <div style="width: 100%;">
                                <div class="roles">
                                    <div class="flex">
                                        @if ($comment->user->avatar === null) 
                                            <img src="" alt="">
                                        @else
                                            <img class="profile_img" src="{{ asset($comment->user->avatar) }}" alt="Avatar de {{ $comment->user->pseudo }}">
                                        @endif
                                        <h2 class="username">  {{ $comment->user->pseudo }}</h2>
                                    </div>
                                    <span class="{{ $comment->user->role->role_name }}"> {{ $comment->user->role->role_name }} </span>
                                </div>
                                <div class="infos">
                                    <div>
                                        <p>{!! $comment->comment_content !!}</p>
                                        <div class="separator"></div>
                                        <div class="comment-info">
                                            <span>{{ $comment->timeElapsed() }}</span>
                                            @if ($user_id === $comment->user_id || Auth::user()->role_id == '1')
                                                <form class="pl-5" action={{ route('comments.destroy', $comment) }}
                                                    method="post" id="post-destroy">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" id="comment_id">
                                                    <input type="submit" value="Supprimer">
                                                    @method('delete')
                                                </form>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </article>

            </div>
        </div>


    </section>
</x-app-layout>
