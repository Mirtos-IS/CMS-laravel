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
				<form action="/admin/posts/edit/{{$post->post_id}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="post-title">Post Title</label>
						<input type="text" class="form-control" name="post_title" value="{{$post->post_title}}">
					</div>
					<div class="form-group">
						<label for="post-category_id">Post Category</label>
						<div>
						<select id="" name="post_category_id">
							@foreach($cats as $cat)
                                @if ($cat->cat_id == $post->post_category_id)
								<option selected value="{{$cat->cat_id}}">{{$cat->cat_title}}</option>
                                @else
								<option value="{{$cat->cat_id}}">{{$cat->cat_title}}</option>
                                @endif
							@endforeach
						</select>
					</div>
					</div>
					<div class="form-group">
						<label for="post-author">Post Author</label>
						<input type="text" class="form-control" name="post_author" value="{{$post->post_author}}">
					</div>
					<div class="form-group">
						<label for="post-tag">Post Tag</label>
						<input type="text" class="form-control" name="post_tag" value="{{$post->post_tag}}">
					</div>
					<div class="form-group">
						<label for="post-image">Post Image</label>
						<input type="file" name="post_image">
                        @if ($post->post_image)
                            <img src="{{$post->image_url}}" width='300px'>
                        @endif
					</div>
					<div class="form-group">
						<label for="post-status">Post status</label>
						<div>
						<select value="draft" name="post_status">
							<option @if ($post->post_status == 'Draft') selected @endif value="Draft">Draft</option>
							<option @if ($post->post_status == 'Published') selected @endif value="Published">Published</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label for="post-content">Post Content</label>
						<textarea class="form-control" name="post_content" id="" name="" cols="30" rows="10">{{$post->post_content}}</textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Edit Post">
					</div>
				</form> 	
						</div>
		</div>
	</div>
@endsection
