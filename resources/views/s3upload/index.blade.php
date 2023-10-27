@extends('layouts.master')

@section('content')
    <div class="shadow p-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Images S3</h2>
            </div>
            <div class="col-lg-6">
                @if ($message = Session::get('message'))
                    <strong class="text-success">{{ $message }}</strong>
                @endif
            </div>
            <div class="col-lg-3">
                <div class="text-end"><a href="{{ route('s3upload.create') }}" class="btn btn-primary rounded-0">Create S3 Image</a>
                </div>
            </div>
        </div>
        <hr class="pb-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td width="150">

                        {{-- <img src="https://cdn-img1.imgworlds.com/assets/473cfc50-242c-46f8-80be-68b867e28919.jpg?key=home-gallery"
                            alt="" class="img-fluid"> --}}
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-warning rounded-0 me-2">Edit</a>
                        <input type="button" class="btn btn-danger rounded-0" value="Del">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
