@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-green-100 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-green-700 mb-6">User List</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($users as $user)
                        <div class="bg-green-50 rounded-lg p-6 shadow transition duration-300 ease-in-out hover:shadow-lg">
                            <h3 class="text-xl font-semibold text-green-800 mb-4">{{ $user->name }}</h3>
                            <ul class="space-y-2 text-green-700">
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                                <li><strong>Role:</strong> {{ $user->type }}</li>
                                <li><strong>Created:</strong> {{ $user->created_at->format('M d, Y') }}</li>
                                <li><strong>Updated:</strong> {{ $user->updated_at->format('M d, Y') }}</li>
                            </ul>
                            <div class="mt-6 flex space-x-4">

                                <form action="{{ route('admin.user.delete', [$user->id]) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out" onclick="return confirm('Are you sure you want to delete this user?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
