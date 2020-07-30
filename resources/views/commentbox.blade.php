
            <div class="card">
                <div class="card-header text-center">Comments</div>
                <div class="card-body">
                @include('partial.alerts')
                <form action="{{route('comment',$book->id)}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea class="form-control" name="comment" placeholder="Enter Your Comment Here"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            <hr>
            @if (count($book->comments) > 0)
            @foreach($book->comments as $comment)
                <div class="row">
                    <h4>{{$comment->user->name}}</h4> 
                    <hr>
                    <span class="text-muted">{{$comment->created_at}}</span>
                    <hr>
                    <p>{{$comment->comment}}</p>
                </div>
                <!-- /.row -->
                @endforeach
                @endif
                </div>
            </div>
    
