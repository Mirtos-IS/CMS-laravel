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
					<th>Role</th>
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
					<td>{{$user->user_name}}</td>
					<td>{{$user->user_email}}</td>
					<td>{{$user->user_role}}</td>
					<td>{{$user->user_image}}</td>
					<td>{{$user->user_firstname}}</td>
					<td>{{$user->user_lastname}}</td>
					<td>{{$user->created_at}}</td>
					<td><a href="admin/users/{{$user->user_id}}">Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>	
		</div>
	</div>
@endsection
