
Bienvenido a la plataforma SITU.
En este correo se te proporcionará una contraseña y usuario para ingresar en la plataforma.
Tu usuario es: <?php echo getUsuario(); ?>  
Tu contraseña es: <?php  save(); ?> 



<?php


//RECOGER DATO NOMBRE USUARIO
function getUsuario() {
      $request = request();
      $usuario = request('name', $default = null);
      return $usuario;
}
//RECOGER DATO NOMBRE EMAIL
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
        ['name' => getUsuario(), 'email' => getEmail(), 'password' => bcrypt($passw)]
  );
}

?>

