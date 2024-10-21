@extends('master')

@section('content')

<h2>Criar Usuário</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('clientes.store') }}" method="POST">
@csrf
<p>Nome:<br><input type="text" name="nome" value="" placeholder="Nome Completo" size="100"></p>
<p>CPF:<br><input type="text" name="cpf" value="" placeholder="CPF Sem Pontos" size="20"></p>
<p>Data Nasc:<br><input type="date" name="dtnasc" size="15"></p>
<p>Sexo:<br><Select name="sexo">
    <option value="M">Masculino</option>
    <option value="F">Feminino</option>
</Select></p>
<p>UF:<br><select name="estado">
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
</select></p>
<p>Cidade:<br><input type="text" name="cidade" value="" placeholder="Cidade de Atividade" size="100"></p>
<button type="submit"> Create </button>
</form>

@endsection