<div class="modal fade bd-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myProfileModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2>Your profile editor</h2>
            <div class="container">
                <div class="row justify-content-center">
                    <form method="POST" action="/editProfile" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-group row">
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">NickName</label>

                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="nickname" value="{{ Auth::user()->nickname }}" maxlength="15" required
                                           autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="real_name" class="col-md-4 col-form-label text-md-right">Real Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="real_name" id="real_name" value="{{ Auth::user()->real_name }}"
                                           maxlength="40">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bio" class="col-md-4 col-form-label text-md-right">About you</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" cols="30" rows="3" maxlength="100" placeholder="Write about yourself"
                                              name="bio" id="bio">{{ Auth::user()->bio }}
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    @include('template.country')
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male &#9794;</option>
                                        <option value="female">Female &#9792;</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                                    Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ Auth::user()->email }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{
                                    __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                    __('Confirm
                                    Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                           required>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="avatar"></label>
                                    <input type="file" name="avatar" id="avatar">
                                    <img class="col-sm-6" id="profile-img" src="">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
            </div>

        </div>
    </div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function () {
        readURL(this);
    });
</script>
</div>
