<div class="publish">
    <div class="wrapper">
        <form id="postForm" action="{{action('TweetController@store')}}" method="POST">
            {{csrf_field()}}
            <textarea id="publish" placeholder="What's on your mind?" name="post"></textarea>
            <input id="reply_to" type="hidden" value="0" name="reply" />
            <button type="submit">Send</button>
        </form>
    </div>
</div>
