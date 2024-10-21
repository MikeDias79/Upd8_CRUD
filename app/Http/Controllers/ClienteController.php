<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public readonly Cliente $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente; // Atribua diretamente o valor recebido pelo construtor.
    }

    /*public function index()
    {
        $clientes = $this->cliente->all();
        return view('clientes', ['clientes' => $clientes]);
    }*/

    public function index(Request $request)
    {
        // Captura os dados do formulário
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $estado = $request->input('estado');

        $ch = curl_init();
        $url = 'http://127.0.0.1/Upd8_CRUD/ListaClientes.php?nome=' . $nome . '&cpf=' . $cpf . '&estado=' . $estado;
        curl_setopt($ch, CURLOPT_URL, $url);         // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Define que a resposta deve ser retornada como string

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $clientes = $data;
        return view('clientes', ['clientes' => $clientes], ['nome'=> $nome, 'cpf'=>$cpf, 'estado'=>$estado] );

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //var_dump($request->except(['_token']));
       $created = $this->cliente->create([
        'nome' => $request->input('nome'),
        'cpf' => $request->input('cpf'),
        'dtnasc' => $request->input('dtnasc'),
        'sexo' => $request->input('sexo'),
        'estado' => $request->input('estado'),
        'cidade' => $request->input('cidade')
       ]);

       if($created){
            return redirect()->route('clientes.index')->with('message', 'Cliente Criado com Sucesso');
       } else {
        return redirect()->back()->with('message', 'Erro - Criar');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->cliente->where('id', $id)->delete();
        return redirect()->route('clientes.index')->with('message', 'Cliente Excluído com Sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente_edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $updated = $this->cliente->where('id', $id)->update($request->except(['_token', '_method']));
       
       if($updated){
        return redirect()->route('clientes.index')->with('message', 'Cliente Alterado com Sucesso');
       } else {
        return redirect()->back()->with('message', 'Erro - Alterar');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->where('id', $id)->delete();
        return redirect()->route('clientes.index')->with('message', 'Cliente Excluído com Sucesso');
    }
}
