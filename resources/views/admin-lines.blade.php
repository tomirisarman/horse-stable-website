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
        <h1>Add new line</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.create.line')}}">
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
        <h1>Lines</h1>
        {{--<a href="{{route('admin.categories.show_create')}}"><button type="button" class="btn btn-primary">Create</button></a>--}}
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Line name</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lines as $line)
                <tr>
                    <th scope="row">{{$line->id}}</th>
                    <td>{{$line->l_name}}</td>
                    <td>
                        <a href="{{route('admin.line.show_edit', ['id' =>$line->id])}}"><button type="button" class="btn btn-primary">Изменить</button></a>
                        <a href="{{route('admin.delete.line', $line->id)}}"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection