<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
  // Método inicial do Controller Clientes
  public function index() {
  	$clientes = DB::table('clientes')
      ->select('codigo', 'nome')
      ->orderBy('nome', 'asc')
      ->get();

		return view('listar', ['clientes' => $clientes]);		
  }

  public function show($codigo) {
    $cliente = DB::table('clientes')->where('codigo', $codigo)->get();

    return view('nome', ['nome' => $cliente]);
  }


  //View de cadastro de um novo cliente.
  public function create() {
  	return view('novo');
  }



  //Gravação das informações do novo cliente.
  public function store(Request $request) {
    $request->validate([
      'nome'  => 'required',
      'nascimento'      => 'date',
      'cpf' => 'required|numeric',
      'email' => 'required',
      'fone' => 'required|numeric'
    ]);

    $cliente = [
    	'nome'  => $request->input('nome'),
    	'nascimento' => $request->input('nascimento'),
    	'cpf' => $request->input('cpf'),
      'email' => $request->input('email'),
      'fone' => $request->input('fone')
    ];

    DB::table('clientes')->insert($cliente);

    return redirect('/clientes')->with('mensagem', 'Cliente Cadastrado no sistema!');
  }

  public function edit($codigo) {
    $cliente = DB::table('clientes')->where('codigo', $codigo)->get();

    return view('editar', ['clientes' => $cliente]);
  }

  public function update(Request $request, $codigo) {
    $request->validate([
      'nome'  => 'required',
      'nascimento'      => 'date',
      'cpf' => 'required|numeric',
      'email' => 'required',
      'fone' => 'required|numeric',
    ]);

    $cliente = [
      'nome'  => $request->input('nome'),
      'nascimento' => $request->input('nascimento'),
      'cpf' => $request->input('cpf'),
      'email' => $request->input('email'),
      'fone' => $request->input('fone')
    ];

    DB::table('clientes')->where('codigo', $codigo)->update($cliente);

    return redirect('/clientes')->with('mensagem', 'Cliente Alterado com sucesso.');
  }

  // Exclusão de um cliente cadastrado.
  public function destroy($codigo) {
	DB::table('clientes')->where('codigo', $codigo)->delete();

    return redirect('/clientes')->with('mensagem', 'Cliente '. $codigo .' Excluído!');
  }
}
