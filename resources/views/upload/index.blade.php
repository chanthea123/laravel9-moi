@extends('layouts.master')

@section('content')
    <div class="shadow p-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Images</h2>
            </div>
            <div class="col-lg-6">
                @if ($message = Session::get('message'))
                    <strong class="text-success">{{ $message }}</strong>
                @endif
            </div>
            <div class="col-lg-3">
                <div class="text-end"><a href="{{ route('upload.create') }}" class="btn btn-primary rounded-0">Create Image</a>
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
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td width="100">
                            @php
                                $src= decrypt(file_get_contents(asset('storage/upload/'. $item->image)));
                            @endphp
                            <img src="data:image/png;base64, {{$src}}" alt="" class="img-fluid">

                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('upload.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('upload.edit', $item->id) }}"
                                    class="btn btn-warning rounded-0 me-2">Edit</a>

                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger rounded-0"
                                    onclick="return confirm('Are you sure you want to delete this item?');">Del
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
