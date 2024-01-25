<x-app-layout>
    <section class="showuser">
        <div class="cont">
            @if ($user->avatar === null)
                <img src="" alt="">
            @else
                <img class="showprofile_img" src="{{ asset($user->avatar) }}" alt="Avatar de {{ $user->pseudo }}">
            @endif
            <p>{{ $user->pseudo }}</p>
            <p class="{{ $user->role }}">{{ $user->role }}</p>
            
            <p>{{ $user->created_at }}</p>
        </div>
    </section>

    <section>
        <div class="cont">
            <h2>Commentaires</h2>
            @if (!empty($comments))
                @foreach ($comments as $comment)
                    <p>{{ $comment->content }}</p>
                @endforeach
            @else
                <p>Cet utilisateur n'a pas de commentaires.</p>
            @endif
        </div>
    </section>
 
</x-app-layout>
