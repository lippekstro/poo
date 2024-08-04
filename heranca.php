<?php
require_once '_cabecalho.php';
?>

<section class="m-3">
    <?php

    abstract class Animal // classe abstrata, nao pode ser instanciada, deve ser herdada
    {
        private $nome; // com o modificador private o acesso direto (->) é permitido somente dentro aqui da propria classe
        private $cor;

        public function getNome() // getters sao responsaveis por acessos indiretos as propriedades
        {
            return $this->nome;
        }

        public function setNome($nome) // setters sao responsaveis por atribuições indiretas
        {
            $this->nome = $nome;
        }

        public function getCor() // getters sao responsaveis por acessos indiretos as propriedades
        {
            return $this->cor;
        }

        public function setCor($cor) // setters sao responsaveis por atribuições indiretas
        {
            $this->cor = $cor;
        }

        public function __construct($nome, $cor)
        {
            $this->nome = $nome;
            $this->cor = $cor;

            $this->seApresente(); // construtores tambem podem ja de cara chamar metodos
        }

        public function seApresente()
        {
            echo $this->getNome() . " diz: Eu sou o $this->nome $this->cor<br>";
        }

        public abstract function fazBarulho(); // metodos abstratos nao tem corpo, devem ser implementados pelas classes herdeiras
    }

    class Gato extends Animal // classe Gato herdando de animal
    {
        public function fazBarulho() // implementaçao obrigatoria do metodo fazBarulho
        {
            echo $this->getNome() . " diz: Miau<br>"; // nao posso acessar o $nome de forma direta ($this->nome), somente usando metodos
        }
    }

    class Cachorro extends Animal
    {
        public function fazBarulho() // polimorfismo, o mesmo metodo com implementacoes diferentes
        {
            echo $this->getNome() . " diz: Au Au<br>";
        }
    }

    $gato = new Gato("Gato", "Preto");
    $gato->fazBarulho(); // o metodo chamado funciona de um modo especifico para a classe gato
    $gato->setCor("Branco"); // nao posso acessar diretamente ($gato->cor) e alterar a cor, entao uso um setter
    $gato->seApresente();

    echo "<hr>";

    $cachorro = new Cachorro("Cachorro", "Caramelo");
    $cachorro->fazBarulho(); // o metodo chamado funciona de um modo especifico para a classe cachorro

    ?>
</section>

<?php
require_once '_rodape.php';
?>