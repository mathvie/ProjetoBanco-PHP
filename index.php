<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto Banco</title>
    </head>
    <body>
        <pre>
        <?php
            require_once 'ContaBanco.php';
        
            $p1 = new ContaBanco();  // Leo
            
            $p1->abrirConta("CC");
            $p1->setNumConta(1122);
            $p1->setDono("Leo");
            
            
            $p2 = new ContaBanco();  // Carol

            $p2->abrirConta("CP");
            $p2->setNumConta(7766);
            $p2->setDono("Carol");
            
            //Leo depositará 300 e Carol depositará 500
            $p1->depositar(300);
            $p2->depositar(500);
            
            //Carol quis sacar 1000 mas não tinha saldo
            $p2->sacar(1000);
            
            
            //Carol quis comprar uma bolsa de 100
            $p2->sacar(100);
            
            //os dois pagaram mensalidade
            $p1->pagarMensal();
            $p2->pagarMensal();
            
            
            //Leo quis fechar sua conta mas ainda tem saldo
            $p1->fecharConta();
            
            //Carol sacou todo o dinheiro da conta
            $p2->sacar(530);
            
            //Carol fechou sua conta
            $p2->fecharConta();

            print_r($p1);
            print_r($p2);
        ?>
        </pre>
    </body>
</html>
