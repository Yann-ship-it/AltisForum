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

        <form action="{{ route('role.create') }}" method="GET">
            @csrf
            <input type="hidden" name="role_id" value=" {{-- {{ $role->id }} --}}" /> 
            <button type="submit" class="button">
                <span class="label">Ajouter</span>
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        @foreach ($roles as $role)
                    <div>
                        <h4 class="text-white text-2xl font-semibold pt-3 pb-2">{{ strip_tags($role->role_name) }}</h4>

                        <div class="flex pb-5">
                            <x-link href="{{ route('role.edit', $role) }}">Modifier</x-link>

                            <form class="pl-5" action={{ route('role.destroy', $role) }} method="post"
                                id="role-destroy">
                                @csrf
                                <input type="hidden" name="role_id" id="role_id">
                                <input
                                    class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    type="submit" value="Supprimer">
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach

    </section>

</x-app-layout>
