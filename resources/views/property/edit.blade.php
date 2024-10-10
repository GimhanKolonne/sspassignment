@extends('layouts.property')

@section('content')
    <div class="bg-transparent py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white  shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-6 px-6 sm:px-8">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-3xl font-bold">Edit Property</h2>
                    </div>
                    <p class="mt-2 text-green-100">Update the details of your property listing.</p>
                </div>

                <form action="{{ route('property.update', $properties->id) }}" method="POST" class="p-6 sm:p-8 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Property Name</label>
                            <input type="text" id="name" name="name" value="{{ $properties->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" required>
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="text" id="price" name="price" value="{{ $properties->price }}" class="block w-full pl-7 pr-12 rounded-md border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" placeholder="0.00" required>
                            </div>
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" id="location" name="location" value="{{ $properties->location }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" required>
                        </div>
                        <div>
                            <label for="listedFor" class="block text-sm font-medium text-gray-700">Listed For</label>
                            <select id="listedFor" name="listedFor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200">
                                <option value="Sell" {{ $properties->listedFor == 'Sell' ? 'selected' : '' }}>Sell</option>
                                <option value="Lease" {{ $properties->listedFor == 'Lease' ? 'selected' : '' }}>Lease</option>
                            </select>
                        </div>
                        <!-- Images Upload -->
                        <div>
                            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" accept="image/*">
                            <p class="mt-2 text-sm text-gray-500">You can upload multiple images.</p>
                        </div>
                    </div>
                    <div class="pt-4 flex items-center justify-between">
                        <a href="{{ route('properties') }}" class="text-green-600 hover:text-green-800 font-medium transition duration-200">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                            Update Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
