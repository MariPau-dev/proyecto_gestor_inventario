<?php
//AQUI ESTA LA FUNCION QUE CREA Y DEVUELVE UNA CONEXION A LA DB
//AQUI CONECTA EL CODIGO CON LA  DB EN MYSQL
function conectarDB(): PDO 
{
   $host = 'localhost'; //servidor interno de la DB
   $db   ='gestor_tareas';//NOMBRE DE LA DB
   $user = 'root';//EL USUARIO
   $pass ='daniel2002';//CONTRASEÑA 
   $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";//LOGICA INTERNA DE CONEXION

   return new PDO(  $dsn, $user, $pass,[
    //EN CASO DE FALLAR EN UN ACONSULTA LANZARA UNA EXCEPCION EN VEZ DE FALLAR EN SILENCIO
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   //LOS RESULTADOS VIENEN COMO ARRAYAS ASOCIADOS
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   ]);
}