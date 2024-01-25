<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <section id="login">
            <div class="card">
                <h4 class="title">Se connecter</h4>
                <form>

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <style>
                                svg {
                                    fill: #FF2849
                                }
                            </style>
                            <path
                                d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                        </svg>
                        <input autocomplete="off" id="email" class="input-field" :value="old('email')"
                            name="email" type="email" autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="field">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                            <style>
                                svg {
                                    fill: #FF2849
                                }
                            </style>
                            <path
                                d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                        </svg>
                        <input required autocomplete="current-password" id="password" class="input-field"
                            for="password" :value="__('Password')" name="password" type="password">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <div class="test">

                        <button class="button">
                            {{ __('Se connecter') }}
                        </button>

                        <label class="remember_me" for="remember_me">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                        </label>

                        <div class="utils">
                            @if (Route::has('password.request'))
                                <a class=""
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
    
                            <a class=""
                                href="{{ route('register') }}">
                                {{ __('Pas de compte ?') }}
                            </a>
                        </div>


                    </div>

                </form>
            </div>
        </section>

    </form>
</x-guest-layout>
