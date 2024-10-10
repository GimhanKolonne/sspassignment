<nav class="bg-green-200 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                     <div class="flex space-x-8 sm:-my-px sm:ml-10">
                         @if(auth()->user()->type === 'broker' && auth()->user()->brokerProfile)

                             <x-nav-link href="{{ route('broker-profile.show', auth()->user()->brokerProfile) }}" :active="request()->routeIs('broker-profile.show')">
                                 {{ __('Profile') }}
                             </x-nav-link>
                             <x-nav-link href="{{ route('properties') }}" :active="request()->routeIs('properties')">
                                 {{ __('Properties') }}
                             </x-nav-link>



                             @endif

                         @if(auth()->user()->type === 'user')
                    <x-nav-link href="{{ route('property.list') }}" :active="request()->routeIs('property.list')">
                        {{ __('Find Properties') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('broker-profiles.index') }}" :active="request()->routeIs('broker-profiles.index')">
                        {{ __('Find Brokers') }}
                    </x-nav-link>
{{--                    <x-nav-link href="{{ route('community') }}" :active="request()->routeIs('community')">--}}
{{--                        {{ __('Community') }}--}}
{{--                    </x-nav-link>--}}
{{--                    <x-nav-link href="{{ route('loans') }}" :active="request()->routeIs('loans')">--}}
{{--                        {{ __('Loans') }}--}}
{{--                    </x-nav-link>--}}
                    @endif
                    @endauth

                    @guest
                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="ml-4">
                            {{ __('Login') }}
                        </x-nav-link>
                        @if (Route::has('register'))
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" class="ml-4">
                                {{ __('Register') }}
                            </x-nav-link>
                        @endif

                    @else
                        @if(auth()->user()->type === 'admin')
                            <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')" class="ml-4">
                                {{ __('Dashboard') }}
                            </x-nav-link>

                        @endif

                </div>
            </div>

            <!-- Authentication Links -->
            <div class="flex items-center">

                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
