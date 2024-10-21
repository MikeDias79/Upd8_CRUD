@extends('master')

@section('content')

<h2>Alterar Representante</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('representantes.update', ['representante' => $representante->id]) }}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT">    
<p>Nome:<br><input type="text" name="nome" value="{{ $representante->nome }}" placeholder="Nome" size="100"></p>
<p>CNPJ:<br><input type="text" name="cnpj" value="{{ $representante->cnpj }}" placeholder="CNPJ Sem Pontos" size="20"></p>
<button type="submit"> Alterar </button>
</form>

@endsection