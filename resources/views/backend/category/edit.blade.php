@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header">Add Category</div>
    <div class="body">
        <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form_row">
                <div class="col_md_6">
                    <label for="name">Category name</label>
                    <input type="text" name="name" id="name" class="form_control @error('name') {{ $name }} @enderror" value="{{ $category->name }}" required>
                </div>
                <div class="col_md_6">
                    <label for="slug">Category slug</label>
                    <input type="text" name="slug" id="slug" class="form_control" value="{{ $category->slug }}" required>
                </div>
                <div class="col_md_6">
                    <label for="image">Category image</label>
                    <input type="file" name="image" id="image" class="form_control">
                </div>
                <div class="col_md_12">
                    <button class="nl primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection