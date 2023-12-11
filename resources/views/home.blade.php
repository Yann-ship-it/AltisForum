<x-app-layout>
    <section id="home">
        <section class="main-actu fade-in-trigger fade-in-element" >
            <div class="main-actu-leftside">
                <h2>Bienvenue sur notre forum !</h2>
                <p>N'hésitez pas à explorer les différentes sections et à participer aux discussions. Votre contribution
                    est précieuse et nous sommes impatients de lire vos messages.</p>
                <a href="{{ route('forum.index') }}" class="button">Forum</a>
            </div>
            <div class="main-actu-rightside">
                <img src="{{ asset('images/search.png') }}" alt="Description de l'image">
            </div>
        </section>



        <section class="main-slider">
            <div class="aol-slide">
                <div class="slide"><img src="{{ asset('images/V4.png') }}" alt="Description de l'image 1"></div>
                <div class="slide"><img src="{{ asset('images/montagne.png') }}" alt="Description de l'image 2"></div>
                <div class="slide"><img src="{{ asset('images/pont.png') }}" alt="Description de l'image 3"></div>
            </div>
            <div class="pagination"></div>
        </section>

        <!------------ Compteur ------------>
        <section class="compteur fade-in-trigger fade-in-element">

            <div class="infos">
                <i class="fa-solid fa-user"></i>
                <h2>Inscriptions</h2>
                <hr>
                <p class="numbs">{{ $allUsers }}</p>
            </div>

            <div class="infos">
                <i class="fa-solid fa-user"></i>
                <h2>Topics</h2>
                <hr>
                <p class="numbs">{{ $allTopics }}</p>
            </div>

            <div class="infos">
                <i class="fa-solid fa-user"></i>
                <h2>Commentaires</h2>
                <hr>
                <p class="numbs">{{ $allComments }}</p>
            </div>
        </section>

        <!------------ Second Actu ------------>

        <section class="second-actu">
            <img src="{{ asset('images/contact.png') }}" alt="Description de l'image">
            <article>
                <h2 class="text">Contactez-nous</h2>
                <p class="text">Si vous avez des questions techniques, des préoccupations liées à votre compte ou à
                    vos publications, ou si vous avez simplement besoin d'aide pour naviguer sur notre forum, notre
                    équipe de support est là pour vous assister</p>
                <button class="button">Contact</button>
            </article>
        </section>
    </section>
</x-app-layout>
