@extends('admin.includes.layout')
@section('main.admin')
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Welcome to admin
				<small>Author</small>
			</h1>
			<div class="col-xs-6">
				<!--Add category form -->
				<form action="" method="post">
                    @csrf
					<div class="form-group">
						<label for="name">Add Category</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Add Category">
					</div>
				</form> 	
				<!-- updating category form -->
				@if ($id)
				<form action="" method="post">
                    @method('PATCH')
                    @csrf
					<div class="form-group">
						<label for="cat-title">Edit Category</label>
						<input type="text" class="form-control" name="name" 
                               value="{{\App\Models\Category::find($id)->name}}">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="edit" value="Update Category">
					</div>
				</form>
				@endif
			</div>
			<div class="col-xs-6">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Category Title</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td><a href="/admin/categories/{{$category->id}}">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

			</div>
		</div>
@endsection
