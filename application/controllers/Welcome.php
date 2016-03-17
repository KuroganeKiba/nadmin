<?php

class Welcome extends CI_Controller {


	public function index(){ //construye el controlador para el index
		$this->home();
	}

	public function home(){ // se declara la función

		// ------------------ //
		// carga de librerias //
		// ------------------ //

		$this->load->helper('file'); // permite la lectura de archivos

		$i = 0; // define el contador para las siguientes funciones

		// -------------------- //
		// Busca las instancias //
		// -------------------- //

		$instancias = shell_exec('ls /home/kimbo/config/');

		$instancias = preg_split('#[\r\n]+#', $instancias); //separa los datos en un array

		if(empty($instancias[count($instancias)-1])) {//limpia los datos de campos vacíos
			unset($instancias[count($instancias)-1]);
		}



		// ---------------------------------------------------------------- //
		// Genera dinamicamente el contenido de cada instancia del servicio //
		// ---------------------------------------------------------------- //

			foreach($instancias as $instancia){

				if (substr($instancia, -4) == '.liq')
				{

					$puerto = read_file('/home/kimbo/config/'.$instancia.''); // lee el archivo donde se especifica el puerto

					if($puerto != ''){ // revisa si la carpeta tenía el archivo

						$puerto = substr($puerto, strripos($puerto,'server.telnet.port')+21, 4); // limpia el contenido para dejar sólo el puerto


						// ---------------- //
						// Ejecuta el shell //
						// ---------------- //


						$shellString = shell_exec('sudo systemctl status kimbo.service'); //obtiene los datos

						$info = preg_split('#[\r\n]+#', $shellString); //separa los datos en un array

						if(empty($info[count($info)-1])) {//limpia los datos de campos vacíos
						   unset($info[count($info)-1]);
						}

						$cantidadInfo = count($info);

						$state = 1;//determina el estado, 1=activo 2=inactivo

						if (strpos($info[2], 'inactive') !== false) {
						    $state = 0;
						}


						$toDo = 'stop';

						if($state == 0){$toDo = 'start';}

						$nombreItem = str_replace('* kimbo.service - ', '', $info[0]);



						// ------- //
						// Canción //
						// ------- //



						$shellStringSong = shell_exec('echo "pulse_out(liquidsoap:).metadata"|socat - TCP4:127.0.0.1:1234|grep "initial_uri"|tail -n1 |cut -d "=" -f2'); //obtiene los datos

						$shellStringSong = str_replace('"', '', $shellStringSong);

						$shellStringSong = str_replace('/home/kimbo/library/accounts/standalone/', '', $shellStringSong);

						$shellStringSong = str_replace('//', '/', $shellStringSong);


						$shellStringSong = str_replace('/', ' / ', $shellStringSong);

						$shellStringSong = str_replace('-', ' ', $shellStringSong);

						$shellStringSong = str_replace('_', ' ', $shellStringSong);

						$nombreSong = substr(strrchr($shellStringSong, "/"), 1);

						$pathSong = substr($shellStringSong, 0, strpos($shellStringSong, $nombreSong));

						

						// --- //
						// Log //
						// --- //


						$nombreLog = substr($instancia, 0, strpos($instancia, "."));

						$nombrePlayer = $nombreLog;

						$nombreLog = $nombreLog.'.log';


						// --------------- //
						// Datos filtrados //
						// --------------- //


						$datosFiltrados=array( //crea el array del nombre y estado

							'nombre' => $nombrePlayer,
							'estado' => $state,
							'action' => $toDo,
							'nombreSong' => $nombreSong,
							'pathSong' => $pathSong,
							'nombreLog' => $nombreLog,
							'puerto' => $puerto

						);

						// ---------------------- //
						// pasa los datos al view //
						// ---------------------- //

						$data['instancia'] = $instancia;

						$data['datosFiltrados'.$i] = $datosFiltrados; 

						$data['ultimoI'] = $i;

						$data['infoItem'.$i] = $info;

						$data['totalInfoItem'.$i] = $cantidadInfo;

						$data['cancion'.$i] = $shellStringSong;

						$i ++;
				}

				// ------------------ //
				// Instancia y puerto //
				// ------------------ //

				 // recoge el nombre de la instancia
					

				} else{$data['ultimoI'] = $i;};


			}
		//-----------------------------------------------



		$data['title'] = shell_exec('hostname -f');
		
		$data['list2'] =  'hola';

		$this->load->view('head',$data); //loads the template's top part
		$this->load->view('welcome_message',$data); //loads the template's content part (main part)
		$this->load->view('bottom'); // loads the template's bottom part
	}
}