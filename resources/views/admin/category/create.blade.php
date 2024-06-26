@extends('layouts.master')

@section('title','Admin | Add Category')

@section('content')

<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
           <div class="col-md-4"><h4>Add Category</h4></div><div class="col-md-8"><a href="{{ route('admin.category') }}" class="btn btn-primary float-end">View Categories</a></div>
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

            <form action="{{ route('admin.add-category') }}" method="post" enctype="multipart/form-data">

              @csrf
              <div class="mb-3">
                   <label for="">Category Name</label>
                   <input type="text" name="name" class="form-control"/>
              </div>
              <div class="mb-3">
                   <label for="">Slug</label>
                   <input type="text" name="slug" class="form-control"/>
              </div>
              <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control"/>
              </div>
              <h6>SEO Meta Tags</h6>
              <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control"/>
              </div>
              <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
              </div>
              <h6>Status Mode</h6>
              <div class="row">
                   <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status"/>
                   </div>
                   <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status"/>
                   </div>
                   <div class="col-md-6">
                        <input type="submit" value="Save Category" class="btn btn-success"/>
                   </div>
              </div>

            </form>

    </div>
</div>
</div>

@endsection