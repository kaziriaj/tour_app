@extends('layouts.app')
@section('container')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="container mt-4">

                <!-- Create Post Box -->
                @include('album.create')

                <!-- Sample Photo Post -->
                @foreach ($albums as $album)
                  <div class="card shadow-sm p-3 post-card">

                    <!-- Post Header -->
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://i.pravatar.cc/150?img=5" class="profile-img me-3">
                        <div>
                            <h6 class="mb-0 fw-bold">{{ $album->user->name }}</h6>
                            <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <!-- Post Text -->
                    <p>{{ $album->album_title }}</p>

                    <!-- Post Image -->
                    <img src="{{ asset('storage/' . $album->album_cover) }}" class="post-img mb-3">

                    <!-- Like/Comment Buttons -->
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-primary btn-sm">Like</button>
                        <button class="btn btn-outline-secondary btn-sm">Comment</button>
                        <button class="btn btn-outline-success btn-sm">Share</button>
                    </div>

                </div>
                @endforeach


            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
