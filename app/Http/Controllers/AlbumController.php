<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Albums::where('user_id', auth()->id())->latest()->get();
        return view('album.mypost', compact('albums') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // Validate the request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'cover_image' => 'nullable|image|max:2048',
    ]);

    // Handle file upload
    $coverImagePath = null;

    if ($request->hasFile('cover_image')) {
    $file = $request->file('cover_image');

    // Get original filename
    $originalName = $file->getClientOriginalName();

    // Store file
    $coverImagePath = $file->store('album_covers', 'public');


}

    // Save album
    Albums::create([
    'user_id' => auth()->id(),
    'album_title' => $validated['title'],
    'album_slug' => Str::slug($request['title']),
    'album_description' => $validated['description'] ?? null,
    'album_cover' => $coverImagePath,
    'is_public' => 1,   // or 0
    'status' => 1,      // or whatever default
]);

    // Redirect instead of returning view
    return redirect()
            ->route('dashboard')
            ->with('success', 'Album created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function liketogoller(Albums $album)
{
    $user = auth()->user();

    // Find if the user has already liked this album
    $like = $album->likes()->where('user_id', $user->id)->first();

    if ($like) {
        // Unlike → delete the like record only
        $like->delete();
    } else {
        // Like → create a new like record
        $album->likes()->create([
            'user_id' => $user->id,
        ]);
    }

    return back();
}

    public function storeComment(Request $request, Albums $album)
{
    $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    $album->comments()->create([
        'user_id' => auth()->id(),
        'comment' => $request->comment,
    ]);

    return back();
}
}
