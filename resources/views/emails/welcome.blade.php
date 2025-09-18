<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
nds('notify::emails.templates.widgets')
=======
@extends('notify::emails.templates.widgets')
>>>>>>> 90c60faa (.)
=======
@extends('notify::emails.templates.widgets')
>>>>>>> 9b05d0a6 (.)
=======
@extends('notify::emails.templates.widgets')
>>>>>>> 4bf9ea78 (.)

@section('content')

	@include('notify::emails.templates.widgets.articleStart')

		<h4 class="secondary"><strong>Hello World</strong></h4>
		<p>This is a test</p>

	@include('notify::emails.templates.widgets.articleEnd')


	@include('notify::emails.templates.widgets.newfeatureStart')

		<h4 class="secondary"><strong>Hello World again</strong></h4>
		<p>This is another test</p>

	@include('notify::emails.templates.widgets.newfeatureEnd')

@stop