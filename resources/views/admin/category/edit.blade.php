@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагувати категорію</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{{route('admin.category.index')}}}">Категорії</a></li>
                        <li class="breadcrumb-item active">Редагувати категорію</li>
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
                <form action="{{route('admin.category.update', $category->id)}}" method="post" class="col-4">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Введіть назву категорії"
                        value="{{$category->title}}">
                    @error('title')
                        <div class="danger-text">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->
@endsection
