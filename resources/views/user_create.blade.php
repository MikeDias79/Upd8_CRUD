@extends('master')

@section('content')

<h2>Create</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('users.store') }}" method="POST">
@csrf
<input type="text" name="nome" value="" placeholder="Nome" size="50">
<button type="submit"> Create </button>
</form>

@endsection