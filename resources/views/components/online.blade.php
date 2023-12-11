<div id="online">
    <h2>Utilisateurs en ligne</h2>
        @foreach ($usersOnline as $user)
            <div class="flex">
                <i class="fa-solid fa-circle" style="color: #00f900;"></i> 
                <p>{{ $user->pseudo }}</p>
            </div>
        @endforeach
</div>