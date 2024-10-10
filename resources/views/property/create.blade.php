@extends('layouts.property')

@section('content')
    <div class="bg-transparent py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-6 px-6 sm:px-8">
                    <div class="flex items-center justify-between mb-4">
                        <button onclick="history.back()" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white bg-opacity-20 text-white hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200" aria-label="Go Back">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </button>
                        <h2 class="text-3xl font-bold">Create New Property</h2>
                    </div>
                    <p class="text-green-100">Fill in the details below to add a new property listing.</p>
                </div>
                <form action="{{ route('property.store') }}" method="POST" class="p-6 sm:p-8 space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Property Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" required>
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price" class="block w-full pl-7 pr-12 rounded-md border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" placeholder="0.00" required>
                            </div>
                        </div>
                        <div>
                            <label for="listedFor" class="block text-sm font-medium text-gray-700">Listed For</label>
                            <select name="listedFor" id="listedFor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" required>
                                <option value="">Select an option</option>
                                <option value="sale">Sale</option>
                                <option value="rent">Rent</option>
                            </select>
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" required>
                        </div>
                        <!-- Images Upload -->
                        <div class="sm:col-span-2">
                            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200" accept="image/*">
                            <p class="mt-2 text-sm text-gray-500">You can upload multiple images.</p>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
