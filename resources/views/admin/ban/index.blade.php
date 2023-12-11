<x-app-layout>

    @if (session('succes'))
        <div class="succes">
            {{ session('succes') }}
        </div>
    @endif

    @if ($bannedUsers->isEmpty())
        <div class="error">
            <p>Aucun utilisateur n'est banni</p>
        </div>
    @else

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

        @foreach ($bannedUsers as $ban)
            <p style="color: white;">{{ $ban->user->pseudo }} - Banni jusqu'au {{ $ban->end_date }}</p>
            <form action="{{ route('ban.destroy', ['ban' => $ban->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="button" type="submit">Lever le bannissement</button>
            </form>
        @endforeach
    @endif


</x-app-layout>
