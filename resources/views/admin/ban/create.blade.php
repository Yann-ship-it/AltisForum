<x-app-layout>
    <section id="addBan">
        <form action="{{ route('ban.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ request('user_id') }}" required>

            <label for="user_id">Nom de l'utilisateur:</label>
            <input type="text" name="user_id" value="{{ $userName}}" disabled>
            
            <label for="start_date">Date de début:</label>
            <input type="date" name="start_date" required>
            <label for="end_date">Date de fin:</label>
            <input type="date" name="end_date" required>
            <label for="reason">Raison du bannissement:</label>
            <textarea name="reason" required></textarea>
            <button type="submit">Bannir</button>
        </form>
    </section>
</x-app-layout>
