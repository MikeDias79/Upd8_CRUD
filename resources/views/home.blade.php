@extends('master')

@section('content')

<h2>Home - Teste UPD8</h2>

<a href="{{ route('clientes.index') }}">Clientes</a><br>
<a href="{{ route('representantes.index') }}">Representantes</a>

@endsection