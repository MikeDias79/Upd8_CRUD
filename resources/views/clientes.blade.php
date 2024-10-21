@extends('master')

@section('content')

<a href="{{ route('home') }}">Home</a> -- <a href="{{ route('clientes.create') }}">Adicionar usuário</a>

<hr>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<div class="table-responsive">

<form action="{{ route('clientes.index') }}" method="GET">
@csrf    
Nome:<input type="text" name="nome" value=""  size="30"> &nbsp; &nbsp; CPF:<input type="text" name="cpf" value=""  size="30"> &nbsp; &nbsp; 
Estado:
<select name="estado">
    <option value="">TODOS</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
    <option value="EX">Estrangeiro</option>
</select> &nbsp; &nbsp; 
<button type="submit"> Pesquisar</button>
</form>


<br>
<table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                    <th scope="col">#id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data Nascimento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cidade</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($clientes as $cliente)

                    <tr>
                        <td scope="row"><a href="{{ route('clientes.edit', ['cliente' => $cliente['id']]) }}">[-Editar-]</a></th>
                        <td scope="row"><a href="{{ route('clientes.destroy', ['cliente' => $cliente['id']]) }}">[-Excluir-]</a></th>
                        <td scope="row"><a href="Javascript:window.open('http://127.0.0.1/Upd8_CRUD/ListaRepUF.php?uf={{$cliente['estado']}}','Representantes','width=500,height=700,location=0,menubar=no,status=no,titlebar=no,toolbar=no,top=20');">[-X-]</a></th>

                        <th scope="row">{{$cliente['id']}}</th>
                        <td scope="row">{{$cliente['nome']}}</td>
                        <td scope="row">{{$cliente['cpf']}}</td>
                        <td scope="row">{{$cliente['dtnasc']}}</td>
                        <td scope="row">{{$cliente['sexo']}}</td>
                        <td scope="row">{{$cliente['estado']}}</td>
                        <td scope="row">{{$cliente['cidade']}}</td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

@endsection