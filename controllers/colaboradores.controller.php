<?php

require_once '../models/colaboradores.php'

if (isset($_POST['operacion'])){

  $colaboradores = new Colaboradores();

  if ($_POST['operacion'] == 'registrar'){

    //PASO 1: Recolectar todos los valores enviados
    //por la vista y almacenarlos en un array asociativo
    $datosGuardar = [
      "apellidos"     => $_POST['apellidos'],
      "nombres"       => $_POST['nombres'],
      "cargo"         => $_POST['cargo'],
      "idsede"        => $_POST['idsede'],
      "telefono"      => $_POST['telefono'],
      "contrato"      => $_POST['contrato'],
      "direccion"     => $_POST['direccion'],
      "cv"            => ''
    ];

    //Vamos a verificar si la vista nos envió una FOTOGRAFIA
    if (isset($_FILES['cv'])){

      $rutaDestino = '../views/img/fotografias/'; //Carpeta
      $fechaActual = date('c'); //C = Complete, AÑO/MES/DIA/HORA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".pdf";
      $rutaDestino .= $nombreArchivo;

      //Guardamos la fotografía en el servidor
      if (move_uploaded_file($_FILES['cv']['tmp_name'], $rutaDestino)){
        $datosGuardar['cv'] = $nombreArchivo;
      }

    }

    //PASO 2: Enviar el array al método registrar
    $colaboradores->registrarColaboradores($datosGuardar);

  }

  if ($_POST['operacion'] == 'listar'){
    $data = $colaboradores->listarColaboradores();

    if ($data){
      $numeroFila = 1;
      $datosColaboradores = '';
      $botonNulo = " <a href='#' class='btn btn-sm btn-warning' title='No tiene cv'><i class='bi bi-eye-slash-fill'></i></a>";
      
      foreach($data as $registro){
        $datosColaboradores = $registro['apellidos'] . ' ' . $registro['nombres'];

        //La primera parte a RENDERIZAR, es lo standard (siempre se muestra)
        echo "
          <tr>
            <td>{$numeroFila}</td>
            <td>{$registro['apellidos']}</td>
            <td>{$registro['nombres']}</td>
            <td>{$registro['cargo']}</td>
            <td>{$registro['telefono']}</td>
            <td>{$registro['contrato']}</td>
            <td>{$registro['direccion']}</td>
            <td>
              <a href='#' class='btn btn-sm btn-danger'><i class='bi bi-trash3'></i></a>
              <a href='#' class='btn btn-sm btn-info'><i class='bi bi-pencil-fill'></i></a>";
        
        //La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFÍA
        if ($registro['cv'] == ''){
          echo $botonNulo;
        }else{
          echo " <a href='../views/img/fotografias/{$registro['cv']}' data-lightbox='{$registro['idcolaborador']}' data-title='{$datosColaboradores}' class='btn btn-sm btn-warning'><i class='bi bi-eye-fill'></i></a>";
        }

        //La tercera parte a RENDERIZAR, cierre de la fila
        echo "
            </td>
          </tr>
        ";

        $numeroFila++;
      }
    }
  } //Fin operacion=listar

}