@extends('layouts.property')

@section('content')
    <div class="bg-transparent min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        @if($properties->isEmpty())
            <div class="bg-white rounded-lg p-8 text-center shadow-md">
                <p class="text-gray-600 text-xl mb-4">No properties found.</p>
                <a href="{{ route('property.create') }}" class="inline-block bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-300 ease-in-out">Add New Property</a>
            </div>
        @else
            <div id="propertyGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($properties as $property)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-green-700 mb-3">{{ $property->name }}</h2>
                            <div class="space-y-2">
                                <p class="text-gray-700"><span class="font-medium text-green-600">Price:</span> ${{ number_format($property->price, 2) }}</p>
                                <p class="text-gray-700"><span class="font-medium text-green-600">Listed For:</span> {{ $property->listedFor }}</p>
                                <p class="text-gray-700"><span class="font-medium text-green-600">Location:</span> {{ $property->location }}</p>
                                <p class="text-gray-700"><span class="font-medium text-green-600">Seller:</span> {{ $property->seller->name }}</p>
                            </div>
                        </div>
                        <div class="bg-green-50 px-6 py-4 flex flex-wrap justify-between items-center">
                            <div class="space-x-4 mb-2 sm:mb-0">
                                <a href="{{ route('property.edit', $property->id) }}" class="text-blue-600 hover:text-blue-800 font-medium transition duration-300 ease-in-out">Edit</a>
                                <form action="{{ route('property.destroy', $property->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition duration-300 ease-in-out" onclick="return confirm('Are you sure you want to delete this property?')">Delete</button>
                                </form>
                            </div>
                            <button class="text-green-600 hover:text-green-800 font-medium transition duration-300 ease-in-out view-images-btn" data-property-id="{{ $property->id }}">View Images</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $properties->links() }}
            </div>
        @endif
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden flex items-center justify-center z-50">
        <div class="relative w-full max-w-4xl mx-auto">
            <button id="closeModal" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
            <div id="modalContent" class="bg-white rounded-lg p-8">
                <h2 id="modalTitle" class="text-2xl font-semibold text-green-700 mb-4"></h2>
                <div id="imageContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const propertyGrid = document.getElementById('propertyGrid');
            const imageModal = document.getElementById('imageModal');
            const modalTitle = document.getElementById('modalTitle');
            const imageContainer = document.getElementById('imageContainer');
            const closeModal = document.getElementById('closeModal');

            propertyGrid.addEventListener('click', function(e) {
                if (e.target.classList.contains('view-images-btn')) {
                    const propertyId = e.target.getAttribute('data-property-id');
                    const propertyName = e.target.closest('.bg-white').querySelector('h2').textContent;
                    showImages(propertyId, propertyName);
                }
            });

            closeModal.addEventListener('click', function() {
                closeModalFunction();
            });

            imageModal.addEventListener('click', function(e) {
                if (e.target === imageModal) {
                    closeModalFunction();
                }
            });

            function closeModalFunction() {
                imageModal.classList.add('hidden');
                imageContainer.innerHTML = '';
                modalTitle.textContent = '';
            }

            function showImages(propertyId, propertyName) {
                fetch(`/property/${propertyId}/images`)
                    .then(response => response.json())
                    .then(data => {
                        modalTitle.textContent = propertyName;
                        imageContainer.innerHTML = '';

                        if (data.images && data.images.length > 0) {
                            data.images.forEach(image => {
                                const imgElement = document.createElement('img');
                                imgElement.src = `/storage/${image}`;
                                imgElement.alt = propertyName;
                                imgElement.className = 'w-full h-64 object-cover rounded-lg';
                                imageContainer.appendChild(imgElement);
                            });
                        } else {
                            imageContainer.innerHTML = '<p class="text-gray-600">No images available for this property.</p>';
                        }

                        imageModal.classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error fetching images:', error);
                        imageContainer.innerHTML = '<p class="text-red-600">Error loading images. Please try again later.</p>';
                        imageModal.classList.remove('hidden');
                    });
            }

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const propertyCards = propertyGrid.querySelectorAll('.bg-white');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                propertyCards.forEach(card => {
                    const propertyName = card.querySelector('h2').textContent.toLowerCase();
                    const propertyLocation = card.querySelector('span:nth-of-type(3)').nextSibling.textContent.toLowerCase();

                    if (propertyName.includes(searchTerm) || propertyLocation.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
