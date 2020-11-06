@extends('layouts.app')

@section('content')
<div class="container">

    @if ($num == 0)
    <div class="text-center pt-4">
        <p class="text-success">Welcome to Insta-Shqip</p>
        <p> You don't follow anyone. </p>
        <p>Here are some user suggestions for you:</p>
        <a href="/profile/{{$gjej}}" class="btn btn-danger">Suggestion Nr.1</a>
        <a href="/profile/{{$gjej2}}" class="btn btn-danger">Suggestion Nr.2</a>
    </div>
    @endif

    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                    <div class="d-flex align-items-center pb-1">
                        <img src="{{$post->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px;" alt="">
                        <a class="pl-2" href="/profile/{{$post->user->id}}"> 
                            <strong> {{$post->user->username}} </strong>
                        </a> 
                    </div>
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100" alt="">
                </a>
            </div>
        </div>
        <div class='row pt-2 pb-4'>    
            <div class="col-6 offset-3">
                <div>
                    <p> <span class="font-weight-bold"> 
                        <a href="/profile/{{$post->user->id}}"> 
                        <span class="text-dark"> {{$post->user->username}} </span>
                        </a> 
                        </span> 
                    {{$post->caption}} </p>
                </div>
            </div>
        </div>
        <hr>
    @endforeach

    <div class="row">
        <div class="col-6 offset-6 d-flex justify-content-center">
            <div class="text-center">
                <p>Some user suggestions for you:</p>
                <a href="/profile/{{$gjej}}" class="btn btn-danger m-1">Suggestion Nr.1</a><br>
                <a href="/profile/{{$gjej2}}" class="btn btn-danger m-1">Suggestion Nr.2</a>
            </div>
        </div>
    </div>
    <hr>

    <div class="row mt-3">
        <div class="col-6 offset-3 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
