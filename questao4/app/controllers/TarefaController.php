<?php

class TarefaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lista_init = DB::table('tarefas')->orderby('prioridade','asc')->get();
		return Response::json($lista_init);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$lista = Input::get('lista');
		if($lista != ''){
			$this->update($lista);
		}else{
			$tarefa = new Tarefa;
			$tarefa->titulo = Input::get('titulo');
			$tarefa->descricao = Input::get('descricao');
			$tarefa->save();
			return Response::json(array('success' => true));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tarefa = Tarefa::find($id);
		return Response::json($tarefa);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Change Prioridade
	 *
	 * @param  string $lista
	 * @return Response
	 */
	public function update($lista)
	{

		$split = explode(",",$lista);
		for($i = 0; $i < count($split); $i++){
			echo "ID: ".$split[$i];
			echo "<br>";
			echo "Posicao: ". $i;
			DB::table("tarefas")
			->where('id', intval($split[$i]))
			->update(array('prioridade' => $i));
		}

		return Response::json(array('success' => true));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tarefa::destroy($id);

		return Response::json(array('success' => true));
	}

	/**
	 * Update the specified resource in storage.
	 * @return Response
	 */
	public function save(){

		DB::table("tarefas")
			->where('id', intval(Input::get('id')))
			->update(array('titulo' => Input::get('titulo'),'descricao' => Input::get('descricao')
			));
		return Response::json(array('success' => true));
	}


}
