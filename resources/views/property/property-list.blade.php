@extends('layouts.propertyList')

@section('content')
    <div class="bg-transparent min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form action="{{ route('property.list') }}" method="GET" class="mb-8">
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex-1">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Properties</label>
                        <input type="text"
                               name="search"
                               id="search"
                               placeholder="Search by property name, location, or seller..."
                               value="{{ request('search') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Search
                        </button>
                        <a href="{{ route('property.list') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Clear Filters
                        </a>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <!-- Price Filter -->
                    <div class="flex flex-wrap gap-2">
                        <span class="text-sm font-medium text-gray-700">Price:</span>
                        <a href="{{ request()->fullUrlWithQuery(['price_sort' => 'low_to_high']) }}"
                           class="px-4 py-2 text-sm {{ request('price_sort') === 'low_to_high' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-800' }} rounded-full hover:bg-green-600 hover:text-white transition-colors">
                            Low to High
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['price_sort' => 'high_to_low']) }}"
                           class="px-4 py-2 text-sm {{ request('price_sort') === 'high_to_low' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-800' }} rounded-full hover:bg-green-600 hover:text-white transition-colors">
                            High to Low
                        </a>
                    </div>

                    <!-- Listed For Filter -->
                    <div class="flex flex-wrap gap-2">
                        <span class="text-sm font-medium text-gray-700">Listed For:</span>
                        @foreach($listedForOptions as $option)
                            <a href="{{ request()->fullUrlWithQuery(['listed_for' => $option]) }}"
                               class="px-4 py-2 text-sm {{ request('listed_for') === $option ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-800' }} rounded-full hover:bg-green-600 hover:text-white transition-colors">
                                {{ $option }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </form>

            <!-- Active Filters Display -->
            @if(request('search') || request('price_sort') || request('listed_for'))
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Active Filters:</h3>
                    <div class="flex flex-wrap gap-2">
                        @if(request('search'))
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                Search: {{ request('search') }}
                            </span>
                        @endif
                        @if(request('price_sort'))
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                Price: {{ request('price_sort') === 'low_to_high' ? 'Low to High' : 'High to Low' }}
                            </span>
                        @endif
                        @if(request('listed_for'))
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                Listed For: {{ request('listed_for') }}
                            </span>
                        @endif
                    </div>
                </div>
            @endif

            <div id="propertyGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($properties as $property)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="relative">
                            @if($property->images && json_decode($property->images))
                                <img src="{{ asset('storage/' . json_decode($property->images)[0]) }}" alt="{{ $property->name }}" class="w-full h-48 object-cover">
                            @else
                                <div class="flex items-center justify-center w-full h-48 bg-gray-200 text-gray-600 text-4xl font-bold">
                                    {{ strtoupper(substr($property->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-green-700 mb-3">{{ $property->name }}</h2>
                            <div class="space-y-2">
                                <p class="text-gray-700"><span class="font-medium text-green-600">Price:</span>
                                    ${{ number_format($property->price, 2) }}</p>
                                <p class="text-gray-700"><span class="font-medium text-green-600">Listed For:</span> {{ $property->listedFor }}</p>
                                <p class="text-gray-700"><span class="font-medium text-green-600">Location:</span> {{ $property->location }}</p>
                            </div>
                        </div>
                        <div class="bg-green-50 px-6 py-4 flex flex-wrap justify-between items-center">
                            <a href="{{ route('property.view', $property->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium transition duration-300 ease-in-out">View
                                Details</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 text-xl">No properties found matching your criteria.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
@endsection
