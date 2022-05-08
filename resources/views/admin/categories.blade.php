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
				<form action="admin_categories.php" method="post">
					<div class="form-group">
						<label for="cat-title">Add Category</label>
						<input type="text" class="form-control" name="cat_title">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Add Category">
					</div>
				</form> 	
				<!-- updating category form -->
				@if ($id)
				<form action="" method="post">
					<div class="form-group">
						<label for="cat-title">Edit Category</label>
						<input type="text" class="form-control" name="cat_title" value="{{\App\Models\Categories::find($id)->cat_title}}">
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
					@foreach($cats as $cat)
					<tr>
						<td>{{$cat->cat_id}}</td>
						<td>{{$cat->cat_title}}</td>
						<td><a href="/admin/categories/{{$cat->cat_id}}">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

			</div>
		</div>
@endsection
