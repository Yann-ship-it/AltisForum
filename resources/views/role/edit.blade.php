<x-app-layout>
    <section id="edit-topic">

        <h2 class="label">Modification d'un role</h2>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('role.update', $role)}}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <x-input-label class="label" for="role_name" value="Titre"/>
            <x-text-input class="form-btn w-full px-2 py-2" id="role_name" name="role_name" value="{{ $role->role_name }}"/>

            <button type="submit" class="button">
                <span class="label">Modifier</span>
            </button>
        </form>
    </section>
</x-app-layout>
