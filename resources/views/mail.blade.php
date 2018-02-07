Bienvenido a la plataforma SITU.
En este correo se te proporcionará una contraseña y usuario para ingresar en la plataforma.
Tu contraseña es: <?php echo randomPassword(); ?>

      <?php //GENERADOR DE CONTRASEÑAS
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

      ?>