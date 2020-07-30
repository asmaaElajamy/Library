@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Category</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-primary" href="{{route('categories.index')}}">View all Categories</a>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <form action="{{route('categories.update',$category->id)}}" method="post">
  <input type="hidden" name="_method" value="PUT" />
  {{csrf_field()}}
  <div class="form-group">
  <input type="text" name="name" id="name" class="form-control"value="{{$category->name}}" placeholder="Enter category name">
  </div>
  <div class="form-group">
  <button type="submit" name="add" class="btn btn-primary btn-block">Edit Category</button>
  </div>
  </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@stop