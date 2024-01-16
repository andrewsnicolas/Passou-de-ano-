<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médias</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main>
    <?php 
    require_once 'vendor/autoload.php';
    $nomes = Faker\Factory::create('pt_BR');
    $medEsc = $_GET['mediaEscola'] ?? 6;
    $nome = $_GET['nomeAluno']??"Chaves";
    $idade = $_GET['idadeAluno']?? 10;
    $m1 = $_GET['media1']?? 0;
    $m2 = $_GET['media2']?? 0;
    $m3 = $_GET['media3']?? 0;
    $m4 = $_GET['media4']?? 0;
    ?>
    <h1>Para o aluno</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
    <label for="v1">Digite seu nome</label>
    <input type="text" name="nomeAluno" value="<?=$nome?>"> 
    <label>Digite sua idade</label>
    <input type="number" name="idadeAluno" value="<?=$idade?>"> 
    <label>Digite a média de sua escola</label>
    <input type="number" name="mediaEscola" value="<?=$medEsc?>">
    <label>1° Média</label>
    <input type="number" name="media1" step="0.01" value="<?=$m1?>">
    <label>2° Média</label>
    <input type="number" name="media2" step="0.01" value="<?=$m2?>">
    <label>3° Média</label>
    <input type="number" name="media3" step="0.01" value="<?=$m3?>">
    <label>4° Média</label>
    <input type="number" name="media4" step="0.01" value="<?=$m4?>">
    <input type="submit" value="Enviar">
    </form>
    </main>
    <section>
        <h1>Resultado</h1>
    <?php
    if($idade > 19 || $idade < 6) echo "<h2>Você não tem idade para estar na escola.</h2>";
    if($m1>10)$m1 = 10;
    if($m1<0) $m1 = 0;
    if($m2>10)$m2 = 10;
    if($m2<0) $m2 = 0;
    if($m3>10)$m3 = 10;
    if($m3<0) $m3 = 0;
    if($m4>10)$m4 = 10;
    if($m4<0) $m4 = 0;
    else{
        if(($m1+$m2+$m3+$m4)/4 >= $medEsc) $passou = "Aprovado";
        else $passou = "Reprovado";
        echo "<table>
        <tr>
        <td><strong>Nome</strong></td>
        <td><strong>Idade</strong></td>
        <td><strong>Média 1° bimestre</strong></td>
        <td><strong>Média 2° bimestre</strong></td>
        <td><strong>Média 3° bimestre</strong></td>
        <td><strong>Média 4° bimestre</strong></td>
        <td><strong>Aprovado?</strong></td>
        </tr>
        <tr>
        <td>$nome</td>
        <td>$idade</td>
        <td>$m1</td>
        <td>$m2</td>
        <td>$m3</td>
        <td>$m4</td>
        <td>$passou</td>
        </tr>
        ";
        for($i = 0; $i <= 40; $i++){
            echo"<tr><td>". ($nomes->name()). "</td>";
            $idadeorig = $idade;
            $aux = rand(1,3);
            if($aux == 1) $idade = $idade -1;
            elseif($aux == 2) $idade = $idade +1; 
            echo "<td>$idade</td>";
            $idade = $idadeorig;
            $m1 = rand(0, 10);
            echo"<td>$m1</td>";
            $m2 = rand(0, 10);
            echo"<td>$m2</td>";
            $m3 = rand(0, 10);
            echo"<td>$m3</td>";
            $m4 = rand(0, 10);
            echo"<td>$m4</td>";
            echo ($m1+$m2+$m3+$m4)/4 >= $medEsc? "<td>Aprovado</td>" : "<td>Reprovado</td>". "</tr>";
        }
        echo "</table>";
    }
    /*
    Estrutura de um if no php
    if(expressão){
        código
    } elseif(expressão){
        código
    } else {
        código
    }7
    expressões booleanas
    > < : maior menor
    >= <= : maior igual, menor igual
    == : igual
    != : diferente
    === : exatamente igual
    && : AND 
    || : OR
    */
    ?>
    </section>
</body>
</html>