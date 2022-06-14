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
					<th>Name</th>
					<th>Email</th>
					<th>Photo</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>User Since</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td><img src="{{$user->image_url}}" width="100"></td>
					<td>{{$user->first_name}}</td>
					<td>{{$user->last_name}}</td>
					<td>{{$user->created_at}}</td>
					<td><a href="admin/users/{{$user->id}}">Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>	
		</div>
	</div>
@endsection
