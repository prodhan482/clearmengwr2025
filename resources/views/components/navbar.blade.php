<nav class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center p-4">
        <a href="/" class="text-xl font-bold">Clearmen Record</a>
        <div class="flex gap-4">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/participants" class="hover:text-blue-600">Participants</a>
            @auth
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="text-red-600">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">@csrf<button>Logout</button></form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
            @endauth
        </div>
    </div>
</nav>
