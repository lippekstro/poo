<?php
require_once '_cabecalho.php';
?>

<section class="m-3">
    <?php

    interface Movimentos
    {
        public function andar();

        public function atacar();
    }

    class Classe {
        protected $nome_classe; // o modificador protected permite que classes herdeiras consigam acessar a propriedade diretamente ($this->nome_classe)

        public function __construct($nome)
        {
            $this->nome_classe = $nome;
        }

        public function getNomeClasse(){
            return $this->nome_classe;
        }
    }

    class Personagem extends Classe implements Movimentos
    {
        public function andar()
        {
            echo  $this->nome_classe . " *Andando normalmente*<br>"; // acessando o nome da classe de forma direta
        }

        public function atacar()
        {
            echo  $this->nome_classe . " *Golpeando*<br>";
        }
    }

    class Zumbi implements Movimentos
    {
        public function andar()
        {
            echo "Zumbi *Andando torto*<br>";
        }

        public function atacar()
        {
            echo "Zumbi *Tentando comer seu cerebro*<br>";
        }
    }

    $boneco = new Personagem("Guerreiro");
    $boneco->andar();
    $boneco->atacar();
    echo $boneco->getNomeClasse() . "<br>"; // por ser protected nao posso acessar diretamente ($boneco->nome_classe) fora da classe ou das herdeiras

    echo "<hr>";

    $zumbi = new Zumbi();
    $zumbi->andar();
    $zumbi->atacar();

    ?>
</section>

<?php
require_once '_rodape.php';
?>