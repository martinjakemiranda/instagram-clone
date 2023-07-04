<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
            <div class="flex-shrink-0">
                <a href="/" class="text-white font-medium">Instagram</a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <a href="/" class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> text-gray-300 hover:bg-gray-700 px-3 py-2 text-sm font-medium" aria-current="page">Home</a>

                    <a href="/about" class="<?= urlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>

                    <a href="/contact" class="<?= urlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>

                    <a href="/ourmission" class="<?= urlIs('/ourmission') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Our Mission</a>
                
                    <a href="/notes" class="<?= urlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> text-gray-300 hover:bg-gray-700 px-3 py-2 text-sm font-medium" aria-current="page">Notes</a>
                    
                    <a href="/profile" class="<?= urlIs('/profile') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> text-gray-300 hover:bg-gray-700 px-3 py-2 text-sm font-medium" aria-current="page">Profile</a>
                <?php endif ?>    
                </div>
            </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                    <div>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="<?php echo $_SESSION['user']['avatar']; ?>" alt="Logo">
                            </button>
                        <?php else : ?>
                            <a href="/register" class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign Up</a>
                            <a href="/login" class="<?= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log in</a>
                        <?php endif; ?>
                    </div>
                    </div>

                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <div class="relative ml-3">
                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE"/>

                                <button class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</button>

                            </form>
                        </div>
                    <?php endif; ?>

                    
                </div>
            </div>
        </div>
    </div>
</nav>