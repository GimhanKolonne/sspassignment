<x-app-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold mb-12 text-center text-gray-800">Explore Broker Profiles</h1>

            @if($brokerProfiles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($brokerProfiles as $profile)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="{{ $profile->user->profilePhotoUrl }}" alt="{{ $profile->user->name }}">
                                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                            </div>
                            <div class="p-6">
                                <h2 class="text-2xl font-semibold mb-4 text-gray-800">{{ $profile->user->name }}</h2>
                                <div class="space-y-3">
                                    @if($profile->license_number)
                                        <p class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                                            License: {{ $profile->license_number }}
                                        </p>
                                    @endif
                                    @if($profile->years_experience)
                                        <p class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                            Experience: {{ $profile->years_experience }} years
                                        </p>
                                    @endif
                                    @if($profile->specializations)
                                        <p class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd"/></svg>
                                            Specializations: {{ Str::limit($profile->specializations, 50) }}
                                        </p>
                                    @endif
                                    @if($profile->areas_served)
                                        <p class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                            Areas Served: {{ Str::limit($profile->areas_served, 50) }}
                                        </p>
                                    @endif
                                </div>
                                <div class="mt-6">
                                    <a href="{{ route('broker-profiles.view', $profile) }}" class="inline-block w-full text-center bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">View Full Profile</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $brokerProfiles->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-xl text-gray-700 mb-2">No broker profiles found.</p>
                    <p class="text-gray-500">Check back later or try adjusting your search criteria.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
