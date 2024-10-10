@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-green-100 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-green-800 mb-6">Property Listings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-2">{{ $property->name }}</h3>
                            <p class="text-gray-600"><span class="font-medium text-green-600">Price:</span> ${{ number_format($property->price, 2) }}</p>
                            <p class="text-gray-600"><span class="font-medium text-green-600">Listed For:</span> {{ $property->listedFor }}</p>
                            <p class="text-gray-600"><span class="font-medium text-green-600">Location:</span> {{ $property->location }}</p>
                            <p class="text-gray-600"><span class="font-medium text-green-600">Seller:</span> {{ $property->seller->name }}</p>
                        </div>
                        <div class="bg-green-50 px-6 py-4">
                            <form action="{{ route('admin.property.delete', [$property->id]) }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
