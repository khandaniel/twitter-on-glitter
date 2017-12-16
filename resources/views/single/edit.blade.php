@extends('layouts.main')

@section('post')
<div class="post box">
    @php if(file_exists('avatars/image_'.$post->user_id.'.jpg')) {$path = '/avatars/image_'.$post->user_id.'.jpg'; } else { $path = '/avatars/image_0.jpg';} @endphp
    <div class="avatar"><img src="{{ $path }}" width="50" height="50"/></div>
    <div class="text">
        <a class="username" href="/user/{{ $post->user_id }}">{{ '@'.$post->user->name }}</a> is changing mind:
        <form action="{{action('TweetController@update', $post)}}" method="POST">
        	{{csrf_field()}}
        	{{method_field('PUT')}}
        	<textarea name="post" style="width:30vw;">{{old('post', $post->post)}}</textarea>
        	<input type="submit">
        </form>
    </div>
    @if($post->reply_to != 0)
        <div class="reply">reply to <a href="/post/id/{{$post->reply_to}}">message</a> by
            {{--<a href="/user/--}}{{-- $posts->where('id', $post->reply_to)->first()->user_id --}}{{--">--}}
            @php
                $reply_to_user_id = App\Tweet::where('id', $post->reply_to)->first()->user_id;
            @endphp
            <a href="/user/{{ $reply_to_user_id }}">
                {{ '@'. App\User::where('id', $reply_to_user_id)->first()->name }}
            </a>
        </div>
    @endif
    <div class="meta">
        <div class="date">{{ $post->created_at }}</div>
        <div class="permalink">
            <a href="/post/id/{{ $post->id }}">#</a>
            @if($comments_quantity = count($comments = App\Tweet::where('reply_to', $post->id)->get()))
                <a href="#">{{ $comments_quantity }} @if($comments_quantity == 1) reply @else replies @endif</a>
            @endif
        </div>
        <div class="links">
            @if($post->user_id == \Illuminate\Support\Facades\Auth::id())
                <a href="/post/{{$post->id}}/edit">Edit</a>
                <a href="javascript:document.getElementById('delete_{{$post->id}}').submit()">Delete</a>
                <form id="delete_{{$post->id}}" method="POST" action="{{action('TweetController@destroy', $post)}}"
                      style="display: none;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit">
                </form>
            @else
                <a @auth href="#"
                   onclick="document.getElementById('publish').value = '{{ '@'.$post->user->name }}, '; document.getElementById('reply_to').value = '{{$post->id}}'"
                   @else href="/login" @endauth>Reply</a>
                <a href="javascript:document.getElementById('repost_{{$post->id}}').submit()">Repost</a>
                <form id="repost_{{$post->id}}" method="Post" action="{{action('TweetController@store')}}"
                      style="display: none;">
                    <input type="hidden" value="{{$post->post}}" name="post"/>
                    {{csrf_field()}}
                </form>
            @endif
        </div>
    </div>
</div>

@endsection