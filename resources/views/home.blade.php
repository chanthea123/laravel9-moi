@extends('layouts.master')

@section('content')
    <div class="row pt-5">
        <div class="col-lg-4">
            <div class="shadow p-5 text-center">
                <a href="{{ route('upload.index') }}" class="text-decoration-none">
                    <h1>DB</h1>
                    <p>Upload Image</p>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="shadow p-5 text-center">
                <a href="{{ route('s3upload.index') }}" class="text-decoration-none">
                    <h1>S3</h1>
                    <p>Upload Image</p>
                </a>
            </div>
        </div>
        {{-- <div class="col-lg-4">
            <div class="shadow p-5 text-center">
                <a href="" class="text-decoration-none">
                    <h1>S3</h1>
                    <p>Upload Image​ S3 & DB</p>
                </a>
            </div>
        </div> --}}
    </div>
@endsection
