@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пости</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{{route('admin.main.index')}}}">Головна сторінка</a></li>
                        <li class="breadcrumb-item active">Пости</li>
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
                <div class="col-3">
                    <a href="{{route('admin.post.create')}}" class="btn btn-block btn-primary">Створити пост</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th colspan="4" class="text-center">Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($post as $posts)
                        <tr>
                            <td>{{$posts->id}}</td>
                            <td>{{$posts->title}}</td>
                            <td><a href="{{route('admin.post.show', $posts->id)}}"><i class="far fa-eye"></i></a></td>
                            <td><a href="{{route('admin.post.edit', $posts->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                <form action="{{route('admin.post.delete', $posts->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="text-danger fas fa-trash" role="button"></i>
                                        </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
