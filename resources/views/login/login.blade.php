@extends('admin.includes.layout')
@section('main.admin')
			<h1 class="page-header">
				Login Page	
			</h1>
	<form  method="post">
		@csrf
		@include('login.error', ['errors' => $errors])
		<div class="input-group">
			<label for="user_name">Username</label>
			<input class="form-control" type="text" id="name" name="name" required>
		</div>
		<div class="input-group">
			<label for="user_password">Password</label>
			<input class="form-control" type="password" id="password" name="password" required >
		</div>
		<div class="input-group">
			<button class="btn btn-primary mt-3" type="submit" value="submit" name="submit">Submit</button>
			<a href="/login/create" class="btn btn-secondary mt-3"> Registrar-se</a>
		</div>
	</form>
@endsection
