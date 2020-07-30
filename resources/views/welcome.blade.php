@extends('layouts.app')
@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        !-->
            <div class="card">
                <div class="card-header text-center">ِAll Books</div>
                <div class="card-body">
                {{$books->links()}}
                @if (count($books) > 0)
                @foreach($books as $book)
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/thumbnails/'.$book->image)}}" class="img-responsive" width="100"/>
                        </div>
                        <!-- /.col-md-12 -->
                        <div class="col-md-9 text-center">
                            <h2>{{$book->title}}</h2>
                            <p>{{$book->info}}</p>
                            <br/>
                            Author : {{$book->author}} <br/>
                            <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                            <a href="{{route('book', $book->id)}}" class="btn btn-info">More info</a>
                        
                        </div>
                        <!-- /.col-md-9 -->
                    </div>
                    <hr>
                    @endforeach
                @endif
                
                </div>
            </div>
            <!--
        </div>
    </div>
</div>
!-->

@endsection
