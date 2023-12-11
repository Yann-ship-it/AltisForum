<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://kit.fontawesome.com/ea2a4f6de0.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <title>🚫 Compte suspendu</title>

        <!-- Scripts -->
        @vite(['resources/scss/app.scss'])
    </head>
    <body class="font-sans antialiased">
        <main id="ban">
            <div class="cont-ban">
                <svg class="rotate" xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ec2700}</style><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>
                <h1>Compte suspendu</h1>
            </div>

            <div class="content-ban">
                <p>Votre compte à été suspendu par <span class="admin">Admin</span> Savenko</p>
                <p>Raison du bannissement : {{ Auth::user()->bans->first()->reason }}</p>
                <p>Vous avez été banni le {{ Auth::user()->bans->first()->start_date->format('d/m/Y') }}</p>
                <p>Votre bannissement prendra fin le {{ Auth::user()->bans->first()->end_date->format('d/m/Y') }}</p>
            </div>

            <div class="contact">
                <p>En cas d'erreur, merci de nous contacter</p>
                <button class="button">Contactez-nous</button>
            </div>
            
        </main>
    </body>
</html>
