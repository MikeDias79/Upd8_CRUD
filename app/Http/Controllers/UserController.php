<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;

    public function __construct(User $user)
    {
        $this->user = $user; // Atribua diretamente o valor recebido pelo construtor.
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       var_dump($request->except(['_token']));
       $created = $this->user->create([
        'nome' => $request->input('nome')
       ]);

       if($created){
        return redirect()->back()->with('message', 'Usuario Criado com Sucesso');
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
    public function show(user $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('user_edit', ['user' => $user]);
        //$user = $this->user->find($id);
        //var_dump($user);
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
       $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
       
       if($updated){
        return redirect()->back()->with('message', 'Usuario Alterado com Sucesso');
       } else {
        return redirect()->back()->with('message', 'Erro - Update');
       }
        //var_dump($request->except(['_token', '_method']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route('users.index');
    }
}
