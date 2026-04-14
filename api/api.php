<?php
    header("Content-Type: application/json");   
    $metodo = $_SERVER["REQUEST_METHOD"];
    // echo "Método da requisição".$metodo;

    $arquivo = "usuarios.json";

    if (!file_exists($arquivo)){
        file_put_contents($arquivos, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    $usuarios = json_decode(file_get_contentes($arquivo), true);

    // $usuarios = [
    //     ["id" => 1,"nome" => "Maria Souza", "email" => "maria@email.com"],
    //     ["id" => 2, "nome" => "João Silva", "email" => "joao@email.com"]
    // ];

    switch($metodo){
        case "GET":
            echo json_encode($usuarios);
            break;
        case 'POST':
            $dados = json_decode(file_get_contents("php://input"), true);
            $novoUsuario =[
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            array_push($usuarios, $novoUsuario);
            echo json_encode("Usuário inserido com sucesso!");
            print_r($usuarios);
            break;
        default:
            echo "Método não encontrado!";
            break;
    }

    // header("Content-Type: application/json");

    // echo json_encode($usuarios);
?>