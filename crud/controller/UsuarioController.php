<?php
require_once('../dao/UsuarioDao.php');

if(isset($_GET['lista_todos'])){
    try{
        echo UsuarioDao::listaTodos();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_GET['lista_um'])){
    try{
        echo UsuarioDao::listaUm($_GET['lista_um']);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['op'])){
    switch($_POST['op']){
        case 'update':
            if(isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha']) and isset($_POST['id'])){
                echo UsuarioDao::update($_POST['id'], $_POST['nome'],$_POST['login'], $_POST['senha']);
            } 
        break;
        case 'delete':
        if(isset($_POST['id'])){
            echo UsuarioDao::delete($_POST['id']);
        }
        break;
        case 'insert':
            if(isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha'])){
                echo UsuarioDao::insert($_POST['nome'],$_POST['login'], $_POST['senha']);
            } 
        break;
    }
}