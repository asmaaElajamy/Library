@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Categories</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-primary" href="{{route('categories.create')}}">Add Category</a>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <table class="table table-bordered">
    <thead>
    <tr>
    <td>#</td>
    <td>Name</td>
    </tr>
    </thead>
    @if(count($categories) > 0)
    @foreach($categories as $category)
    <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
     <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-info pull-right">Edit</a><br/></td>
     <td>
     <!--
     <form method="post" action="{{route('categories.destroy',$category->id)}}">
        {{csrf_field()}}
        {{method_field('DELETE')}}
      <input type="hidden" name="_method" value="DELETE" />
      <button class="btn btn-danger">Delete</button>
      </form>
      !-->
      <button class="btn btn-danger" data-catid={{$category->id}} data-toggle="modal" data-target="#delete">Delete</button>

      </td>
    
    </tr>
    @endforeach
    @endif
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('categories.destroy',$category->id)}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="category_id" id="cat_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@stop