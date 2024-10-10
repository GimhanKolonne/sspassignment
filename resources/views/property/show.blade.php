@extends('layouts.property')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($properties as $property)
                                    <div class="p-6">
                                        <p><strong>Property Name:</strong> {{ $property->name }}</p>
                                        <p><strong>Price:</strong> {{ $property->price }}</p>
                                        <p><strong>Listed For:</strong> {{ $property->listedFor }}</p>
                                        <p><strong>Location:</strong> {{ $property->location }}</p>
                                        <p><strong>Seller:</strong> {{ $property->seller->name }}</p>
                                        <div class="flex">
                                            <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
                                                <a href="{{ route('admin.property.edit', $property->id) }}">Edit</a>
                                            </x-button>

                                            <form action="{{route('admin.property.delete', [$property->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
                                                    <a type="submit">Delete</a>
                                                </x-button>
                                            </form>

                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
