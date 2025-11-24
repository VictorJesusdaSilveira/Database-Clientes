<?php

require_once("modelo/ClientePF.php");
require_once("modelo/ClientePJ.php");
require_once("dao/ClienteDao.php");

//Teste da conexão com o banco
/*
require_once("util/Conexao.php");
$pdo = Conexao::getConexao();
print_r($pdo);
exit;
*/

//Menu
do {
    print "\n\n----CADASTRO DE CLIENTES----\n";
    print "1- Cadastrar Cliente PF\n";
    print "2- Cadastrar Cliente PJ\n";
    print "3- Listar Clientes\n";
    print "4- Buscar Cliente\n";
    print "5- Excluir Cliente\n";
    print "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch ($opcao) {
        case 1:
            $clientePF = new ClientePF();
            $clientePF -> setNomeSocial(readline("Informe o nome social do cliente PF: ")) -> setEmail(readline("Informe o email do cliente PF: ")) -> setNome(readline("Informe o nome do cliente PF: ")) -> setCpf(readline("Informe o CPF do cliente PF: "));
            
            //Persistir o objeto no banco de dados
            $clienteDao = new ClienteDao();
            $clienteDao -> inserir($clientePF);
            print "Cliente PF cadastrado com sucesso!\n";
            break;

        case 2:
            $clientePJ = new ClientePJ();
            $clientePJ -> setNomeSocial(readline("Informe o nome social do cliente PJ: ")) -> setEmail(readline("Informe o email do cliente PJ: ")) -> setRazaoSocial(readline("Informe a razão social do cliente PJ: ")) -> setCnpj(readline("Informe o CNPJ do cliente PJ: "));
            
            //Persistir o objeto no banco de dados
            $clienteDao = new ClienteDao();
            $clienteDao -> inserir($clientePJ);
            print "Cliente PJ cadastrado com sucesso!\n";
            break;

        case 3:
             $dao = new ClienteDao();
             $clientes = $dao -> listar();
             foreach ($clientes as $c) {
                print $c["id"] . " - " . $c["tipo"] . " - " . $c["nome_social"] . " - " . $c["email"] . "\n";
             }
             
            break;

        case 4:
            print "Não implementado!\n";
            break;
            
        case 5:
            print "Não implementado!\n";
            break;

        case 0:
            print "Programa encerrado!\n";
            break;

        default:
            print "Opção inválida!";
    }
} while($opcao != 0);
