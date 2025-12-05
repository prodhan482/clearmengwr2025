<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ParticipantsImport;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::orderBy('video_chain_serial', 'asc')->paginate(1000);
        return view('admin.participants.index', compact('participants'));
    }

public function jsonAdmin()
{
    $participants = Participant::select([
        'id',
        'date_taken',
        'location',
        'camera_no',
        'name',
        'phone',
        'email',
        'image_library_file_no',
        'video_library_file_no',
        'video_chain_serial',
        'drive_video_file_id',
        'drive_image_file_id',
        'action_performed',
        'video_length',
    ]);

    return DataTables::of($participants)
        ->order(function ($query) {
            $query->orderBy('video_chain_serial', 'asc');
        })
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return '
                <a href="' . route('participants.show', $row->id) . '" class="btn btn-info btn-sm">View</a>
                <a href="' . route('participants.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="' . route('participants.destroy', $row->id) . '" style="display:inline">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
}




    public function userDashboard()
    {
        return view('web.participants.dashboard');
    }

    public function participantsJson(Request $request)
    {
        $query = Participant::select([
            'id',
            'video_chain_serial',
            'name',
            'email',
            'location',
            'drive_video_file_id',
            'drive_image_file_id',
            'action_performed',
            'video_length',
        ])->orderBy('video_chain_serial', 'asc');

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-primary btn-sm view-attempts"
                        data-name="' . $row->name . '"
                        data-video="' . $row->drive_video_file_id . '"
                        data-image="' . $row->drive_image_file_id . '">
                        View Attempts
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function participantsDashboard()
    {
        $userPhone = Auth::user()->phone;

        // matched participants for the current user (could be a collection)
        $matched = DB::table('participants')
            ->where('phone', $userPhone)
            ->get(); // ->get() returns a Collection

        // other participants listing (unmatched grid)
        $participants = DB::table('participants')
            ->whereNotNull('drive_image_file_id')
            ->limit(12)
            ->get();

        return view('web.participants.dashboard', [
            'matched' => $matched,
            'participant_count' => $matched->count(),
            'participants' => $participants,
        ]);
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
            'phone' => 'nullable|string',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
            'image_library_file_no' => 'nullable|string',
            'video_library_file_no' => 'nullable|string',
            'video_chain_serial' => 'nullable|string',
            'action_performed' => 'nullable|string',
            'video_length' => 'nullable|string',
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
            'phone' => 'nullable|string',
            'drive_video_file_id' => 'nullable|string',
            'drive_image_file_id' => 'nullable|string',
            'image_library_file_no' => 'nullable|string',
            'video_library_file_no' => 'nullable|string',
            'video_chain_serial' => 'nullable|string',
            'action_performed' => 'nullable|string',
            'video_length' => 'nullable|string',
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
