<?php

namespace App\Http\Controllers;
use App\Models\BrokerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrokerProfileController extends Controller
{
    public function create()
    {
        return view('broker-profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_number' => 'required|string|max:255',
            'years_experience' => 'required|integer',
            'specializations' => 'required|string',
            'certifications' => 'nullable|string',
            'education' => 'nullable|string',
            'bio' => 'required|string',
            'services' => 'required|string',
            'areas_served' => 'required|string',
        ]);

        $profile = new BrokerProfile($validated);
        $profile->user_id = auth()->id();


        $profile->save();

        return redirect()->route('broker-profile.show',  auth()->user()->brokerProfile)->with('success', 'Broker profile created successfully!');
    }

    public function edit(BrokerProfile $brokerProfile)
    {
        return view('broker-profiles.edit', compact('brokerProfile'));
    }

    public function update(Request $request, BrokerProfile $brokerProfile)
    {
        $validated = $request->validate([
            'license_number' => 'required|string|max:255',
            'years_experience' => 'required|integer',
            'specializations' => 'required|string',
            'certifications' => 'nullable|string',
            'education' => 'nullable|string',
            'bio' => 'required|string',
            'services' => 'required|string',
            'areas_served' => 'required|string',
        ]);

        $brokerProfile->update($validated);

        return redirect()->route('broker-profile.show',  auth()->user()->brokerProfile)->with('success', 'Broker profile updated successfully!');
    }

    public function destroy(BrokerProfile $brokerProfile)
    {
        $brokerProfile->delete();

        return redirect()->route('dashboard')->with('success', 'Broker profile deleted successfully!');
    }

    public function show(BrokerProfile $brokerProfile)
    {
        $brokerProfile = BrokerProfile::where('user_id', auth()->id())->first();

        return view('broker-profiles.show', compact('brokerProfile'));
    }

    public function exploreBrokers()
    {
        $brokerProfiles = BrokerProfile::with('user')->paginate(15);
        return view('broker-profiles.index', compact('brokerProfiles'));
    }

    public function showBrokers($id)
    {
        $brokerProfile = BrokerProfile::findOrFail($id);
        return view('broker-profiles.view-profile', compact('brokerProfile'));
    }


}
