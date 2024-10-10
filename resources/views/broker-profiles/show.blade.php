@extends('layouts.profile')

@section('content')
    <div class="bg-transparent min-h-screen p-4 md:p-6">

        <!-- Main Content -->
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 sticky top-6">
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Quick Info</h2>
                    <ul class="space-y-3">
                        @php
                            $quickInfo = [
                                'Specializations' => $brokerProfile->specializations,
                                'Certifications' => $brokerProfile->certifications,
                                'Education' => $brokerProfile->education,
                                'Areas Served' => $brokerProfile->areas_served,
                            ];
                        @endphp
                        @foreach ($quickInfo as $title => $info)
                            <li>
                                <span class="font-medium text-gray-700">{{ $title }}:</span>
                                <span class="text-gray-600">{{ $info ?? 'N/A' }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('broker-profile.edit', $brokerProfile->id) }}"
                           class="w-full block text-center bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition duration-300 shadow-md">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="md:w-3/4">
                <div class="space-y-6">
                    <!-- Bio Section -->
                    <div class="bg-white rounded-lg shadow-lg p-4 md:p-6">
                        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">About Me</h2>
                        <p class="text-gray-700">{{ $brokerProfile->bio ?? 'No bio available.' }}</p>
                    </div>

                    <!-- Services Offered -->
                    <div class="bg-white rounded-lg shadow-lg p-4 md:p-6">
                        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Services Offered</h2>
                        <ul class="list-disc list-inside text-gray-700">
                            @forelse(explode(',', $brokerProfile->services) as $service)
                                <li>{{ trim($service) }}</li>
                            @empty
                                <li>No services listed.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-lg shadow-lg p-4 md:p-6">
                        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Recent Transactions</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Sample data, replace with actual data from your backend -->
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">123 Main St</td>
                                    <td class="px-4 py-4 whitespace-nowrap">Sale</td>
                                    <td class="px-4 py-4 whitespace-nowrap">2023-09-15</td>
                                    <td class="px-4 py-4 whitespace-nowrap">$450,000</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">456 Elm St</td>
                                    <td class="px-4 py-4 whitespace-nowrap">Rental</td>
                                    <td class="px-4 py-4 whitespace-nowrap">2023-08-01</td>
                                    <td class="px-4 py-4 whitespace-nowrap">$2,500/mo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
