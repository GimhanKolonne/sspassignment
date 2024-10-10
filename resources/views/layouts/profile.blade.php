<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 to-green-400 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col md:flex-row items-center">
            <div class="w-40 h-40 md:w-56 md:h-56 rounded-full overflow-hidden border-4 border-white shadow-lg mb-8 md:mb-0 md:mr-10">
                <img src="{{ auth()->user()->profilePhotoUrl }}" alt="Broker Photo" class="w-full h-full object-cover">
            </div>
            <div class="text-center md:text-left md:ml-6">
                <h1 class="text-4xl md:text-5xl font-bold text-green-100">{{ auth()->user()->name}}</h1>
                <div class="mt-6 flex flex-wrap justify-center md:justify-start gap-3">
                    <span class="px-4 py-2 bg-green-700 rounded-full text-sm font-semibold text-green-100">{{ $brokerProfile->years_experience }} Years Experience</span>
                    <span class="px-4 py-2 bg-green-700 rounded-full text-sm font-semibold text-green-100">Licence Number {{ $brokerProfile->license_number }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    @yield('content')


        </div>
    </div>
</x-app-layout>
