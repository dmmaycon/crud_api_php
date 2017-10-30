<?php

class PdoMdm
{
    private static $servidor = '127.0.0.1';
    private static $usuario = 'root';
    private static $senha = '';
    private static $nomeBanco = 'crud';


    public static function novoPdoMdm(){
        try{
            $conn = new PDO("mysql:host=".self::$servidor.";"."dbname=".self::$nomeBanco . "", self::$usuario, self::$senha);
            // aqui pode lancar possiveis erros de conexao
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; // retorna a conexão com o mysql
        }catch(PDOException $e){
            return "Conexão falhou erro: " . $e->getMessage();
        }
    }

}