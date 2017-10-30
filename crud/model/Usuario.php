<?php

class Usuario
{
    private $id;
    private $nome;
    private $login;
    private $senha;

    public function __construct($nome, $login, $senha){
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        return $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        return $this->senha = $senha;
    }


}