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
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.edit.horse', $horse->id)}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input disabled type="text" id="id" name="id" class="form-control" value="{{$horse->id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"  name="name" class="form-control" value="{{$horse->name}}">
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" id="cat_id"  name="cat_id">
                            @foreach($categories as $category)
                                @if($category->id===$horse->cat_id)
                                    <option selected value="{{$category->id}}">{{$category->cat_name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="col_id">Color</label>
                        <select class="form-control" id="col_id"  name="col_id">
                            @foreach($colors as $color)
                                @if($color->id===$horse->col_id)
                                    <option selected value="{{$color->id}}">{{$color->col_name}}</option>
                                @else
                                    <option value="{{$color->id}}">{{$color->col_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" id="year"  name="year" value="{{$horse->year}}" min="2000" max="2100">
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="number" id="height"  name="height" value="{{$horse->height}}" min="100" max="300">
                    </div>
                    <div class="form-group">
                        <label for="length">Length</label>
                        <input type="number" id="length"  name="length" value="{{$horse->length}}" min="100" max="300">
                    </div>
                    <div class="form-group">
                        <label for="chest">Chest</label>
                        <input type="number" id="chest"  name="chest" value="{{$horse->chest}}" min="30" max="200">
                    </div>
                    <div class="form-group">
                        <label for="l_id">Line</label>
                        <select class="form-control" id="l_id"  name="l_id">
                            @foreach($lines as $line)
                                @if($line->id===$horse->l_id)
                                    <option selected value="{{$line->id}}">{{$line->l_name}}</option>
                                @else
                                    <option value="{{$line->id}}">{{$line->l_name}}</option>
                                @endif
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