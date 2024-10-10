<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('broker-profile.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf

                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="license_number" value="{{ __('License Number') }}" />
                                <x-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')" required />
                            </div>
                            <div>
                                <x-label for="years_experience" value="{{ __('Years of Experience') }}" />
                                <x-input id="years_experience" class="block mt-1 w-full" type="number" name="years_experience" :value="old('years_experience')" required />
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Professional Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="specializations" value="{{ __('Specializations') }}" />
                                <x-input id="specializations" class="block mt-1 w-full" type="text" name="specializations" :value="old('specializations')" required placeholder="e.g., Residential, Commercial, Luxury" />
                            </div>
                            <div>
                                <x-label for="certifications" value="{{ __('Certifications') }}" />
                                <x-input id="certifications" class="block mt-1 w-full" type="text" name="certifications" :value="old('certifications')" placeholder="e.g., CRS, ABR, SRES" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Education and Background</h3>
                        <div>
                            <x-label for="education" value="{{ __('Education') }}" />
                            <x-input id="education" class="block mt-1 w-full" type="text" name="education" :value="old('education')" placeholder="e.g., Bachelor's in Business Administration, Real Estate courses" />
                        </div>
                        <div class="mt-4">
                            <x-label for="bio" value="{{ __('Bio') }}" />
                            <textarea id="bio" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="bio" rows="4" required placeholder="Tell potential clients about yourself and your approach to real estate...">{{ old('bio') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Services and Areas</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="services" value="{{ __('Services Offered') }}" />
                                <x-input id="services" class="block mt-1 w-full" type="text" name="services" :value="old('services')" required placeholder="e.g., Buying, Selling, Property Management" />
                            </div>
                            <div>
                                <x-label for="areas_served" value="{{ __('Areas Served') }}" />
                                <x-input id="areas_served" class="block mt-1 w-full" type="text" name="areas_served" :value="old('areas_served')" required placeholder="e.g., Downtown, Suburbs, Specific Neighborhoods" />
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center justify-end mt-6">
                        <x-button class="ml-4">
                            {{ __('Create Profile') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
