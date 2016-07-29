@extends('layouts.app')
@section('title', trans('step.step_title', ['name' => $step->name] ))
@section('content')
    <div class="mdl-grid content-grid show-step">
        {{-- Resume of the step block --}}
        <div class="mdl-card mdl-cell mdl-cell--8-col mdl-shadow--2dp resume-block">
            <?php
                $bg = ($featured)? 'style="background-image:url('.url($featured->getLight()).');"' : '';
            ?>
          <div class="mdl-card__title mdl-card__media" {!! $bg !!}>
            <h2 class="mdl-card__title-text">{{ $step->name }}</h2>
          </div>
          <div class="mdl-card__supporting-text">
             <div class="mdl-grid">
                  <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                     <i class="material-icons icon-align">date_range</i><span class="date icon-align">{{ $step->date->format('d-m-Y') }}</span>
                 </div>
                 <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                     <i class="material-icons icon-align">flag</i><span class="flag icon-align">{{ $step->km }} {!! trans('step.km_traveled') !!}</span>
                 </div>
                 <div class="section-spacer"></div>
                 <a href="#photos" class="mdl-button mdl-js-button  mdl-button--accent ">{!! trans('step.goto_photos') !!}</a>
             </div>
          </div>
          @if (Auth::check())
              <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect goto">
                  <i class="material-icons md-light">edit_mode</i>
                  <a class="goto-link" href="{{ route('trip.step.edit', [$trip->slug, $step->id])}}"></a>
                </button>
              </div>
          @endif
        </div>
        {{-- Points of interest block --}}
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col pois-block">
          <div class="mdl-card__title  mdl-card--expand">
              <h4><i class="material-icons icon-align">place</i> {!! trans('step.pois_block_title') !!}</h4>
          </div>
          <div class="mdl-card__supporting-text">
              <ul class="mdl-list">
                  @if (!empty($step->pois[0]))
                      @foreach ($step->pois as $key => $poi)
                          <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">{{$step->pois_icon[$key]}}</i>
                               {{ $poi }}
                            </span>
                          </li>
                      @endforeach
                  @else
                     {!! trans('step.no_pois') !!}
                  @endif
              </ul>
          </div>
        </div>

        {{-- Description block --}}
        <div class="mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp desc-block">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"></h2>
          </div>
          <div class="mdl-card__supporting-text">
              <div class="content-text">
                  {!! $step->html_value !!}
              </div>
          </div>
          <div id="photos" class="mdl-card__supporting-text img-block mdl-card--border mdl-grid">
            @forelse ($step->photos as $photo)
                <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-phone">
                    <a class="fluidbox-img images" href="{{ url($photo->getFull()) }}">
                        <img class="thumb" title="{{$photo->name}}" src="{{ url($photo->getThumb()) }}" alt="{{ $photo->description }}" />
                    </a>
                </div>
            @empty

            @endforelse
          </div>
          {{-- Comments block --}}
          <div class="mdl-card__supporting-text comments" id="comments">
             <div class="mdl-card__title"><h4>{!! trans('step.comment_title') !!}</h4   ></div>
             <div class="mdl-card__supporting-text">
                  @forelse ($step->comments()->where('active', '=', 1)->get() as $comment)
                      <div class="comment">
                          <div class="comment__text">
                              {!! nl2br($comment->message) !!}
                          </div>
                          <div class="comment__footer">
                              <div class="comment__author">
                                  <div class="name">{{ $comment->name }}</div>
                                  <div class="date">{{ $comment->created_at->format('d-m-Y') }}</div>
                              </div>
                          </div>
                      </div>
                  @empty
                      {!! trans('step.no_comments') !!}
                  @endforelse
              </div>
              <div class="mdl-text__actions mdl-card--border">
                  <h4>{!! trans('step.add_comment_title') !!}</h4>
                  {{ Form::open(['url' => route('trip.step.comment.store', [$trip->slug, $step->id]), 'method' => 'POST']) }}
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' is-invalid' : '' }}">
                          {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
                          {!! Form::label('name', trans('step.comment_name'), ['class' => "mdl-textfield__label"])!!}
                          @if ($errors->has('name'))
                              <span class="mdl-textfield__error">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('message') ? ' is-invalid' : '' }}">
                          {!! Form::textarea('message',null, ['class' => 'mdl-textfield__input']) !!}
                          {!! Form::label('message', trans('step.comment_message'), ['class' => "mdl-textfield__label"])!!}
                          @if ($errors->has('message'))
                              <span class="mdl-textfield__error">
                                  <strong>{{ $errors->first('message') }}</strong>
                              </span>
                          @endif

                      </div>
                      <div class="captcha">
                          {!! app('captcha')->display(); !!}
                          @if ($errors->has('g-recaptcha-response'))
                              <span class="error">
                                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                              </span>
                          @endif
                      </div>
                      {!! Form::submit(trans('step.submit_comment_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}

                  {{ Form::close() }}
              </div>
              <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect goto">
                    <a class="goto-link" href="#comments"></a>
                    <?php $badge = ($step->comments->count() > 0)? "data-badge=".$step->comments->count() : ''; ?>
                  <i class="material-icons mdl-badge" {{ $badge }}>mode_comment</i>
                </button>
              </div>
          </div>
        </div>
    </div>
@endsection
@section('footer')
    <div id="photo-caption" class="mdl-grid content-grid">
        <div class="title"></div>
        <div class="caption"></div>
    </div>
@endsection
