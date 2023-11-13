@extends('layout.mainlayout')

@section('title', 'Post')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <h3>Crud Image Ajax</h3>
                <div class="card shadow">
                    <div class="mx-3 my-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                            Tambah Posts</button>
                    </div>
                    <div class="card-body" id="show_all_post">
                        <h1 class="text-center text-primary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Post Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="post-modal">Tambah Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="add_post_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-lg">
                                <label for="content">Content</label>
                                <input type="text" name="content" class="form-control" placeholder="Content">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="image">Select Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_post_btn" class="btn btn-primary">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_post_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <input type="hidden" name="post_img" id="post_img">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="col-lg">
                                <label for="content">Content</label>
                                <input type="text" name="content" id="content" class="form-control" placeholder="Content" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="image">Select image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mt-2" id="image"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" id="edit_post_btn" class="btn btn-success">Ubah Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    @include('post.ajax')
@endsection
