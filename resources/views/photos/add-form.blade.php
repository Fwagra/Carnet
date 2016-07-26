{{ Form::open(['url' => route('photo.store'),'class' => 'dropzone','id' => 'mydropzone',  'method' => 'POST', 'files' => true]) }}
    {{ Form::file('file[]', ['multiple' => true])}}
{{ Form::close() }}
