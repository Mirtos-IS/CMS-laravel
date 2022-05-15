@extends('admin.includes.layout')
@section('main.admin')
			<h1 class="page-header">
				Login Page	
			</h1>
	<div class="col-xs-4">
		<form  method="post">
			@csrf
			<div class="form-group">
				@include('login.error', ['errors' => $errors])
				<div class="form-group">
					<label for="user_name">Username</label>
					<input class="form-control" type="text" name="user_name">
				</div>
				<div class="form-group">
					<label for="user_email">Email</label>
					<input class="form-control" type="text" required name="user_email">
				</div>
				<div class="form-group">
					<label for="user_password">Password</label>
					<input class="form-control" type="password" required name="user_password">
				</div>
				<div class="form-group">
					<label for="user_firstname">First Name</label>
					<input class="form-control" type="text" required name="user_firstname">
				</div>
				<div class="form-group">
					<label for="user_lastname">Last Name</label>
					<input class="form-control" type="text" required name="user_lastname">
				</div>
				<div class="form-group">
					<label for="user_role">Role</label>
					<input class="form-control" type="text" required name="user_role">
				</div>
				<div class="form-group">
					<button class="btn btn-primary mt-3" type="submit" required value="submit" name="submit">Create</button>
				</div>
			</div>
		</form>
	</div>
@endsection
