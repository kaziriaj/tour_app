@extends('layouts.app')
@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="container mt-4">

            <!-- Create Post Box -->
            @include('album.create')

            <!-- Sample Photo Post -->
            @foreach ($albums as $album)
                <div class="card shadow-sm p-3 post-card mb-4">

                    <!-- Post Header -->
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://i.pravatar.cc/150?img=5" class="profile-img me-3 rounded-circle" width="40" height="40">
                        <div>
                            <h6 class="mb-0 fw-bold">{{ $album->user->name }}</h6>
                            <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <!-- Post Text -->
                    <p>{{ $album->album_title }}</p>

                    <!-- Post Image -->
                    @if($album->album_cover)
                        <img src="{{ asset('storage/' . $album->album_cover) }}" class="post-img mb-3 w-100 rounded">
                    @endif

                    <!-- Like / Comment / Share Buttons -->
                    <div class="d-flex justify-content-start gap-2 mb-2">
                        <!-- Like Button -->
                        <form action="{{ route('albums.like', $album) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm {{ $album->likedBy(auth()->user()) ? 'btn-primary' : 'btn-outline-primary' }}">
                                Like ({{ $album->likes->count() }})
                            </button>
                        </form>

                        <!-- Toggle Comment Form -->
                        <button class="btn btn-outline-secondary btn-sm" onclick="document.getElementById('comment-box-{{ $album->id }}').classList.toggle('d-none')">
                            Comment ({{ $album->comments->count() }})
                        </button>

                        <!-- Share Button -->
                        <button class="btn btn-outline-success btn-sm">Share</button>
                    </div>

                    <!-- Comment Form (Initially Hidden) -->
                    <div id="comment-box-{{ $album->id }}" class="mb-3 d-none">
                        <form action="{{ route('albums.comment', $album) }}" method="POST">
                            @csrf
                            <div class="input-group mb-2">
                                <input type="text" name="comment_text" class="form-control" placeholder="Add a comment..." required>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>

                    <!-- Display Comments -->
                    <ul class="list-group list-group-flush">
                        @foreach($album->comments as $comment)
                            <li class="list-group-item py-1">
                                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment_text }}
                                <small class="text-muted d-block">{{ $comment->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>

                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
