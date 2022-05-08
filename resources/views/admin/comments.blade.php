@extends('admin.includes.layout')
@section('main.admin')

		<div class="col-lg-12">
			<h1 class="page-header">
				Welcome to admin
				<small>Author</small>
			</h1>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Post Title</th>
					<th>Author</th>
					<th>Comment</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			@foreach($comments as $comment)
				<th><a href="/post/{{$comment->post->post_id}}">{{$comment->post->post_title}}</a></th>
				<th>{{$comment->post->post_author}}</th>
				<th>{{$comment->comment_content}}</th>
				<th>{{$comment->created_at}}</th>
				<th>Edit</th>
				<th>Delete</th>
			@endforeach
		</table>	
		</div>
	</div>

@endsection
