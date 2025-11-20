<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ParticipantsImport;
use App\Models\Participant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::paginate(50);
        return view('admin.participants.index', compact('participants'));
    }

    public function create()
    {
        return view('admin.participants.create');
    }
    public function singlycreate()
    {
        return view('admin.participants.singlecreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code_number' => 'required|string|unique:participants,code_number',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'notes' => 'nullable|string',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
        ]);

        Participant::create($validated);

        return redirect()->route('participants.index')->with('success', 'Participant added!');
    }

    public function edit(Participant $participant)
    {
        return view('admin.participants.edit', compact('participant'));
    }
    public function show(Participant $participant)
    {
        return view('admin.participants.show', compact('participant'));
    }

    public function update(Request $request, Participant $participant)
    {
        $participant->update($request->all());
        return redirect()->route('participants.index')->with('success', 'Participant updated!');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant deleted!');
    }

    public function importForm()
    {
        return view('admin.participants.import');
    }

    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,csv'
    //     ]);

    //     Excel::import(new ParticipantsImport, $request->file('file'));

    //     return redirect()->route('admin.participants.index')->with('success', 'Participants imported successfully!');
    // }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ParticipantsImport(), $request->file('file'));

        return redirect()->route('participants.index')->with('success', 'Participants imported successfully!');
    }
}
