<span class="mdl-layout-title">{!! trans('menu.title') !!}</span>
<nav class="mdl-navigation">
    @if (!Auth::check())
        <a class="mdl-navigation__link" href="{!! url('/') !!}">{!! trans('menu.home') !!}</a>
        <a class="mdl-navigation__link" href="{!! url('login') !!}">{!! trans('menu.login') !!}</a>
    @else
        <a class="mdl-navigation__link" href="{!! url('/') !!}">{!! trans('menu.home') !!}</a>
        <a class="mdl-navigation__link" href="{!! route('photo.index') !!}">{!! trans('menu.img_management') !!}</a>
        <a class="mdl-navigation__link mdl-badge" href="{!! route('comment.index') !!}">
            <span class="mdl-badge badge--overlap comments-icon"  data-badge="{{ App\Comment::all()->count() }}">
                {!! trans('menu.comment_management') !!}
            </span>
        </a>
        <a class="mdl-navigation__link" href="{!! route('trip.create') !!}">{!! trans('menu.new_trip') !!}</a>
        <a class="mdl-navigation__link" href="{!! url('logout') !!}">{!! trans('menu.logout') !!}</a>
    @endif
</nav>
