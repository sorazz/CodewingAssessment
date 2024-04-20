@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="card-body">
                    <form action="{{ route('fileUpload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose JSON File:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1>Files</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $key => $file)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{$file }}</td>
                <td>
                <a href="{{ route('exportExcel', ['filename' => $file]) }}" class="btn btn-success"> <i class="bi bi-file-excel"></i>Export to Excel</a>
                <a href="{{ route('deleteFile', ['filename' => $file]) }}" class="btn btn-danger"> <i class="bi bi-trash"></i>Delete File</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection