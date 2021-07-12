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
        <a href="{{route('admin.horses.show_create')}}"><button type="button" class="btn btn-primary">Создать</button></a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Color</th>
            <th scope="col">Year</th>
            <th scope="col">Height</th>
            <th scope="col">Length</th>
            <th scope="col">Chest</th>
            <th scope="col">Line</th>
            <th scope="col">Image</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($horses as $horse)
        <tr>
            <th scope="row">{{$horse->id}}</th>
            <td>{{$horse->name}}</td>
            <td>({{$horse->cat_id}}) {{App\Category::find($horse->cat_id)->cat_name}}</td>
            <td>({{$horse->col_id}}) {{App\Color::find($horse->col_id)->col_name}}</td>
            <td>{{$horse->year}}</td>
            <td>{{$horse->height}}</td>
            <td>{{$horse->length}}</td>
            <td>{{$horse->chest}}</td>
            <td>({{$horse->l_id}}) {{App\Line::find($horse->l_id)->l_name}}</td>
            <td> <img width="50px" src="data:image/jpeg;base64, {{base64_encode($horse->img)}}"/></td>
            <td>
                <a href="{{route('admin.horses.show_edit', ['id' =>$horse->id])}}"><button type="button" class="btn btn-primary">Изменить</button></a>
                {{--<form method="POST" action="{{ route('admin.horses.delete', ['id' => $horse->id]) }}">--}}
                    {{--@csrf--}}
                    {{--<button type="submit" class="btn btn-danger">--}}
                        {{--<i class="fa fa-trash">Delete</i>--}}
                    {{--</button>--}}
                {{--</form>--}}
                <a href="{{route('admin.delete.horse', $horse->id)}}"><button type="button" class="btn btn-danger">Удалить</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection