Has sido invitado a la plataforma SITU por <?php echo getUsuario(); ?> 
En este correo se te proporcionará un token que servirá de contraseña para ingresar en la plataforma.
Tu contraseña es: <?php token(); ?> 
Tendrás un grado de autorización de grado = <?php echo getAutorizacion(); ?> 
((IMPORTANTE)) Este correo ha sido enviado el día <?php echo getTiempo(); ?>  tendrás 7 días para usar esta invitación.
La invitación caducará el día <?php echo getCaduca(); ?>.


<?php


//RECOGER DATO NOMBRE USUARIO
function getUsuario() {
  echo  Auth::user()->name;
}

//RECOGER DATO  EMAIL
function getNombre() {
  $request = request();
  $nombre = request('name', $default = null);
  $nombre = strtoupper($nombre);
  return $nombre;
}

//RECOGER DATO  EMAIL
function getEmail() {
  $request = request();
  $email = request('email', $default = null);
  return $email;
}

//RECOGER DATO  AUTORIZACION
function getAutorizacion() {
  $request = request();
  $autorizacion = request('autorizacion', $default = null);
  return $autorizacion;
}

 //TIEMPO DE ENVIO
function getTiempo() {
  date_default_timezone_set('Europe/Madrid');
  $date = date('Y-m-d');
  return $date;
}

 //TIEMPO DE BORRADO
function getCaduca() {
      date_default_timezone_set('Europe/Madrid');
      $caduca = date('Y-m-d');
      $caduca = date('Y-m-d',strtotime($caduca . "+7 days"));
  return $caduca;

}

 //GENERADOR DE CONTRASEÑAS
function randomPassword() {
  $token = bin2hex(openssl_random_pseudo_bytes(16));

      return $token; //turn the array into a string

    }


    function token(){
      $passw=randomPassword();
      echo $passw;
      Auth::user()->name;

      DB::table('users')->insert(['name' => getNombre(),'rol' => 3, 'email' => getEmail(), 'password' => bcrypt($passw)]);

      $alumno_id = DB::table('alumno')
      ->where('alumno.user_id','=', Auth::user()->id)
      ->join('users','users.id','=','user_id')
      ->select('alumno.id') 
      ->get();

      foreach($alumno_id as $aluid){
        $alumno_id = $aluid->id; 

        DB::table('invitado')
        ->insert(['user_id' => Auth::user()->id, 'alumno_id' => $alumno_id, 'tiempo_permiso' => getCaduca(), 'email' => getEmail(), 'password' => bcrypt($passw), 'acceso' => getAutorizacion(), 'rol' => 3]);



      }

    }
    ?>

