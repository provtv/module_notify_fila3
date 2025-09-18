<<<<<<< HEAD
<<<<<<< HEAD
nds('notify::emails.templates.ark')
=======
@extends('notify::emails.templates.ark')
>>>>>>> 90c60faa (.)
=======
@extends('notify::emails.templates.ark')
>>>>>>> 9b05d0a6 (.)

@section('content')

    {{--
    @include('notify::emails.templates.ark.heading', [
		'heading' => $subject,
		'level' => 'h1'
	])
    --}}

    @include('notify::emails.templates.ark.contentStart')
        {!! $html !!}
    @include('notify::emails.templates.ark.contentEnd')



@stop