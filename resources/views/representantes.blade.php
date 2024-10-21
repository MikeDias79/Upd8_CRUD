@extends('master')

@section('content')

<a href="{{ route('home') }}">Home</a> -- <a href="{{ route('representantes.create') }}">Adicionar Representante</a>

<hr>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<div class="table-responsive">

<table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                    <th scope="col">#id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($representantes as $representante)

                    <tr>
                        <td scope="row"><a href="{{ route('representantes.edit', ['representante' => $representante['id']]) }}">[-Editar-]</a></th>
                        <td scope="row"><a href="{{ route('representantes.destroy', ['representante' => $representante['id']]) }}">[-Excluir-]</a></th>
                        <th scope="row">{{$representante->id}}</th>
                        <td scope="row">{{$representante->nome}}</td>
                        <td scope="row">{{$representante->cnpj}}</td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

@endsection