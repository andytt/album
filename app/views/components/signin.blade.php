<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" action="{{ URL::route('users.login') }}" method="POST">
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn pull-right" href="{{ URL::route('users.create') }}">Create Account</a>
        </form>
    </div>
</div>
