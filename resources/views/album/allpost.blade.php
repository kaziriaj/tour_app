@extends('layouts.app')

@section('container')
<div class="container py-4">

    <!-- All posts -->
    @foreach($albums as $album)
        <div class="card mb-4 shadow-sm">

            <!-- Post Header -->
            <div class="d-flex align-items-center p-3">
                <img src="https://i.pravatar.cc/150?img={{ $album->user->id }}"
                     class="rounded-circle me-3" width="50" height="50" alt="Profile Pic">
                <div>
                    <h6 class="mb-0 fw-bold">{{ $album->user->name }}</h6>
                    <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <!-- Post Title / Description -->
            <div class="p-3">
                <p class="mb-2">{{ $album->album_title }}</p>
                @if($album->album_cover)
                    <img src="{{ asset('storage/' . $album->album_cover) }}" class="img-fluid rounded mb-3" alt="Album Cover">
                @endif
            </div>

            <!-- Like / Comment / Share -->
            <div class="d-flex justify-content-between px-3 mb-2">

                <!-- Like Form -->
                <form action="{{ route('albums.like', $album) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $album->likedBy(auth()->user()) ? 'btn-primary' : 'btn-outline-primary' }}">
                        Like ({{ $album->likes->count() }})
                    </button>
                </form>

                <!-- Comment Toggle -->
                <button class="btn btn-sm btn-outline-secondary"
                        onclick="document.getElementById('comment-box-{{ $album->id }}').classList.toggle('d-none')">
                    Comment ({{ $album->comments->count() }})
                </button>

                <button class="btn btn-sm btn-outline-success">Share</button>
            </div>

            <!-- Comment Form -->
            <div id="comment-box-{{ $album->id }}" class="px-3 mb-3 d-none">
                <form action="{{ route('albums.comment', $album) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="comment_text" class="form-control" placeholder="Add a comment..." required>
                        <button class="btn btn-primary" type="submit">Post</button>
                    </div>
                </form>
            </div>

            <!-- Display Comments -->
            <ul class="list-group list-group-flush px-3 pb-3">
                @foreach($album->comments as $comment)
                    <li class="list-group-item py-1">
                        <strong>{{ $comment->user?->name ?? 'Deleted User' }}:</strong> {{ $comment->comment_text }}
                        <small class="text-muted d-block">{{ $comment->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>

        </div>
    @endforeach

</div>
@endsection
