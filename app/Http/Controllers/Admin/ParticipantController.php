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
        $participants = Participant::orderBy('video_chain_serial', 'asc')->paginate(1000);
        return view('admin.participants.index', compact('participants'));
    }

    public function userDashboard()
    {
        $participants = Participant::orderBy('video_chain_serial', 'asc')->paginate(10000);
        return view('web.participants.dashboard', compact('participants'));
    }

    public function create()
    {
        return view('admin.participants.create');
    }

    public function singlycreate()
    {
        return view('admin.participants.singlecreate');
    }

    /**
     * Extract Google Drive File ID from full URL or plain ID
     */
    private function extractDriveId($value)
    {
        if (!$value)
            return null;

        if (str_contains($value, 'drive.google.com')) {
            preg_match('/\/d\/(.*?)\//', $value, $match);
            return $match[1] ?? null;
        }

        return $value;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_taken' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'camera_no' => 'nullable|string|max:50',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
            'image_library_file_no' => 'nullable|string',
            'video_library_file_no' => 'nullable|string',
            'video_chain_serial' => 'nullable|string',
        ]);

        $validated['drive_video_file_id'] = $this->extractDriveId($validated['drive_video_file_id']);
        $validated['drive_image_file_id'] = $this->extractDriveId($validated['drive_image_file_id']);

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
        $validated = $request->validate([
            'date_taken' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'camera_no' => 'nullable|string|max:50',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
            'image_library_file_no' => 'nullable|string',
            'video_library_file_no' => 'nullable|string',
            'video_chain_serial' => 'nullable|string',
        ]);

        $validated['drive_video_file_id'] = $this->extractDriveId($validated['drive_video_file_id']);
        $validated['drive_image_file_id'] = $this->extractDriveId($validated['drive_image_file_id']);

        $participant->update($validated);

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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ParticipantsImport(), $request->file('file'));

        return redirect()->route('participants.index')->with('success', 'Participants imported successfully!');
    }
}
