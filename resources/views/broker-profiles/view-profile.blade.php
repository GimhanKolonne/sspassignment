<x-app-layout>
    <div class="bg-transparent min-h-screen p-4 md:p-6">
        <div class="bg-gradient-to-r from-green-600 to-green-400 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col md:flex-row items-center">
                <div class="w-40 h-40 md:w-56 md:h-56 rounded-full overflow-hidden border-4 border-white shadow-lg mb-8 md:mb-0 md:mr-10">
                    <img src="{{ $brokerProfile->user->profilePhotoUrl }}" alt="Broker Photo" class="w-full h-full object-cover">
                </div>
                <div class="text-center md:text-left md:ml-6">
                    <h1 class="text-4xl md:text-5xl font-bold text-green-100">{{ $brokerProfile->user->name}}</h1>
                    <div class="mt-6 flex flex-wrap justify-center md:justify-start gap-3">
                        <span class="px-4 py-2 bg-green-700 rounded-full text-sm font-semibold text-green-100">{{ $brokerProfile->years_experience }} Years Experience</span>
                        <span class="px-4 py-2 bg-green-700 rounded-full text-sm font-semibold text-green-100">Licence Number {{ $brokerProfile->license_number }}</span>
                    </div>
                </div>
            </div>
        </div>
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
</x-app-layout>
