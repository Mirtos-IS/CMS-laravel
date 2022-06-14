@extends('admin.includes.layout')
@section('main.admin')

		<div class="col-lg-12">
			<h1 class="page-header">
				Welcome to admin
				<small>Author</small>
			</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Post Title</th>
					<th>Author</th>
					<th>Comment</th>
					<th>Date</th>
				</tr>
			</thead>
			@foreach($comments as $comment)
                <tr>
                    <td><a href="/post/{{$comment->post_id}}">{{$comment->title}}</a></td>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <form action="/admin/comments/{{$comment->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-default" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
			@endforeach
		</table>	
		</div>
	</div>

@endsection
