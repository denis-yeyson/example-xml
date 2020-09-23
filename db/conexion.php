<?php
class Conexion
{
   private $server;
   private $user;
   private $password;
   private $database;
   private $port;

   function __construct()
   {
      $listados = $this->getConexion();
      foreach ($listados as $key => $value) {
         $this->server = $value['server'];
         $this->user = $value['user'];
         $this->password = $value['password'];
         $this->database = $value['database'];
         $this->port = $value['port'];
      }
      $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
      if ($this->conexion->connect_errno) {
         print_r("No hay conexion");
         die();
      }
   }

   private function getConexion()
   {
      $direccion = dirname(__FILE__);
      $jasondata = file_get_contents($direccion . "/" . "config.json");
      return json_decode($jasondata, true);
   }

   private function convertirUTF8($array)
   {
      array_walk_recursive($array, function (&$item, $key) {
         if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
         }
      });
      return $array;
   }

   public function getDatos($sqlstr)
   {
      $results = $this->conexion->query($sqlstr);
      $resultArray = array();
      foreach ($results as $key) {
         $resultArray[] = $key;
      }
      return $this->convertirUTF8($resultArray);
   }

   function array2xml($data, $root = null, $child)
   {
      $xml = new SimpleXMLElement($root ? '<' . $root . '/>' : '<root/>');
      foreach ($data as $key => $value) {
         $second = $xml->addChild($child);
         foreach ($value as $key2 => $valor) {
            $second->addChild($key2, $valor);
         }
      }
      return $xml->asXML();
   }
}
