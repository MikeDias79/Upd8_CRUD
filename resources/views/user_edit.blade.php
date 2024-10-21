@extends('master')

@section('content')

<h2>Edit</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT">    
<input type="text" name="Nome" value="{{ $user->nome }}" size="50">
<button type="submit"> Atualizar </button>
</form>

@endsection