
{{! $datos = DB::table('alumno')
->select('alumno.id')
->where('users.id','=', Auth::user()->id)
->join('users','users.id','=','user_id')
->get()
}}

{{! $mail_invitado = DB::table('invitado')
->select('email')
->where('invitado.user_id', '=', Auth::user()->id )
->get()}}


<div class="body" style="width: 100%; min-height: 100%; height: auto !important; top:0; left: 0;background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;">


  <div class="container">
    <h1 class="mb-2 text-center">LOG DE LOGINS DE TUS INVITADOS</h1>


    <table class="table table-striped table-dark">
      <?php $contador=0 ?>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha y Hora</th>
        </tr>
      </thead>
      <tbody>


        @foreach($mail_invitado as $maili)

        @if($maili->email !== NULL)

        {{! $log_invitado = DB::table('users')
        ->select('name','tiempolog')
        ->where('users.email', '=', $maili->email )
        ->get() }}

        @foreach($log_invitado as $u)

        <tr>
          <th scope="row"><?php $contador++; echo $contador ?></th>
          <td>{{ $u->name }}</td>
          <td> @if($u->tiempolog == "0001-01-01 00:00:00")
            NO HA HABIDO CONEXIÓN RECIENTE
            @else 
            {{$u->tiempolog }}
          @endif</td>
        </tr>
        @endforeach
        
        @endif
        @endforeach
      </tbody>
    </table>

  </div>

  <br><br>

</div>

</body>


   


