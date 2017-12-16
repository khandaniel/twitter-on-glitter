@php
$comments = App\Tweet::where('reply_to', $post->id)->orderBy('created_at', 'DESC')->get();
@endphp
<div style="margin: 20px;"><h3 style="padding-left: 40px;"> @if(count($comments) == 1) Reply: @elseif(count($comments)>1) Replies: @endif</h3></div>
@foreach($comments as $comment)
    @include('single.comment')
@endforeach