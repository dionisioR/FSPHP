<?php
function functionName($arg1, $arg2, $arg3){
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

// argumentos opcionais devem vir no final da lista
// argumentos obrigatórios devem vir no começo da lista
function argumentosOpcionais($arg1, $arg2, $arg3 = true, $arg4 = null){
    return [$arg1, $arg2, $arg3, $arg4];
}

// Acesso Global
// OBS.: Quando utilizamos variaveis globais devemos fazer um 
// teste de controle para ver se as variáveis existem ou se 
// seus valores são válidos.
function IMC(){
    global $peso;
    global $altura;
    $imc = $peso / ($altura ** 2);
    return $imc;
}

// Argumentos estaticos
function totalPagar($preco){
    static $total;
    $total += $preco;
    return "<p>O total a pagar é R$" . number_format($total, "2", ",",".") . ".</p>";
    // number_format($variavel, "qtdCasaDecimais", "separadorDecimal","separadorMilhar")
}

// argumentos dinâmicos
// utilizado quando não sabemos quais argurmentos (ou a quantidade de argumentos) serão passados.
function argumentosDinamicos(){
    $teamName = func_get_args();
    $teamCount = func_num_args();
    return ['Nomes' => $teamName, 'count' => $teamCount];
}