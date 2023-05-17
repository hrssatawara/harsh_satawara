@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ (isset($url) ? ucwords($url) : '') ." ".  __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("$url/login") }}' aria-label="{{ __('Login') }}" id="handleAjax">
                    @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="handleAjax">
                    @endisset
                        @csrf
                            <div id="errors-list"></div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Submit Event
        --------------------------------------------
        --------------------------------------------*/
        $(document).on("submit", "#handleAjax", function(e) {
            var e = this;

            $(this).find("[type='submit']").html("Login...");

            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $(e).find("[type='submit']").html("Login");

                    if (data.status) {
                        window.location = data.redirect;
                    }else{
                        $(".alert").remove();
                        $.each(data.errors, function (key, val) {
                            $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                        });
                    }

                }
            });
            // e.preventDefault();
            return false;
        });

    });

</script>
@endsection
