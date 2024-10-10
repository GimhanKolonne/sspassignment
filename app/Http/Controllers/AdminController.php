<?php

namespace App\Http\Controllers;

use App\Models\BrokerProfile;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::where('type', 'user')->count();
        $propertyCount = Property::count();
        $brokerCount = User::where('type', 'broker')->count();

        return view('admin.dashboard', compact('userCount', 'propertyCount', 'brokerCount'));
    }

    public function propertyIndex()
    {
        $userCount = User::where('type', 'user')->count();
        $propertyCount = Property::count();
        $brokerCount = User::where('type', 'broker')->count();
        $properties = Property::all();
        return view('admin.propertyoption', ['properties' => $properties], compact('userCount', 'propertyCount', 'brokerCount'));


    }

    public function showUsers()
    {
        $userCount = User::where('type', 'user')->count();
        $propertyCount = Property::count();
        $brokerCount = User::where('type', 'broker')->count();
        $users = User::where('type', 'user')->get();
        return view('admin.userdetails',['users' => $users], compact('userCount', 'propertyCount', 'brokerCount'));
    }

    public function updateUserSubmit(Request $request)
    {

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('admin.user');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user');
    }

    public function brokers()
    {
        $userCount = User::where('type', 'user')->count();
        $propertyCount = Property::count();
        $brokerCount = User::where('type', 'broker')->count();
        $brokers = User::where('type', 'broker')->get();
        return view('admin.brokers',['brokers' => $brokers], compact('userCount', 'propertyCount', 'brokerCount'));
    }

    public function deleteBroker($id)
    {
        $broker = User::where('type', 'broker')->findOrFail($id);
        $broker->delete();
        return redirect()->route('admin.broker')->with('success', 'Broker deleted successfully');
    }

}
