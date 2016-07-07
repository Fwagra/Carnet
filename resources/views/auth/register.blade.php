@extends('layouts.app')
@section('title', trans('auth.register_title'))
@section('content')
<div class="content-grid mdl-grid">
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet  mdl-cell--12-col-tablet">
        <div class="mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">{!! trans('auth.register_title') !!}</h1>
            </div>
            <div class="mdl-card__supporting-text">
                <form class="" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' is-invalid' : '' }}">
                        <input id="name" type="text" class="mdl-textfield__input" name="name" value="{{ old('name') }}">
                        <label for="name" class="mdl-textfield__label">{!! trans('auth.name_form') !!}</label>
                            @if ($errors->has('name'))
                                <span class="mdl-textfield__error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>

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

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                        <input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation">
                        <label for="password-confirm" class="mdl-textfield__label">{!! trans('auth.confirm_password_form') !!}</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="mdl-textfield__error">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="mdl-card__actions">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                             {!! trans('auth.register_btn') !!}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection
