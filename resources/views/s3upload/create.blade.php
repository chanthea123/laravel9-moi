@extends('layouts.master')

@section('content')
    <div class="shadow p-4">
        <h4 class="pb-4">Upload S3 Image</h4>
        <form action="{{ route('s3upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="img" class="form-label">Image:</label>
                <input type="file" class="form-control rounded-0" accept="image/*" onchange="previewImage(event)"
                    name="image">
            </div>

            <div class="mb-3">
                <img src="https://t3.ftcdn.net/jpg/04/34/72/82/360_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg"
                    alt="" class="img-fluid" width="200" id="preview">
            </div>

            <input type="submit" class="btn btn-primary mt-4 rounded-0" value="Upload S3 Image">
        </form>
    </div>
@endsection
