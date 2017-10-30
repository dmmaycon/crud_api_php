<?php
require_once('../model/Usuario.php');
require_once('../utils/PdoMdm.php');

class UsuarioDao
{
    private $usuario;
    private static $conn;
    private static $stmt;


    public static function listaTodos(){
        try{
            self::$conn = PdoMdm::novoPdoMdm();
            if(self::$conn === null)
                return 'Sem Conexão com o banco!';
            
            self::$stmt = self::$conn->prepare("SELECT * FROM usuarios"); 
            self::$stmt->execute();

            self::$stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = self::$stmt->fetchAll();

            $myArr = [];
            foreach($result as $row){
                $arr = array(
                    'id' => $row['id'],
                    'nome' => $row['nome'],
                    'login' => $row['login'],
                    'senha' => $row['senha']
                ); 
                $myArr[] = $arr;
            }
            header('Content-Type: application/json');
            echo json_encode($myArr);
        }catch(PDOException $e){
            return "Erro: " . $e->getMessage();
        }

    }

    public static function listaUm($id){
        try{
            self::$conn = PdoMdm::novoPdoMdm();
            if(self::$conn === null)
                return 'Sem Conexão com o banco!';
            
            self::$stmt = self::$conn->prepare("SELECT * FROM usuarios WHERE id = $id"); 
            self::$stmt->execute();

            self::$stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = self::$stmt->fetchAll();
            
            $myArr = [];
            foreach($result as $row){
                $arr = array(
                    'id' => $row['id'],
                    'nome' => $row['nome'],
                    'login' => $row['login'],
                    'senha' => $row['senha']
                ); 
                $myArr[] = $arr;
            }
            header('Content-Type: application/json');
            echo json_encode($myArr);
        }catch(PDOException $e){
            return "Erro: " . $e->getMessage();
        }
    }

    public static function update($id, $nome, $login, $senha){
        try{
            self::$conn = PdoMdm::novoPdoMdm();
            if(self::$conn === null)
                return 'Sem Conexão com o banco!';
            
            self::$stmt = self::$conn->prepare("UPDATE `usuarios` 
                                                SET `nome`= '$nome',
                                                    `login`= '$login',
                                                    `senha`= '$senha' 
                                                WHERE `id` = $id"); 
            self::$stmt->execute();
            UsuarioDao::listaUm($id);

        }catch(PDOException $e){
            return "Erro: " . $e->getMessage();
        }
    }

    public static function delete($id){
        try{
            self::$conn = PdoMdm::novoPdoMdm();
            if(self::$conn === null)
                return 'Sem Conexão com o banco!';
            
            self::$stmt = self::$conn->prepare("DELETE FROM `usuarios`  
                                                WHERE `id` = $id"); 
            self::$stmt->execute();
            UsuarioDao::listaTodos();

        }catch(PDOException $e){
            return "Erro: " . $e->getMessage();
        }
    }

    public static function insert($nome, $login, $senha){
        try{
            self::$conn = PdoMdm::novoPdoMdm();
            if(self::$conn === null)
                return 'Sem Conexão com o banco!';
            
            self::$stmt = self::$conn->prepare("INSERT INTO `usuarios`(`nome`, `login`, `senha`)
                                                VALUES('$nome', '$login', '$senha')");

            self::$stmt->execute();
            UsuarioDao::listaTodos();

        }catch(PDOException $e){
            return "Erro: " . $e->getMessage();
        }
    }

}