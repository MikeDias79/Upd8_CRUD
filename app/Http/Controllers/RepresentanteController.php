<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Representante;

class RepresentanteController extends Controller
{
    public readonly Representante $representante;

    public function __construct(representante $representante)
    {
        $this->representante = $representante; // Atribua diretamente o valor recebido pelo construtor.
    }

    public function index()
    {
        $representantes = $this->representante->all();
        return view('representantes', ['representantes' => $representantes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('representante_create');
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
       $created = $this->representante->create([
        'nome' => $request->input('nome'),
        'cnpj' => $request->input('cnpj')
       ]);

       if($created){
            return redirect()->route('representantes.index')->with('message', 'Representante Criado com Sucesso');
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
        $this->representante->where('id', $id)->delete();
        return redirect()->route('representantes.index')->with('message', 'Representante Excluído com Sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Representante $representante)
    {
        return view('representante_edit', ['representante' => $representante]);
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
       $updated = $this->representante->where('id', $id)->update($request->except(['_token', '_method']));
       
       if($updated){
        return redirect()->route('representantes.index')->with('message', 'Representante Alterado com Sucesso');
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
        $this->representante->where('id', $id)->delete();
        return redirect()->route('representantes.index')->with('message', 'Representante Excluído com Sucesso');
    }


}
