@extends('layouts.master')

@section('content')
    <div class="shadow p-4">
        <h4 class="pb-4">Upload Update Image</h4>
        <form action="{{ route('upload.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control rounded-0" id="title" name="title"
                    value="{{ $data->title }}">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image:</label>
                <input type="file" class="form-control rounded-0" accept="image/*" onchange="previewImage(event)"
                    name="image">
            </div>

            <div class="mb-3">
                @php
                    $src = decrypt(file_get_contents(asset('storage/upload/' . $data->image)));
                @endphp

                @if ($data->image != null)
                    <img src="data:image/png;base64, {{ $src }}" alt="" class="img-fluid" width="200"
                        id="preview">
                @else
                    <img src="https://t3.ftcdn.net/jpg/04/34/72/82/360_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg"
                        alt="" class="img-fluid" width="200" id="preview">
                @endif
            </div>

            <input type="submit" class="btn btn-primary mt-4 rounded-0" value="Upload Image">
        </form>
    </div>
@endsection
