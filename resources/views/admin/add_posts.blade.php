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
				<!--Add postegory form -->
				<form action="" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="title">Post Title</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label for="category_id">Post Category</label>
						<div>
						<select id="" name="category_id">
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					</div>
					<div class="form-group">
						<label for="post-tag">Post Tag</label>
						<input type="text" class="form-control" name="tag">
					</div>
					<div class="form-group">
						<label for="post-image">Post Image</label>
						<input type="file" name="image">
					</div>
					<div class="form-group">
						<label for="post-status">Post status</label>
						<div>
						<select value="draft" name="status">
							<option value="Draft">Draft</option>
							<option value="Published">Published</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label for="post-content">Post Content</label>
						<textarea class="form-control" name="content" id="" name="" cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Add Post">
					</div>
				</form> 	
						</div>
		</div>
	</div>
@endsection
