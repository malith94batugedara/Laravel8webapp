@extends('layouts.master')

@section('title','Admin | Category')

@section('content')


<div class="container-fluid px-4">
    <div class="card mt-4">
          <div class="card-header">
            <div class="row">
               <div class="col-md-4"><h4>View Category</h4></div><div class="col-md-8"><a href="{{ route('admin.add-category') }}" class="btn btn-success float-end">Add Category</a></div>
            </div>
          </div>
          <div class="card-body">
                <div class="mt-3">
                       @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                            </div>
                       @endif
                </div>
                <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Image</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach ($categories as $category)
                            <tr>
                               <td>{{$category->id}}</td>
                               <td>{{$category->name}}</td>
                               <td>
                                   <img src="{{ asset('uploads/category/'.$category->image) }}" height="50px" width="50px" alt="Category Image"/>
                               </td>
                               <td>{{$category->status == 1 ? 'hidden' : 'shown' }}</td>
                               <td>
                                  <a href="" class="btn btn-success">Edit</a>
                                  <a href="" class="btn btn-danger">Delete</a>
                               </td>
                            </tr>
                        @endforeach
                       </tbody>
                </table>
          </div>
    </div>
</div>

@endsection