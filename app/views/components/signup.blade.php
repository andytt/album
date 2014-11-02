<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" action="{{ URL::route('users.store') }}" method="POST">
            <div class="form-group">
                <label for="form-signup-email">Email address</label>
                <input type="email" name="email" class="form-control" id="form-signup-email" placeholder="Enter email" value="{{ Input::old('email') }}">
                @if ($errors->has('email'))
                    <p class="text-danger">{{{ $errors->first('email') }}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="form-signup-password">Password</label>
                <input type="password" name="password" class="form-control" id="form-signup-password" placeholder="Password">
                @if ($errors->has('password'))
                    <p class="text-danger">{{{ $errors->first('password') }}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="form-signup-password-confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="form-signup-password-confirmation" placeholder="Password Confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn pull-right" href="{{ URL::route('users.login') }}">Sign In</a>
        </form>
    </div>
</div>
