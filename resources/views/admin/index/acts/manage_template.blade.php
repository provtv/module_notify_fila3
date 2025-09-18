<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
nds('adm_theme::layouts.app')
=======
@extends('adm_theme::layouts.app')
>>>>>>> 90c60faa (.)
=======
@extends('adm_theme::layouts.app')
>>>>>>> 9b05d0a6 (.)
=======
@extends('adm_theme::layouts.app')
>>>>>>> 4bf9ea78 (.)
@section('content')
    <a class="btn btn-primary">+</a>
    <table class="table table-bordered">
    @foreach ($rows as $row)
        <tr>
            <td>{{ $row-> }}</td>

        </tr>
    @endforeach
    </table>
@endsection