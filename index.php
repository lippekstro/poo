<?php
require_once '_cabecalho.php';
require_once 'util.php';
?>

<section class="m-3">
    <?php

    // criando uma classe
    class ContaBancaria
    {
        public $saldo; // propriedade, controle de acesso publico
        //private $saldo;

        public function extrato() // metodo, sao acoes que um objeto sofre ou faz
        {
            echo $this->saldo; // exibe o saldo DESTA conta, ou seja, o objeto que chamou o metodo
        }

        public function deposito($valor)
        {
            $this->saldo += $valor; // o saldo atual da conta DESTE objeto que chamou mais o novo valor
        }

        public function saque($valor)
        {
            if ($valor <= $this->saldo) {
                $this->saldo -= $valor; // o saldo atual menos o novo valor
            } else {
                echo "Saldo insuficiente<br><br>";
            }
        }
    }

    $conta = new ContaBancaria(); // criando/instanciando objeto
    Util::varDumpFormatado($conta); // apos a criacao do objeto ele tem todas as propriedades null, ele tem acesso a todos os metodos

    $conta->saldo = 100; // acessando e modificando
    Util::varDumpFormatado($conta); // acessei e modifiquei agora exibe um valor

    echo $conta->saldo . "<br>"; // acessando e exibindo

    /* diferença do uso dos modificadores */

    $conta->saque(500); // usando o metodo, ha uma veficacao que nao permite quebrar minha regra de negocio

    echo "sacando usando acesso direto";
    $conta->saldo -= 500; // se eu posso acessar diretamente uma propriedade publica, consigo modificar sem passar pelas verificacoes podendo ocasionar problemas em algum ponto
    Util::varDumpFormatado($conta); // veja o saldo negativo

    // agora mude o modificador de acesso do saldo para private
    // todos os acessos usando -> ficam quebrados, voce so pode acessar e modificar os valores de saldo atraves dos metodos
    // para executar comente as linhas que deram erro e tire os comentarios EXTERNOS das linhas abaixo

    /* echo "a partir daqui usando os metodos para acesso<br><br>";
    $conta->deposito(500); // colocando 500 na conta atraves do metodo
    Util::varDumpFormatado($conta); */

    /*  $conta->saque(500); // saque com sucesso pois passa pela verificacao e tem a quantidade suficiente
    Util::varDumpFormatado($conta); */

    /* $conta->saque(100); // saque sem sucesso pois a conta nao tem mais dinheiro */

    ?>
</section>

<?php
require_once '_rodape.php';
?>