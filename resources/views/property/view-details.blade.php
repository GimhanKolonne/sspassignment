@extends('layouts.propertyList')

@section('content')
    <div class="bg-transparent min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-6 flex items-center">
                <button onclick="history.back()" class="bg-white text-green-600 px-4 py-2 rounded-md shadow hover:bg-green-50 transition duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="relative">

                </div>

                <div class="p-8">
                    <h1 class="text-4xl font-bold text-green-700 mb-4">{{ $property->name }}</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="bg-green-50 p-6 rounded-lg">
                            <p class="text-xl text-gray-800 mb-2"><span class="font-medium text-green-600">Price:</span> ${{ number_format($property->price) }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-medium text-green-600">Listed For:</span> {{ $property->listedFor }}</p>
                            <p class="text-gray-700"><span class="font-medium text-green-600">Location:</span> {{ $property->location }}</p>
                        </div>
                        <div class="flex items-center justify-center">
                            <a href="{{ route('property.contact', $property->id) }}" class="bg-green-600 text-white px-8 py-4 rounded-md hover:bg-green-700 transition duration-300 text-lg font-semibold">
                                Contact Seller
                            </a>
                        </div>
                    </div>

                    @if($property->images && json_decode($property->images))
                        <div class="mb-8">
                            <h2 class="text-2xl font-semibold text-green-700 mb-4">Property Gallery</h2>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="property-images">
                                @foreach(json_decode($property->images) as $index => $image)
                                    <a href="{{ asset('storage/' . $image) }}" class="block" data-lightbox="property-gallery">
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $property->name }} - Image {{ $index + 1 }}" class="w-full h-40 object-cover rounded-lg shadow-md hover:opacity-75 transition duration-300">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="border-t pt-6">
                        <p class="text-gray-600 text-right">Listed by: <span class="font-semibold">{{ $property->seller->name ?? 'Unknown' }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <style>
        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%;
        }
        .aspect-w-16 > img {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
