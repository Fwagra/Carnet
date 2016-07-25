{{ Form::open(['url' => route('photo.store'),'class' => 'dropzone','id' => 'my-awesome-dropzone',  'method' => 'POST', 'files' => true]) }}
    {{ Form::file('file')}}
{{ Form::close() }}
