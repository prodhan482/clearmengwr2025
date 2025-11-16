<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Paginated list (for after-registration page)
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Participant::select(['id', 'serial_number', 'code_number', 'name', 'email', 'phone', 'drive_image_file_id', 'drive_video_file_id']);
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '<button class="action-btn" data-img="' . asset('storage/' . $row->drive_image_file_id) . '" data-vid="' . asset('storage/' . $row->drive_video_file_id) . '">View</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('participants.index'); // Blade will use AJAX DataTables
    }

    // For admin view
    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $query = Participant::select(['id', 'serial_number', 'code_number', 'name', 'email', 'phone', 'drive_image_file_id', 'drive_video_file_id']);
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $edit = '<a href="' . route('admin.participants.edit', $row->id) . '" class="edit-btn">Edit</a>';
                    $delete = '<form method="POST" action="' . route('admin.participants.destroy', $row->id) . '" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="delete-btn">Delete</button>
                          </form>';
                    return $edit . ' ' . $delete . ' <button class="action-btn" data-img="' . asset('storage/' . $row->drive_image_file_id) . '" data-vid="' . asset('storage/' . $row->drive_video_file_id) . '">View</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.participants.index');
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
