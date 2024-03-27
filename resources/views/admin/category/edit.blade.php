@extends('layouts.master')

@section('title','Admin | Edit Category')

@section('content')

<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
           <div class="col-md-4"><h4>Edit Category</h4></div><div class="col-md-8"><a href="{{ route('admin.category') }}" class="btn btn-primary float-end">View Categories</a></div>
        </div>
    </div>
    <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                     <div>
                          {{ $error}}
                     </div>
                @endforeach
            </div>
            @endif

            <form action="{{ route('admin.update-category',$category->id) }}" method="post" enctype="multipart/form-data">

              @csrf
              @method('PUT')
              <div class="mb-3">
                   <label for="">Category Name</label>
                   <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
              </div>
              <div class="mb-3">
                   <label for="">Slug</label>
                   <input type="text" name="slug" class="form-control" value="{{ $category->slug }}"/>
              </div>
              <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $category->description }}</textarea>
              </div>
              <div class="mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" value="{{ $category->image }}" name="image">
              </div>
              <h6>SEO Meta Tags</h6>
              <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}"/>
              </div>
              <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
              </div>
              <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
              </div>
              <h6>Status Mode</h6>
              <div class="row">
                   <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == 1 ? 'checked' : '' ; }}/>
                   </div>
                   <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked' : '' ; }}/>
                   </div>
                   <div class="col-md-6">
                        <input type="submit" value="Update Category" class="btn btn-primary"/>
                   </div>
              </div>

            </form>

    </div>
</div>
</div>

@endsection