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
					<label for="name">Username</label>
					<input class="form-control" type="text" required name="name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" type="text" required name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" required name="password">
				</div>
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input class="form-control" type="text" required name="first_name">
				</div>
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input class="form-control" type="text" required name="last_name">
				</div>
				<div class="form-group">
					<button class="btn btn-primary mt-3" type="submit" required value="submit" name="submit">Create</button>
				</div>
			</div>
		</form>
	</div>
@endsection
