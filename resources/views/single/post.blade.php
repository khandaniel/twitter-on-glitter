<div class="post box">
    <div class="avatar"><img src="http://unsplash.it/50/5{{$post->user_id}}"/></div>
    <div class="text">
        <a class="username" href="/user/{{ $post->user_id }}">{{ '@'.$post->user->name }}</a>:
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