<div class="post box">
    <div class="avatar"><img src="http://unsplash.it/50/5{{$comment->user_id}}"/></div>
    <div class="text">
        <a class="username" href="/user/{{ $comment->user_id }}">{{ '@'.$comment->user->name }}</a>:
        {{ $comment->post }}
    </div>
    <div class="meta">
        <div class="date">{{ $comment->created_at }}</div>
        <div class="permalink">
            <a href="/post/id/{{ $comment->id }}">#</a>
            @if($comments_quantity = count($comments = App\Tweet::where('reply_to', $comment->id)->get()))
                <a href="#">{{ $comments_quantity }} @if($comments_quantity == 1) reply @else replies @endif</a>
            @endif
        </div>
        <div class="links">
            @if($comment->user_id == \Illuminate\Support\Facades\Auth::id())
                <a href="/post/{{$comment->id}}/edit">Edit</a>
                <a href="javascript:document.getElementById('delete_{{$comment->id}}').submit()">Delete</a>
                <form id="delete_{{$comment->id}}" method="POST" action="{{action('TweetController@destroy', $comment)}}"
                      style="display: none;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit">
                </form>
            @else
                <a @auth href="#"
                   onclick="document.getElementById('publish').value = '{{ '@'.$comment->user->name }}, '; document.getElementById('reply_to').value = '{{$comment->id}}'"
                   @else href="/login" @endauth>Reply</a>
            @endif
        </div>
    </div>
</div>
