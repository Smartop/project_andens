<div class="container">
    <div class="row">
        <div class="col-10">
            @auth
            <div class="d-flex">
                <form action="/publishComment" method="POST">
                @csrf
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <div class="group-control">
                        <label for="body">Type your mind</label>
                        <textarea class="form-control" name="body" id="body" rows="3" maxlength="200"></textarea>
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
              <div class="d-flex">
                 {{-- <div class="p-2">
                    <img class="userAvatar" src="{!! isset(Auth::user()->avatar) 
                                ? asset('storage/avatar/'. Auth::user()->avatar) 
                                : asset('img/no-avatar-image.png' )!!}"
                                alt="user avatar" width="100px" height="100px">
                </div>
                <div class="p-2">
                    <h1>{{ $user->nickname }}</h1>
                </div> --}}
                <h4>{{ $comment->created_at }}</h4>
                <p>{{  $comment->body }}</p>
                <h2>{{ $comment->user->nickname }}</h2>
            </div>  
            @endforeach
            
        </div>
    </div>
</div>