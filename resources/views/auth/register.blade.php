
<style>
    body{
        background-image: none;
    }
    .mainPostWrapper{
        box-shadow: 0 0 0 0;
        background: transparent;
        margin-top: 25px;
    }
    .acctitle {
        color: #000;
        font-weight: 700;
        font-size: 30px;
    }
    @media(max-width: 767px){
        .mainPostWrapper{
            padding: 10px 20px;
        }
    }
</style>


<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

<div class="acctitle"><i class="acc-closed icon-line-lock"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
<div class="acc_content clearfix">
    <form id="login-form" name="login-form" class="nobottommargin" method="POST" action="{{ url('') }}/login">
   @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! csrf_field() !!}

        <div class="col_full">
            <label for="login-form-username">Email:</label>
            <input type="text" id="login-form-username" name="email" value="{{ old('email') }}" class="form-control" />
        </div>

        <div class="col_full">
            <label for="login-form-password">Password:</label>
            <input type="password" id="login-form-password" name="password" class="form-control" />
        </div>

       <div class="col_full nobottommargin">
            <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
            <button class="button button-3d button-black nomargin" class="button">Login with Facebook</button>
           <!--  <a href="#" class="fright">Forgot Password?</a> -->
        </div>
    </form>
</div>

<div class="acctitle"><i class="acc-closed icon-line2-user"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
<div class="acc_content clearfix">
    <form id="register-form" name="register-form" class="nobottommargin" method="POST" action="{{ url('') }}/register">
     {!! csrf_field() !!}
        <div class="col_full">
            <label for="register-form-name">Name:</label>
            <input type="text" id="register-form-name" name="name" value="{{ old('name') }}"  class="form-control" />
        </div>

        <div class="col_full">
            <label for="register-form-email">Email Address:</label>
            <input type="text" id="register-form-email" name="email" value="{{ old('email') }}" class="form-control" />
        </div>


        <div class="col_full">
            <label for="register-form-password">Choose Password:</label>
            <input type="password" id="register-form-password" name="password" class="form-control" />
        </div>

        <div class="col_full">
            <label for="register-form-repassword">Re-enter Password:</label>
            <input type="password" id="register-form-repassword" name="password_confirmation" class="form-control" />
        </div>

        <div class="col_full nobottommargin">
            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
        </div>
    </form>
</div>

</div>

             