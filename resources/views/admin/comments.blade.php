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
				<td><a href="/post/{{$comment->post->post_id}}">{{$comment->post->post_title}}</a></td>
				<td>{{$comment->post->post_author}}</td>
				<td>{{$comment->comment_content}}</td>
				<td>{{$comment->created_at}}</td>
				<td>Edit</td>
				<td>Delete</td>
			@endforeach
		</table>	
		</div>
	</div>

@endsection
