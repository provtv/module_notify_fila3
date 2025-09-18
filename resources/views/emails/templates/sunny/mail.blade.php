<<<<<<< HEAD
<<<<<<< HEAD
nds('notify::emails.templates.sunny')
=======
@extends('notify::emails.templates.sunny')
>>>>>>> 90c60faa (.)
=======
@extends('notify::emails.templates.sunny')
>>>>>>> 9b05d0a6 (.)

@section('content')

    {{-- @include ('beautymail::templates.sunny.heading', [
        'heading' => 'Hello!',
        'level' => 'h1',
    ]) --}}

    @include('notify::emails.templates.sunny.contentStart')

    {!! $html !!}

    @include('notify::emails.templates.sunny.contentEnd')

    {{-- @include('beautymail::templates.sunny.button', [
        'title' => 'Click me',
        'link' => 'http://google.com',
    ]) --}}

@stop
