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
					<td>{{$post->post_author}}</td>
					<td><a href="/post/{{$post->post_id}}">{{$post->post_title}}</a></td>
					<td>{{$post->post_category_id}}</td>
					<td>{{$post->post_status}}</td>
					<td>{{$post->post_image}}</td>
					<td>{{$post->post_tag}}</td>
					<td>{{$post->post_comment_count}}</td>
					<td>{{$post->created_at}}</td>
				</tr>
			@endforeach
		</table>	
		</div>
	</div>

@endsection
