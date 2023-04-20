@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагувати користувача</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{{route('admin.user.index')}}}">Користувачі</a>
                            </li>
                            <li class="breadcrumb-item active">Редагувати користувача</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{route('admin.user.update', $user->id)}}" method="post" class="col-4">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Введіть ім'я користувача"
                                   value="{{$user->name}}">
                            @error('name')
                            <div class="danger-text">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Введіть Email"
                                   value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Виберіть користувача</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $role)
                                    <option>{{$role}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Оновити дані про користувача</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
