<x-app-layout>
    <div class="bg-gradient-to-b from-green-50 to-white min-h-screen pt-28">


        <main class="container mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <section class="text-center mb-24">
                <h1 class="text-green-800 font-extrabold text-4xl sm:text-5xl md:text-6xl leading-tight font-serif mb-6">
                    The start of a new era in<br>Sri Lanka's real estate.
                </h1>
                <p class="text-green-600 text-lg sm:text-xl leading-relaxed font-serif font-light max-w-3xl mx-auto mb-8">
                    Introducing the most advanced, streamlined and user-friendly showing management ecosystem in Sri Lanka.
                </p>
                <a href="/learnmore" class="inline-block bg-green-600 hover:bg-green-500 transition duration-300 rounded-full px-8 py-3 text-white font-semibold text-lg">
                    Learn More
                </a>
                @if(auth()->user() && auth()->user()->type === 'broker' && !auth()->user()->brokerProfile)
                <a href="{{ route('broker-profile.create') }}" class="inline-block bg-green-600 hover:bg-green-500 transition duration-300 rounded-full px-8 py-3 text-white font-semibold text-lg">
                    Create your profile
                </a>
                @endif
            </section>

            <section class="mb-24">
                <h2 class="text-green-700 font-bold text-3xl sm:text-4xl mb-8 text-center">An integrated brokerage software suite</h2>
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <p class="text-green-800 text-lg sm:text-xl leading-relaxed font-normal max-w-4xl mx-auto mb-8">
                        Presenting the most advanced, adaptable, and automated board-wide ecosystem in Sri Lanka. Sync your brokerages effortlessly, optimize appointment scheduling, streamline offer registrations, establish uniform electronic lock-box access, leverage call centres effectively, and much more—all within a single integrated platform.
                    </p>
                    <div class="text-center">
                        <a href="/aboutus" class="inline-flex items-center text-green-600 hover:text-green-700 transition duration-300 group text-lg font-semibold">
                            <span class="group-hover:underline">Learn about our product</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            <section class="mb-24">
                <h2 class="text-green-800 font-bold text-3xl sm:text-4xl text-center mb-12">Trusted by the best and brightest</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-lg p-8 text-white text-center transform transition duration-500 hover:scale-105 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h3 class="text-2xl font-bold mb-4">Brokers</h3>
                        <p class="text-base font-medium">Fully integrated and flexible call centre options. All day, any day, every day.</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-lg p-8 text-white text-center transform transition duration-500 hover:scale-105 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <h3 class="text-2xl font-bold mb-4">Answering Services</h3>
                        <p class="text-base font-medium">Our Advanced Showing Management Ecosystems drastically reduces agent and staff workload.</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-lg p-8 text-white text-center transform transition duration-500 hover:scale-105 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="text-2xl font-bold mb-4">Showing Management</h3>
                        <p class="text-base font-medium">Real-time market analytics engine gain deep insights into the market on demand.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-green-800 text-white py-8">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p>&copy; 2024 LeaseShark. All rights reserved.</p>
            </div>
        </footer>
    </div>
</x-app-layout>
