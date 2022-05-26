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
						<label for="post-title">Post Title</label>
						<input type="text" class="form-control" name="post_title">
					</div>
					<div class="form-group">
						<label for="post-category_id">Post Category</label>
						<div>
						<select id="" name="post_category_id">
							@foreach($cats as $cat)
								<option value="{{$cat->cat_id}}">{{$cat->cat_title}}</option>
							@endforeach
						</select>
					</div>
					</div>
					<div class="form-group">
						<label for="post-author">Post Author</label>
						<input type="text" class="form-control" name="post_author">
					</div>
					<div class="form-group">
						<label for="post-tag">Post Tag</label>
						<input type="text" class="form-control" name="post_tag">
					</div>
					<div class="form-group">
						<label for="post-image">Post Image</label>
						<input type="file" name="post_image">
					</div>
					<div class="form-group">
						<label for="post-status">Post status</label>
						<div>
						<select value="draft" name="post_status">
							<option value="Draft">Draft</option>
							<option value="Published">Published</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label for="post-content">Post Content</label>
						<textarea class="form-control" name="post_content" id="" name="" cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Add Post">
					</div>
				</form> 	
						</div>
		</div>
	</div>
@endsection
