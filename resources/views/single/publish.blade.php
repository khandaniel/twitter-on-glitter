<div class="publish">
    <div class="wrapper">
        <form action="{{action('PostController@store')}}" method="POST">
            {{csrf_field()}}
            <textarea placeholder="What's on your mind?" name="post"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
