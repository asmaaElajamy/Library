@if(!empty($book))
@extends('layouts.app')
@section('content') 
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        !-->
        
            <div class="card">
                <div class="card-header text-center">Book Name</div>
                <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/thumbnails/'.$book->image)}}" class="img-responsive" width="100"/>
                            @php
                            $like_count=0;
                            $dislike_count=0;
                            $like_status ="btn-secondry";
                            $dislike_status ="btn-secondry";
                            @endphp
                            @foreach($book->likes as $like)
                            @php
                            if($like->like ==1)
                            {
                                $like_count++;
                            }
                            if($like->like ==0)
                            {
                                $dislike_count++;
                            }
                            if(Auth::check()){
                            if($like->like ==1 && $like->user_id== Auth::user()->id)
                            {
                                $like_status ="btn-success";
                            }
                            if($like->like ==0 && $like->user_id== Auth::user()->id)
                            {
                                $dislike_status ="btn-danger";
                            }
                        }
                           
                            @endphp
                            @endforeach
                            <br><br>
                            <button type="button" data-bookid="{{$book->id}}_l" data-like="{{$like_status}}" class="like btn {{$like_status}}">Like <span class="glyphicon glyphicon-thumbs-up"></span><b><span class="like_count">{{$like_count}}</span></b></button>
                            <button type="button" data-bookid="{{$book->id}}_d" data-like="{{$dislike_status}}" class="dislike btn {{$dislike_status}}">Dislike <span class="glyphicon glyphicon-thumbs-down"></span><b><span class="dislike_count">{{$dislike_count}}</span></b></button>
                        </div>
                        <!-- /.col-md-12 -->
                        <div class="col-md-9 text-center">
                            <h2>{{$book->title}}</h2>
                            <p>{{$book->info}}</p>
                            <br/>
                            Author : {{$book->author}} <br/>
                            <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                            <a href="" class="btn btn-info">More Info</a>
                               
                        </div>
                        <!-- /.col-md-9 -->
                    </div>

                <div class="card-body">
                
                </div>
            </div>
            <!--
        </div>
    </div>
</div>
!-->
<hr>
@include('commentbox')
@endsection
@else
          Error No Book Found
@endif

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

