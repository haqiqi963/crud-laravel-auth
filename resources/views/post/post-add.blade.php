@extends('layout.mainlayout')

@section('title', 'Tambah Post')

@section('content')
    <div class="container">
        <div class="card bg-white w-50">

            <h1 class="ms-3 mt-4">Tambah Data Post</h1>

            <div class="card-body">
                <form action="/post-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan title...">
                        @error('title')<small class="text-danger"><strong>{{ $message }}</strong></small>@enderror
                    </div>
                    <div>
                        <label for="content" class="form-label">Content</label>
                        <input type="text" name="content" id="content" class="form-control" placeholder="Masukkan content...">
                        @error('content')<small class="text-danger"><strong>{{ $message }}</strong></small>@enderror
                    </div>
                    <div>
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
