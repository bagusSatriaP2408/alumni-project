<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.lulusan')" :active="request()->routeIs('admin.lulusan')">
                        {{ __('Lulusan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.kuisioner')" :active="request()->routeIs('admin.kuisioner')">
                        {{ __('Kuisioner') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.postingan')" :active="request()->routeIs('admin.postingan')">
                        {{ __('Postingan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('kategori-post.index')" :active="request()->routeIs('kategori-post.index')">
                        {{ __('Kategori Postingan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('jenis-pekerjaan.index')" :active="request()->routeIs('jenis-pekerjaan.index')">
                        {{ __('Jenis Pekerjaan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tracking.index')" :active="request()->routeIs('tracking.index')">
                        {{ __('Tracking') }}
                    </x-nav-link>
                </div>
            </div>
            
            <!-- Logout Button -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.lulusan')" :active="request()->routeIs('admin.lulusan')">
                    {{ __('Lulusan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.kuisioner')" :active="request()->routeIs('admin.kuisioner')">
                    {{ __('Kuisioner') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.postingan')" :active="request()->routeIs('admin.postingan')">
                    {{ __('Postingan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('kategori-post.index')" :active="request()->routeIs('kategori-post.index')">
                    {{ __('Kategori Postingan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('jenis-pekerjaan.index')" :active="request()->routeIs('jenis-pekerjaan.index')">
                    {{ __('Jenis Pekerjaan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tracking.index')" :active="request()->routeIs('tracking.index')">
                    {{ __('Tracking') }}
                </x-responsive-nav-link>
            @endauth
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
