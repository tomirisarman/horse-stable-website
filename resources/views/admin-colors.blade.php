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
        <h1>Add new color</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.create.color')}}">
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
        <h1>Colors</h1>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Color name</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colors as $col)
                <tr>
                    <th scope="row">{{$col->id}}</th>
                    <td>{{$col->col_name}}</td>
                    <td>
                        <a href="{{route('admin.color.show_edit', ['id' =>$col->id])}}"><button type="button" class="btn btn-primary">Изменить</button></a>
                        <a href="{{route('admin.delete.color', $col->id)}}"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection