<x-app-layout>
    <div class="bg-gradient-to-b from-green-50 to-green-100 min-h-screen">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-5xl font-extrabold text-green-800 mb-10 text-center">
                Property Listings
            </h1>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-lg shadow-md animate-fade-in-down" role="alert">
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            @endif



            <!-- Content Area -->
            <div id="details" class="bg-transparent p-8  ">
                @yield('content')
            </div>
        </div>
    </div>


</x-app-layout>
