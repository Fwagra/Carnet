@extends('layouts.app')
@section('title', trans('comment.management_title'))
@section('content')
    <div class="mdl-grid content-grid index-comments">
        <div class="mdl-card centered  mdl-cell mdl-cell--12-col mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h3>{!! trans('comment.management_title') !!}</h3>
            </div>
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp  mdl-cell mdl-cell--12-col">
            <thead>
               <tr>
                 <th class="mdl-data-table__cell--non-numeric">{!! trans('comment.date') !!}</th>
                 <th class="mdl-data-table__cell--non-numeric">{!! trans('comment.name') !!}</th>
                 <th class="mdl-data-table__cell--non-numeric">{!! trans('comment.message') !!}</th>
                 <th class="mdl-data-table__cell--non-numeric"></th>
               </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                    <?php $icon = ($comment->active == 1)? 'visibility' : 'visibility_off'; ?>
                    <tr>
                      <td class="mdl-data-table__cell--non-numeric">{{$comment->created_at->format('d-m-Y')}}</td>
                      <td class="mdl-data-table__cell--non-numeric">{{ $comment->name }}</td>
                      <td class="mdl-data-table__cell--non-numeric">{{  str_limit($comment->message, 75) }}</td>
                      <td class="mdl-data-table__cell--non-numeric"><i class="material-icons">{{$icon}}</i></td>
                    </tr>
                @empty
                    <tr>
                        {!! trans('step.no_comments') !!}
                    </tr>
                @endforelse
            </tbody>
        </table>
        {!! $comments->render() !!}
    </div>
@endsection
