@extends('master')

@section('content')

<h2>Show User - {{ $user->nome }}</h2>

<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
@csrf
<input type="hidden" name="_method" value="DELETE">   
<button type="submit">Apagar</button>
</form>

@endsection