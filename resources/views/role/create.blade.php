<x-app-layout>
    <section id="create-topic">

        <h2 class="label">Création d'un role</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('role.store')}}" method="POST">
            @csrf

            <x-input-label class="label" for="role_name" value="Titre"/>
            <x-text-input type="text" name="role_name" />

            <x-text-input type="hidden" name="role_id" value="{{ $role_id }}" />

            <button type="submit" class="button">
                <span class="label">Envoyer</span>
            </button>
        </form>
    </section>
</x-app-layout>
