@extends('includes.layout')

@section('main.post')
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="page-header">
				My Blog Posts
				<small>gibe job plox</small>
				</h1>

		

				<!-- Post layout that gonna be looped -->
				<h2>
					<a href="post.php?post=#">Hardcoded</a>
				</h2>
				<p class="lead">
					by <a href="index.php">test</a>
				</p>
				<p><span class="glyphicon glyphicon-time"></span> today</p>
				<hr>
				<img class="img-responsive" src="" alt="">
				<hr>
				<p>Oi</p>
				<a class="btn btn-primary" href="post.php?post=#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

				<hr>


			<!-- Pager -->
			<ul class="pager">
				<li class="previous">
					<a href="#">&larr; Older</a>
				</li>
				<li class="next">
					<a href="#">Newer &rarr;</a>
				</li>
			</ul>

		</div>
@endsection

