<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Paginated list (for after-registration page)
    public function index(Request $r)
    {
        $perPage = 50;  // tuneable
        $query = Participant::query()->orderBy('serial_number');
        $participants = $query->paginate($perPage);
        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminIndex()
    {
        $participants = Participant::orderBy('serial_number')->paginate(20);
        return view('admin.participants.index', compact('participants'));
    }

    public function create()
    {
        return view('admin.participants.create');
    }

    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        return view('admin.participants.edit', compact('participant'));
    }

    public function update(Request $r, $id)
    {
        $participant = Participant::findOrFail($id);
        $validated = $r->validate([
            'serial_number' => 'required|integer',
            'code_number' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string'
        ]);
        $participant->update($validated);
        return redirect()->route('admin.participants.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        Participant::destroy($id);
        return back()->with('success', 'Deleted');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validated = $r->validate([
            'serial_number' => 'required|integer|unique:participants,serial_number',
            'code_number' => 'required|string',
            'name' => 'required|string|max:255',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $participant = Participant::create($validated);
        return redirect()->route('participants.thankyou');
    }

    /**
     * Display the specified resource.
     */
    // API endpoint to fetch participant details JSON (for modal)
    public function show(Participant $participant)
    {
        return response()->json($participant);
    }

    /**
     * Show the form for editing the specified resource.
     */
}
