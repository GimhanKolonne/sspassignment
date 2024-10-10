@extends('layouts.profile')

@section('content')
    <div class="bg-gray-100 min-h-screen p-4 md:p-6">

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>

            <form action="{{ route('broker-profile.update', $brokerProfile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- License Number -->
                    <div>
                        <label for="license_number" class="block font-medium text-gray-700">License Number</label>
                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $brokerProfile->license_number) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Years of Experience -->
                    <div>
                        <label for="years_experience" class="block font-medium text-gray-700">Years of Experience</label>
                        <input type="number" id="years_experience" name="years_experience" value="{{ old('years_experience', $brokerProfile->years_experience) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Specializations -->
                    <div>
                        <label for="specializations" class="block font-medium text-gray-700">Specializations</label>
                        <input type="text" id="specializations" name="specializations" value="{{ old('specializations', $brokerProfile->specializations) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Certifications -->
                    <div>
                        <label for="certifications" class="block font-medium text-gray-700">Certifications</label>
                        <input type="text" id="certifications" name="certifications" value="{{ old('certifications', $brokerProfile->certifications) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Education -->
                    <div>
                        <label for="education" class="block font-medium text-gray-700">Education</label>
                        <input type="text" id="education" name="education" value="{{ old('education', $brokerProfile->education) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Areas Served -->
                    <div>
                        <label for="areas_served" class="block font-medium text-gray-700">Areas Served</label>
                        <input type="text" id="areas_served" name="areas_served" value="{{ old('areas_served', $brokerProfile->areas_served) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Bio -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="bio" class="block font-medium text-gray-700">About Me</label>
                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('bio', $brokerProfile->bio) }}</textarea>
                    </div>

                    <!-- Services Offered -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="services" class="block font-medium text-gray-700">Services Offered</label>
                        <textarea id="services" name="services" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('services', $brokerProfile->services) }}</textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
