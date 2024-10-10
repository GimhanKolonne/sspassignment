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

            <div class="mb-10 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <a href="{{ route('property.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-lg flex items-center justify-center w-full md:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add New Property
                </a>
                <form action="{{ route('properties') }}" method="GET" class="flex w-full md:w-auto">
                    <input type="text" name="search" placeholder="Search properties..." class="px-4 py-2 border border-gray-300 rounded-l-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent flex-grow">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-r-full transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Content Area -->
            <div id="details" class="bg-transparent p-8 ">
                @yield('content')
            </div>
        </div>
    </div>


</x-app-layout>
