@extends('layouts.master')

@section('title','Admin | Add Category')

@section('content')

<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
           <form action="" method="post">
              @csrf

              <div class="mb-3">
                   <label for="">Category Name</label>
                   <input type="text" name="name" class="form-control"/>
              </div>
              <div class="mb-3">
                   <label for="">Slug</label>
                   <input type="text" name="slug" class="form-control"/>
              </div>
              

           </form>

    </div>
</div>
</div>

@endsection