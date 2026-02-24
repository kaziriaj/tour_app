<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tour Gallery</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>


        footer {
            background: #212529;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">TourGallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Countries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))

                                @auth
                                    <a href="{{ url('/dashboard') }}" class="nav-link btn btn-warning ms-2 px-3">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link btn btn-warning ms-2 px-3">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}"
                                            class="nav-link btn btn-warning ms-2 px-3">
                                            Register
                                        </a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <div class="container py-4">

    <h2 class="mb-4">All Posts</h2>

    @foreach($albums as $album)
        <div class="card mb-4 shadow-sm">

            <!-- Post Header -->
            <div class="d-flex align-items-center p-3 border-bottom">
                <img src="https://i.pravatar.cc/150?img={{ $album->user->id }}"
                     class="rounded-circle me-3" width="50" height="50" alt="Profile Pic">
                <div>
                    <h6 class="mb-0 fw-bold">{{ $album->user->name }}</h6>
                    <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                </div>
            </div>

            <!-- Post Content -->
            <div class="p-3">
                <p class="mb-2">{{ $album->album_title }}</p>
                @if($album->album_cover)
                    <img src="{{ asset('storage/' . $album->album_cover) }}"
                         class="img-fluid rounded mb-3" alt="Album Cover">
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between px-3 mb-2">
                @auth
                    <form action="{{ route('albums.like', $album) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="btn btn-sm {{ $album->likedBy(auth()->user()) ? 'btn-primary' : 'btn-outline-primary' }}">
                            Like ({{ $album->likes->count() }})
                        </button>
                    </form>
                    <button class="btn btn-sm btn-outline-secondary"
                            onclick="document.getElementById('comment-box-{{ $album->id }}').classList.toggle('d-none')">
                        Comment ({{ $album->comments->count() }})
                    </button>
                @else
                    <button class="btn btn-sm btn-outline-primary" disabled>
                        Like ({{ $album->likes->count() }})
                    </button>
                    <button class="btn btn-sm btn-outline-secondary" disabled>
                        Comment ({{ $album->comments->count() }})
                    </button>
                @endauth
                <button class="btn btn-sm btn-outline-success">Share</button>
            </div>

            <!-- Comment Form (only for logged-in users) -->
            @auth
            <div id="comment-box-{{ $album->id }}" class="px-3 mb-3 d-none">
                <form action="{{ route('albums.comment', $album) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="comment_text" class="form-control" placeholder="Add a comment..." required>
                        <button class="btn btn-primary" type="submit">Post</button>
                    </div>
                </form>
            </div>
            @endauth

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
    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>© 2026 Tour Gallery App | All Rights Reserved</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
