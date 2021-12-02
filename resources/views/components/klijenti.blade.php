<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    @foreach ($users as $user)

        <div class="auto">
            <h2>Naziv: {{ $user ->name }}</h2>
            <h3>Mail: {{ $user ->email }}</h3>
        </div>
    @endforeach
</div>
