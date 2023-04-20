@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагувати пост</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{{route('admin.post.index')}}}">Пости</a></li>
                        <li class="breadcrumb-item active">Редагувати пост</li>
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
                <form action="{{route('admin.post.update', $post->id)}}" method="post" class="col-4">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label>Назва поста</label>
                        <input type="text" class="form-control" name="title" placeholder="Введіть назву поста">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <textarea id='summernote' name='content'></textarea>
                        </div>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputFile">Загрузка зображженя</label>
                            <div class="w-25">
                                <img src="{{url('storage/' . $post->preview_image)}}" alt="preview_image" class="w-100"/>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Вибрати зображення</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Виберіть категорію</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option>{{$tag->title}}</option>
                            @endforeach
                        </select>
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
