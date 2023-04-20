@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Теги</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{{route('admin.main.index')}}}">Головна сторінка</a></li>
                        <li class="breadcrumb-item active">Теги</li>
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
                    <a href="{{route('admin.tag.create')}}" class="btn btn-block btn-primary">Створити тег</a>
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
                        @foreach($tag as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->title}}</td>
                            <td><a href="{{route('admin.tag.show', $tag->id)}}"><i class="far fa-eye"></i></a></td>
                            <td><a href="{{route('admin.tag.edit', $tag->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                <form action="{{route('admin.tag.delete', $tag->id)}}" method="post">
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
