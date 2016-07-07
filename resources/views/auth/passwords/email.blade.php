@extends('layouts.app')
@section('title', trans('auth.reset_password_title'))
<!-- Main Content -->
@section('content')
<div class="content-grid mdl-grid">
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet  mdl-cell--12-col-tablet">
            <div class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">{!! trans('auth.reset_password_title') !!}</h1>
                </div>
                <div class="mdl-card__supporting-text">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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
                        <div class="mdl-card__actions">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                {!! trans('auth.send_reset_password_link') !!}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mdl-layout-spacer"></div>
</div>
@endsection
