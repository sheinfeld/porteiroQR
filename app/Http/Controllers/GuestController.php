<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::paginate(20);

        return view('guests.index', [
            'guests' => $guests,
        ]);
    }

    public function create()
    {
        return view('guests.create', [
            'guest' => null,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $guest = Guest::create($validated);

        return redirect()->route('guests.show', $guest);
    }

    public function edit(Guest $guest)
    {
        return view('guests.create', [
            'guest' => $guest,
        ]);
    }

    public function update(Request $request, Guest $guest)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $guest->update($validated);

        return redirect()->route('guests.index', $guest);
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index');
    }

    public function reset(Guest $guest)
    {
        $guest->update([
            'arrived_at' => null,
        ]);

        toastr()->warning('Guest arrival reset');

        return redirect()->route('guests.index');
    }

    public function show(Guest $guest)
    {
        return view('guests.show', [
            'guest' => $guest,
        ]);
    }

    public function scan(Guest $guest)
    {
        if (!auth()->user()) {
            return redirect()->to('https://instagram.com/what.happened.yesterday_?igshid=YmMyMTA2M2Y=');
        }

        try {
            if ($guest->arrived_at) {
                toastr()->error('Guest already scanned in');
                return redirect()->route('guests.index');
            }

            $guest->update([
                'arrived_at' => now(),
            ]);

            toastr()->success('Guest scanned in');

            return redirect()->route('guests.index');
        } catch (\Exception $e) {
            toastr()->error('Something went wrong');
            return redirect()->route('guests.index');
        }
    }
}
