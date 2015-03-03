<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = User::all();

		return View::make('users.index')
			->with('users', $users);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$roles = array();
		foreach(Role::where('eliminado', '=', 0)->get() as $role){
			$roles[$role->id] = $role->nombre;
		}

		$acis = array();
		foreach(Aci::where('eliminado', '=', 0)->get() as $aci){
			$acis[$aci->id] = $aci->nombre;
		}

		$tiposuser = array();
		foreach(TiposUser::where('eliminado', '=', 0)->get() as $tipo){
			$tiposuser[$tipo->id] = $tipo->nombre;
		}


		return View::make('users.create')
			->with('roles', $roles)
			->with('acis', $acis)
			->with('tiposuser', $tiposuser);


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()){

			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput();			

		}else{

			$code = str_random(60);
			$username = Input::get('nombre');
			$email = Input::get('email');

			$user = new User;
			$user->role_id = Input::get('role_id');
			$user->nombre = Input::get('nombre');
			$user->apellidos = Input::get('apellidos');
			$user->direccion = Input::get('direccion');
			$user->localidad = Input::get('localidad');
			$user->provincia = Input::get('provincia');
			$user->pais = Input::get('pais');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->cedula = Input::get('cedula');
			$user->code = $code;
			//las dependencias
			$user->aci_id = Input::get('aci_id');
			$user->tiposuser_id = Input::get('tiposuser_id');

			$user->save();

			if($user){

				//Enviar el email de activación
				Mail::send('emails.auth.activate', [
					'link' => URL::route('account-activate-in', $code),
					'username' => $username
				],
				function($message) use ($user){
					$message->to($user->email, $user->username)
						->subject('Activación de Cuenta');
				});

				return Redirect::route('home')
					->with('global', 'Cuenta Creada. Hemos enviado un correo para activar el usuario.');
			}


			//Session::flash('message', 'Usuario Almacenado correctamente, gracias.');
			//return Redirect::to('users');
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
		$user = User::find($id);

		return View::make('users.show')
			->with('user', $user);
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
		$user = User::find($id);

		$roles = array();
		foreach(Role::all() as $role){
			$roles[$role->id] = $role->nombre;
		}

		$acis = array();
		foreach(Aci::where('eliminado', '=', 0)->get() as $aci){
			$acis[$aci->id] = $aci->nombre;
		}

		$tiposuser = array();
		foreach(TiposUser::where('eliminado', '=', 0)->get() as $tipo){
			$tiposuser[$tipo->id] = $tipo->nombre;
		}


		return View::make('users.edit')
			->with('user', $user)
			->with('roles', $roles)
			->with('acis', $acis)
			->with('tiposuser', $tiposuser);
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
		$rules = [
			'nombre' => 'required',
			'apellidos' => 'required',
			'cedula' => 'required',
			//'email' => 'required|email|unique:users',
			'email' => 'unique:users,email,'.$id
		];
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return Redirect::to('users/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$user = User::find($id);
			$user->role_id = Input::get('role_id');
			//las dependencias
			$user->aci_id = Input::get('aci_id');
			$user->tiposuser_id = Input::get('tiposuser_id');

			$user->nombre = Input::get('nombre');
			$user->apellidos = Input::get('apellidos');
			$user->direccion = Input::get('direccion');
			$user->localidad = Input::get('localidad');
			$user->provincia = Input::get('provincia');
			$user->cedula = Input::get('cedula');
			$user->pais = Input::get('pais');
			$user->email = Input::get('email');			
			$user->save();

		
			return Redirect::to('users')
				->with('message', 'Usuario editado con éxito :)');

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
		$user = User::find($id);
		$user->delete();

		return Redirect::to('users')
			->with('message', 'Usuario Eliminado.');
	}


}
