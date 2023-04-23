<?php

require_once 'Conexion.php';

class Colaboradores extends Conexion{

  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  //Datos[] es un array asociativo, que contiene la información
  //a guardar proveniente del controlador
  public function registrarColaboradores($datos = []){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_colaboradores_registrar(?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos['apellidos'], 
          $datos['nombres'], 
          $datos['cargo'],
          $datos['idsede'],
          $datos['telefono'],
          $datos['contrato'],
          $datos['direccion'],
          $datos['cv']
        )
      );
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarcolaboradores(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_colaboradores_registrar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}