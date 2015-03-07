<?php 


class AccountController extends BaseController{


	//mostramos el formulario de crear una cuenta, para todos los publicos
	public function getCreate(){

		return View::make('account.create');
	}

	//recogemos lo que el formulario nos envía, el de crear cuenta
	public function postCreate(){

		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()){
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();
		}else{
			
			$user = new User();
			$user->email = Input::get('email');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->active = 1;
			$user->role_id = 1; 

			$user->save();

			if($user){

			
				return Redirect::route('home')
					->with('global', 'Cuenta Creada. Puede acceder.');
			}
		}
	}





	//Acceso a la cuenta
	//mostramos el formulario de login o acceso a su cuenta
	public function getSignin(){

		return View::make('account.signin');
	}

	//lo que recogemos el formulario de login
	public function postSignin(){

		$validator = Validator::make(Input::all(), [
			'email' => 'required',
			'password' => 'required'
		]);

		if($validator->fails()){

			//redireccionamos al inicio, ha fallado
			return Redirect::route('account-signin')
				->withErrors($validator)
				->withInput();
		}else{

			$remember = (Input::has('remember')) ? true : false;

			
			$auth = Auth::attempt([
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			], $remember);

			if($auth){
				
				//Vamos al home
				return Redirect::intended('/');
				

			}else{

				//Volvemos al formulario de login por fallos
				return Redirect::route('account-signin')
					->with('global', 'Email/Contraseña no son correctos.')
					->withInput();
			}
		}

		//Si todo falla
		return Redirect::route('account-signin')
			->with('global', 'Hay un problema al acceder. Inténtelo de nuevo');
	}

	//Cerrar la sesión
	public function getSignout(){

		Auth::logout();
		if(!Auth::check()){
			return Redirect::route('account-signin');
		}
		
	}


	//Mostramos el perfil del cliente con capacidad de modificación
	public function getPerfil(){

		return View::make('account.perfil');
	}

	public function postPerfil(){

		$id = Auth::user()->id;

		

		$validator = Validator::make(Input::all(), User::$rules_edit);

		if($validator->fails()){

			return Redirect::route('account-perfil')
				->withErrors($validator);
		}else{

			$user = User::find(Auth::user()->id);

			$user->username = Input::get('username');
			

			if($user->save()){
				//Guarda correctamente
				return Redirect::route('home')
					->with('global', 'Los cambios en su perfil se guardaron correctamente.');
			}else{
				//Hubo fallo, vuelva a intentarlo más tarde
				return Redirect::route('account-perfil')
					->with('global', 'Se ha producido un error, vuelva a intentarlo en otro momento. Gracias');
			}
		}
	}


	//Vamos a cambiar la contraseña desde la cuenta!!!
	//Cambiamos la contraseña, muestra formulario
	public function getChangePassword(){

		return View::make('account.password');
	}

	
	//lo que se recibe del formulario para cambiar la contraseña
	public function postChangePassword(){

		$validator = Validator::make(Input::all(), [
			'old_password' => 'required',
			'password' => 'required|min:6',
			'password_again' => 'required|same:password'
		]);

		if($validator->fails()){

			return Redirect::route('account-password')
				->withErrors($validator);

		}else{

			//cambiar la contraseña
			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$password = Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){

				//password user provider
				$user->password = Hash::make($password);

				if($user->save()){

					return Redirect::route('home')
						->with('global', 'Contraseña cambiada.');
				}else{

					return Redirect::route('account-password')
						->with('global', 'La contraseña antigua no es válida');
				}
			}

		}

		return Redirect::route('account-password')
			->with('global', 'La contraseña no pudo cambiarse');
	}

	//mostramos la vista para recordar la contraseña
	public function getForgotPassword(){

		return View::make('account.forgot');
	}

	//lo que recoge el formulario de recordar la contraseña
	public function postForgotPassword(){

		$rules = ['email' => 'required|email'];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return Redirect::route('account-forgot-password')
				->withErrors($validator)
				->withInput();
		}else{

			//cambiar contaseña
			$user = User::where('email', '=', Input::get('email'));

			if($user->count()){

				$user = $user->first();

				//Generar un nuevo código
				$code = str_random(60);
				$password = str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if($user->save()){

					Mail::send('emails.auth.forgot', [
						'link' => URL::route('account-recover', $code),
						'username' => $user->username, 
						'password' => $password
					], function($message) use ($user){
						$message->to($user->email, $user->username)
							->subject('Su nueva contraseña');
					});

					return Redirect::route('home')
						->with('global', 'Le hemos enviado la nueva contraseña a su Email');
				}
			}
		}

		return Redirect::route('account-forgot-password')
			->with('global', 'No se ha podido cambiar la contraseña.');
	}


	




}


 ?>