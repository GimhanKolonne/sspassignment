<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::where('seller_id', auth()->user()->id);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('location', 'like', "%{$searchTerm}%")
                    ->orWhere('listedFor', 'like', "%{$searchTerm}%");
            });
        }

        $properties = $query->paginate(10);
        return view('property.index', compact('properties'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $properties = Property::where('name', 'like', "%{$searchTerm}%")
            ->orWhere('location', 'like', "%{$searchTerm}%")
            ->orWhere('listedFor', 'like', "%{$searchTerm}%")
            ->paginate(10);

        return view('property.index', compact('properties'));
    }


    public function create()
    {
        return view('property.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'listedFor' => 'required|string',
            'location' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);

        $property = new Property($validated);
        $property->seller_id = auth()->user()->id;

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $imagePaths[] = $path;
            }
            $property->images = json_encode($imagePaths);
        }

        $property->save();

        return redirect()->route('properties')->with('success', 'Property created successfully.');
    }

    public function edit($id)
    {
        $properties = Property::find($id);
        return view('property.edit', compact('properties'));
    }


    public function show(Property $property)
    {
        $properties = Property::all();

        return view('property.show', compact('properties'));
    }
    public function getImages($id)
    {
        $property = Property::findOrFail($id);
        $images = json_decode($property->images) ?? [];
        return response()->json(['images' => $images]);
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'listedFor' => 'required|string',
            'location' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);

        $property->update($validated);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $imagePaths[] = $path;
            }
            $property->images = json_encode($imagePaths);
        }

        $property->save();

        return redirect()->route('properties')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {

        $property->delete();

        return redirect()->route('properties');
    }


    public function findProperties(Request $request)
    {
        $search = $request->input('search');
        $priceSort = $request->input('price_sort');
        $listedFor = $request->input('listed_for');

        $query = Property::query();

        // Search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhereHas('seller', function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Listed For filter
        if ($listedFor) {
            $query->where('listedFor', $listedFor);
        }

        // Price sorting
        if ($priceSort) {
            $query->orderByRaw('CAST(REPLACE(price, "$", "") AS DECIMAL(10,2)) ' .
                ($priceSort === 'low_to_high' ? 'asc' : 'desc'));
        }

        $properties = $query->paginate(12)->withQueryString();

        $listedForOptions = Property::distinct()->pluck('listedFor')->sort()->values();

        return view('property.property-list', compact('properties', 'listedForOptions'));
    }

    public function viewProperty($id)
    {
        $property = Property::findOrFail($id);
        return view('property.view-details', compact('property'));
    }


}
