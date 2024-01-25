<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <section id="login">
            <div class="card">
                <h4 class="title">Création de compte</h4>
                <form>

                    {{-- <div class="mb-3">
                        <label for="avatar" class="form-label">Image de profil</label>
                        <input type="file" name="avatar" accept="image/*">
                    </div> --}}

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#FF2849}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <input placeholder="Pseudo" class="input-field" id="pseudo" class="block mt-1 w-full"
                            type="text" name="pseudo" :value="old('pseudo')" required autofocus
                            autocomplete="pseudo" />
                    </div>
                    <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#FF2849}</style><path d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                        <input placeholder="Email" autocomplete="off" class="input-field" id="email" type="email"
                            name="email" :value="old('email')" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#FF2849}</style><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                        <input placeholder="Mot de passe" required autocomplete="current-password" id="password"
                            class="input-field" for="password" :value="__('Password')" name="password" type="password">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#FF2849}</style><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                        <input placeholder="Confirmation" id="password_confirmation" class="input-field"
                            :value="__('Confirm Password')" type="password" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />


                    <label for="remember_me" class="inline-flex flex mt-3 items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="remember ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>

                    <div class="test">

                        <button class="button">
                            {{ __('Créer mon compte') }}
                        </button>

                        <div class="utils">
                            @if (Route::has('password.request'))
                                <a class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
    
                            <a class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Déjà un compte ?') }}
                            </a>
                        </div>


                    </div>

                </form>
            </div>
        </section>



    </form>
</x-guest-layout>
