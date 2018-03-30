
Bienvenido a la plataforma SITU.
En este correo se te proporcionará una contraseña y usuario para ingresar en la plataforma.
Tu usuario es: <?php echo getUsuario(); ?>  
Tu rol es: <?php $rol=getRol(); if($rol==1){echo "ALUMNO";}else{echo "PROFESOR";}?> 
Tu contraseña es: <?php  save(); ?> 



<?php


//RECOGER DATO NOMBRE USUARIO
function getUsuario() {
      $request = request();
      $usuario = request('name', $default = null);
      $usuario = strtoupper( $usuario);
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
      $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
      $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
      }
      return implode($pass); //turn the array into a string

}


function save(){
      $passw=randomPassword();
      echo $passw;



      DB::table('users')->insert(
          ['name' => getUsuario(),'rol' => getRol(), 'email' => getEmail(), 'password' => bcrypt($passw)]);

}

?>

