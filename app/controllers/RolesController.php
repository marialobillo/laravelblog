<?php

class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$roles = Role::where('eliminado', '=', 0)->get();

		return View::make('roles.index')
			->with('roles', $roles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		return View::make('roles.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Role::$rules);

		if($validator->fails()){

			return Redirect::to('roles/create')
			->withErrors($validator)
			->withInput();

		}else{

			$role = new Role();
			$role->nombre = Input::get('nombre');
			$role->descripcion = Input::get('descripcion');


			$role->save();

			return Redirect::to('roles')
				->with('message', 'Role creado con éxito :)');

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
		//
		$role = Role::find($id);

		return View::make('roles.show')
			->with('role', $role);
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
		$role = Role::find($id);

		return View::make('roles.edit')
			->with('role', $role);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$validator = Validator::make(Input::all(), Role::$rules);

		if($validator->fails()){

			return Redirect::to('roles/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$role = Role::find($id);
			$role->nombre = Input::get('nombre');
			$role->descripcion = Input::get('descripcion');
			$role->save();

		
			return Redirect::to('roles')
				->with('message', 'Role editado con éxito :)');

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$role = Role::find($id);
		$role->eliminado = 1;
		$fecha = new dateTime('now');
		$role->deleted_at = $fecha;
		$role->save();

		return Redirect::to('roles')
			->with('message', 'Role Eliminado.');
	}


}
