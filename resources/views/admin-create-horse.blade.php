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
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.create.horse')}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"  name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" id="cat_id"  name="cat_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="col_id">Color</label>
                        <select class="form-control" id="col_id"  name="col_id">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->col_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" id="year"  name="year" value="" min="2000" max="2100">
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="number" id="height"  name="height" value="" min="100" max="300">
                    </div>
                    <div class="form-group">
                        <label for="length">Length</label>
                        <input type="number" id="length"  name="length" value="" min="100" max="300">
                    </div>
                    <div class="form-group">
                        <label for="chest">Chest</label>
                        <input type="number" id="chest"  name="chest" value="" min="30" max="200">
                    </div>
                    <div class="form-group">
                        <label for="l_id">Line</label>
                        <select class="form-control" id="l_id"  name="l_id">
                            @foreach($lines as $line)
                                <option value="{{$line->id}}">{{$line->l_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" accept="image/*" id="img" name="img">

                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Save">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection