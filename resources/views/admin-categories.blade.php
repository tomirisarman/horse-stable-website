@extends('layouts.app')

@section('main_link'){{route('admin.dashboard')}}@endsection

@section('admin-menu')
    @include('layouts.admin_menu')
@endsection


@section('content')

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h1>Add new category</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.create.category')}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"  name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Создать">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="container justify-content-center">
        <h1>Categories</h1>
        {{--<a href="{{route('admin.categories.show_create')}}"><button type="button" class="btn btn-primary">Create</button></a>--}}
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cats as $cat)
                <tr>
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->cat_name}}</td>
                    <td>
                        <a href="{{route('admin.category.show_edit', ['id' =>$cat->id])}}"><button type="button" class="btn btn-primary">Изменить</button></a>
                        {{--<form method="POST" action="{{ route('admin.horses.delete', ['id' => $horse->id]) }}">--}}
                        {{--@csrf--}}
                        {{--<button type="submit" class="btn btn-danger">--}}
                        {{--<i class="fa fa-trash">Delete</i>--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        <a href="{{route('admin.delete.category', $cat->id)}}"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection