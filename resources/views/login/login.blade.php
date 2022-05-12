@extends('admin.includes.layout')
@section('main.admin')
			<h1 class="page-header">
				Login Page	
			</h1>
	<form action="" method="post">
		<div class="input-group">
			<label for="user_name">Username</label>
			<input class="form-control" type="text" name="user_name">
		</div>
		<div class="input-group">
			<label for="user_password">Password</label>
			<input class="form-control" type="password" name="user_password">
		</div>
		<div class="input-group">
			<button class="btn btn-primary mt-3" type="submit" value="submit" name="submit">Submit</button>
		</div>
	</form>
@endsection
