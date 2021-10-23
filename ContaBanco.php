<?php

class ContaBanco {
    
    //atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    //métodos
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        
        //CC é conta corrente, e CP é conta poupança
        if ($t == "CC"){
            $this->setSaldo(50); //dar preferência para essa maneira do que a de baixo
        } elseif ($t == "CP"){
            $this->saldo = 150;  //maneira "errada"
        }
    }
    public function fecharConta() {
       if ($this->getSaldo() > 0 ){
           echo "<p>Conta de ". $this->getDono()." com dinheiro </p>";
        }elseif ($this->getSaldo() <0) {
            echo "<p>Conta de ". $this->getDono()." em débito </p>";
        } 
        else {
            $this->setStatus(false);
       }
    }
    public function depositar($v) {  //param v é o valor que quero depositar
        if($this->getStatus()){  // mesmo que "$this->status == true"
            $this->setSaldo($this->getSaldo()+ $v);
            //ou "$this->saldo = $this->saldo + $v;"
        } else {
            echo '<p>Impossível depositar </p>';
        }
    }
    public function sacar($v) {  //param v é o valor que quero sacar
        if($this->getStatus()){
           if ($this->getSaldo() >= $v){
               $this->setSaldo($this->getSaldo() - $v);
           }else {
               echo '<p>Saldo de '. $this->getDono(). ' insuficiente para saque </p>';
           } 
        }else {
            echo '<p>Impossível sacar, conta de '. $this->getDono(). ' fechada </p>';
        }
    }
    public function pagarMensal() {
        //valor das mensalidades a pagar
        if($this->getTipo() == "CC"){
            $v = 12;
        }elseif ($this->getTipo() == "CP") {
            $v = 20;
        }
        //verificação de conta e saldo para pagar as mensalidades
        if($this->getStatus()){  // mesmo que "$this->status == true"
            $this->setSaldo($this->getSaldo() - $v);
        } else{
            echo '<p>Problemas com a conta, não posso cobrar </p>';
        }
    }
    
    //métodos especiais
    public function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo '<p>Conta de criada, yee </p>';
    }
    function setNumConta($n) {
        $this->numConta = $n;
    }
    function getNumConta(){
        return $this->numConta;
    }
    
    function setTipo($t){
        $this->tipo = $t;
    }
    function getTipo(){
        return $this->tipo;
    }
    
    function setDono($d){
        $this->dono = $d;
    }
    function getDono(){
        return $this->dono;
    }
    
    function setSaldo($s){
        $this->saldo = $s;
    }
    function getSaldo(){
        return $this->saldo;
    }
    
    function setStatus($sts){
        $this->status = $sts;
    }
    function getStatus(){
        return $this->status;
    }
    
}
