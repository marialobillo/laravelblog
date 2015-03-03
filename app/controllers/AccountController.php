<?php 


class AccountController extends BaseController{


	public function getSignin(){

		return View::make('account.signin');
	}


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
				'password' => Input::get('password')
				
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
			->with('global', 'Hay un problema al acceder. Intentelo en otro momento, gracias.');
	}

}

 ?>