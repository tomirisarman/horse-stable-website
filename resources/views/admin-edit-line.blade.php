@extends('layouts.app')

@section('admin-menu')
    @include('layouts.admin_menu')
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.edit.line', $line->id)}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input disabled type="text" id="id" name="id" class="form-control" value="{{$line->id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"  name="name" class="form-control" value="{{$line->l_name}}">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Save">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection