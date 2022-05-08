@extends('admin.includes.layout')

@section('main.admin')


	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Welcome to admin
				<small>Author</small>
			</h1>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Author</th>
					<th>Title</th>
					<th>Category</th>
					<th>Status</th>
					<th>Image</th>
					<th>Tags</th>
					<th>comments</th>
					<th>Date</th>
				</tr>
			</thead>
			@foreach($posts as $post)
				<tr>
					<th>{{$post->post_author}}</th>
					<th>{{$post->post_title}}</th>
					<th>{{$post->post_category_id}}</th>
					<th>{{$post->post_status}}</th>
					<th>{{$post->post_image}}</th>
					<th>{{$post->post_tag}}</th>
					<th>{{$post->post_comment_count}}</th>
					<th>{{$post->created_at}}</th>
				</tr>
			@endforeach
		</table>	
		</div>
	</div>

@endsection
