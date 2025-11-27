<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // 1. Fetch active hero images for frontend

    public function getHeroImages()
    {
        // Hero images already working
        $images = Image::where('type', 'hero')
            ->where('is_active', true)
            ->get();

        // Add your participants videos (8 videos) sorted by video chain serial
        $participants = DB::table('participants')
            ->whereNotNull('drive_video_file_id')
            ->select('id', 'name', 'drive_video_file_id', 'drive_image_file_id')
            ->inRandomOrder()
            ->limit(9)
            ->get();

        // return both variables to the same view
        return view('web.home', compact('images', 'participants'));
    }

    // 2. List all images (admin)
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->get();
        return view('admin.imageManagement.index', compact('images'));
    }

    // 3. Show create form
    public function create()
    {
        return view('admin.imageManagement.create');
    }

    // 4. Store new image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Store image in storage/app/public/images
        $imageName = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'type' => $request->type,
            'link' => $request->link,
            'image' => $imageName,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.images.index')
            ->with('success', 'Image uploaded successfully.');
    }

    // 5. Show single image
    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.imageManagement.show', compact('image'));
    }

    // 6. Show edit form
    public function edit(Image $image)
    {
        return view('admin.imageManagement.edit', compact('image'));
    }

    // 7. Update image
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }

            $imageName = $request->file('image')->store('images', 'public');
            $image->image = $imageName;
        }

        $image->title = $request->title;
        $image->type = $request->type;
        $image->link = $request->link;
        $image->is_active = $request->has('is_active');
        $image->save();

        return redirect()
            ->route('admin.images.index')
            ->with('success', 'Image updated successfully.');
    }

    // 8. Delete image
    public function destroy(Image $image)
    {
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()
            ->route('admin.images.index')
            ->with('success', 'Image deleted successfully.');
    }

    // Optional: Fetch images by type for frontend
    public function getImagesByType($type)
    {
        $images = Image::where('type', $type)
            ->where('is_active', true)
            ->get();

        return view('web.home', compact('images', 'type'));
    }
}
