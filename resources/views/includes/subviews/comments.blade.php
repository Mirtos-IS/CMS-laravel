<!-- Commenting section -->
    <div class="well">
        <h4>Comment</h4>
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <textarea class="form-control textarea-autosize" name="comment_content" id="" cols="30" rows="10"></textarea>
            </div>
            <input name="submit" class="btn btn-default" type="submit" value="Post Comment">
        </form> 
    </div>

    @foreach($post->comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{$comment->user->image_url}}" width="64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"> {{$comment->post->post_author}}
                <small>{{$comment->created_at}} </small>
            </h4>
                {{$comment->comment_content}}
        </div>
    </div>
    @endforeach
