@foreach($posts as $post)
    @include('single.post')
    @includeWhen(count($posts) == 1, 'single.comments')
@endforeach

@includeWhen(Route::getCurrentRoute()->getActionName() == 'App\Http\Controllers\TweetController@index', 'single.pagination')

