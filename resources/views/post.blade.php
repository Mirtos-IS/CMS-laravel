
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

            <!-- Post -->
            <h2>
                <a href="/post/{{$post->post_id}}">{{$post->post_title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->post_author}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at}}</p>
            <hr>
            <img class="img-responsive" src="{{$post->image_url}}" alt="">
            <hr>
            <p>{{$post->post_content}}</p>

            <hr>

@include('includes.subviews.comments', ['post' => $post])

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

