@extends('layouts.main')

@section('post')
    @foreach($posts as $post)
        <div class="post box">
            <div class="avatar"><img src="http://unsplash.it/50/50"/></div>
            <div class="text">
                <a class="username" href="#">{{ '@'.$post->user->first()->name }}</a>:
                {{ $post->post }}
            </div>
            <div class="meta">
                <div class="date">{{ $post->created_at }}</div>
                <div class="permalink"><a href="/post/id/{{ $post->id }}">#</a></div>
                <div class="links">
                    <a href="#">Reply</a>
                    <a href="#">Repost</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection