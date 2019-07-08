<div class="container">
    <div>
        @auth
            <div class="d-flex">
                <form action="{{ route('publishComment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <div class="group-control">
                        <label for="body">Type your mind</label>
                        <textarea class="form-control" name="body" id="body" rows="3"
                                  maxlength="200"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        @endauth

        @foreach ($comments as $comment)
            {{--<div class="d-flex">
                <div class="p-2">
                    <img class="userAvatar" src="{!! isset(Auth::user()->avatar)
                                    ? asset('storage/avatar/'. Auth::user()->avatar)
                                    : asset('img/no-avatar-image.png' )!!}"
                         alt="user avatar" width="100px" height="100px">
                </div>
                <div class="p-2">
                    <h1>{{ $user->nickname }}</h1>
                </div>
                <h4>{{ $comment->created_at->diffForHumans() }}</h4>
                <p>{{ $comment->body }}</p>
                <h2>{{ $comment->user->nickname }}</h2>
            </div>--}}

            <div class="comment_block">
                @auth
                    <div class="create_new_comment">

                        <!-- current #{user} avatar -->
                        <div class="user_avatar">
                            @if (Auth::user()->avatar)
                                <img src="/uploads/{{ Auth::user()->avatar }}">
                            @else
                                <img src="/img/no-avatar.png">
                            @endif
                        </div><!-- the input field -->
                        <div class="input_comment">
                            <label>
                                <input type="text" placeholder="Join the conversation..">
                            </label>
                        </div>

                    </div>
            @endauth

            <!-- new comment -->
                <div class="new_comment">

                    <!-- build comment -->
                    <ul class="user_comment">

                        <div class="user_avatar">
                            @if ($comment->user->avatar)
                                <img src="/uploads/{{ $comment->user->avatar }}">
                            @else
                                <img src="/img/no-avatar.png">
                            @endif
                        </div>
                        <div class="comment_body">
                            <p>{{ $comment->body }}</p>
                        </div>
                        <div class="comment_toolbar">

                            <!-- inc. date and time -->
                            <div class="comment_details">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>{{
                                    \Carbon\Carbon::parse($comment->user->create_at)->format('h:m')}}
                                    </li>
                                    <li><i class="fa fa-calendar"></i>{{
                                    \Carbon\Carbon::parse($comment->user->create_at)->format('d/m/Y')}}
                                    </li>
                                    <li><i class="fa fa-pencil"></i> <span
                                                class="user">{{ $comment->user->nickname }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </ul>

                </div>

            </div>
        @endforeach

    </div>
</div>
