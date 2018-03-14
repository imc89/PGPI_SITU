
Has sido invitado a la plataforma SITU.
En este correo se te proporcionará una token  para ingresar en la plataforma.
Tu contraseña es: <?php  token(); ?> 



<?php


//RECOGER DATO NOMBRE USUARIO
function getUsuario() {
      $request = request();
      $usuario = request('name', $default = null);
      return $usuario;
}

//RECOGER DATO  ROL
function getRol() {
      $request = request();
      $rol = request('rol', $default = null);
      return $rol;
}


//RECOGER DATO  EMAIL
function getEmail() {
      $request = request();
      $email = request('email', $default = null);
      return $email;
}


 //GENERADOR DE CONTRASEÑAS
function randomPassword() {
      $token = bin2hex(openssl_random_pseudo_bytes(16));

      return implode($token); //turn the array into a string

}


function token(){
      $passw=randomPassword();
      echo $passw;



      DB::table('invitado')->insert(
        ['name' => getUsuario(), 'email' => getEmail(), 'token' => $token]);

}

?>

