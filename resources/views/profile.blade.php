<div>
    <form onsubmit="checkUp()" method="POST" action="{{action('HomeController@uploadData')}}">
        {{csrf_field()}}
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="{{ App\User::where('id', Auth::id())->first()->name }}"></td
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="email" name="email" value="{{ App\User::where('id', Auth::id())->first()->email }}"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            {{--<tr>--}}
                {{--<td>Confirm password:</td>--}}
                {{--<td><input type="password" id="confirmPassword"></td>--}}
            {{--</tr>--}}
        </table>
        <input type="submit" value="Save">
        <p></p>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <form method="POST" action="{{action('HomeController@uploadImage')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <table>
            <tr>
                <td>Update Profile image: </td>
                <td><input type="file" name="avatar"></td>
                @php if(file_exists('avatars/image_'.Auth::id().'.jpg')) {$path = '/avatars/image_'.Auth::id().'.jpg'; } else { $path = '/avatars/image_0.jpg';} @endphp
                <td><a href="{{asset($path)}}" target="_blank"><img src="{{asset($path)}}" width="100"></a></td>
            </tr>
            <tr>
                <td>
                    <input type="submit">
                </td>
            </tr>
        </table>
    </form>
</div>