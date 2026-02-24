<div class="card shadow border-0 rounded-4 mb-4">
    <div class="card-body p-4">
@if($errors->any())
    <div class="bg-red-100 p-4 mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Header Section -->
            <div class="d-flex align-items-center mb-3">
                <img src="https://i.pravatar.cc/150?img=3"
                     class="rounded-circle me-3"
                     width="50" height="50"
                     style="object-fit:cover;">

                <div class="w-100">
                    <input type="text"
                           name="title"
                           class="form-control border-0 bg-light rounded-pill px-4"
                           placeholder="Album title..."
                           required>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <textarea name="description"
                          class="form-control border-0 bg-light rounded-3 p-3"
                          rows="4"
                          placeholder="Write something about this album..."></textarea>
            </div>

            <!-- Upload Section -->
            <div class="border rounded-3 p-3 bg-light mb-3 text-center">
                <label class="form-label fw-semibold text-muted mb-2 d-block">
                    📷 Upload Cover Photo
                </label>

                <input type="file"
                       name="cover_image"
                       class="form-control"
                       accept="image/*">
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-3">

                <select name="is_public" class="form-select w-auto rounded-pill">
                    <option value="1">🌍 Public</option>
                    <option value="0">🔒 Private</option>
                </select>

                <button type="submit"
                        class="btn btn-primary rounded-pill px-4 fw-semibold">
                    Post Album
                </button>

            </div>

        </form>

    </div>
</div>
