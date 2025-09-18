<<<<<<< HEAD
<<<<<<< HEAD
nds('beautymail::templates.sunny')
=======
@extends('beautymail::templates.sunny')
>>>>>>> 90c60faa (.)
=======
@extends('beautymail::templates.sunny')
>>>>>>> 9b05d0a6 (.)

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>Today will be a great day!</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
        	'title' => 'Click me',
        	'link' => 'http://google.com'
    ])

@stop