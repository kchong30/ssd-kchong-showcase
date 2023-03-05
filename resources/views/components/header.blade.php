<header class="px-6 py-8">
    <nav class="flex justify-between items-center">
        <div class=" md:mt-0">
            <a href="/" class="text-s font-bold uppercase">Home</a>
            <a href="/projects" class="ml-3 text-xs font-bold uppercase">Projects</a>
            <a href="/about" class="ml-3 text-xs font-bold uppercase">About</a>
        </div>
        <div class="md:mt-0">
            @auth
                <span class="text-xs font-bold uppercase"> {{ auth()->user()->name }} </span>
                @if (auth()->user()->isAdmin())
                    <a href="/admin" class="ml-3 text-xs font-bold uppercase">Admin</a>
                 @endif
                <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
            @else
                <a href="/register" class="ml-3 text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
            @endauth
        </div>
    </nav>
</header>