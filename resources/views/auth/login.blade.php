@extends('layouts.app')
@section('title', trans('auth.login_title'))
@section('content')
<div class="content-grid mdl-grid">
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet  mdl-cell--12-col-tablet">
        <div class="mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">{!! trans('auth.login_title') !!}</h1>
            </div>
            <div class="mdl-card__supporting-text">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}">
                        <label for="email" class="mdl-textfield__label">{!! trans('auth.email_form') !!}</label>

                        @if ($errors->has('email'))
                            <span class="mdl-textfield__error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        <input id="password" type="password" class="mdl-textfield__input" name="password">
                        <label for="password" class="mdl-textfield__label">{!! trans('auth.password_form') !!}</label>
                        @if ($errors->has('password'))
                            <span class="mdl-textfield__error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <div class="checkbox">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                                <input id="remember" type="checkbox" name="remember" class="mdl-checkbox__input">
                                <span class="mdl-checkbox__label">
                                    {!! trans('auth.remember_me') !!}
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="mdl-card__actions">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                            {!! trans('auth.login_btn') !!}
                        </button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('auth.forgot_password') !!}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection
