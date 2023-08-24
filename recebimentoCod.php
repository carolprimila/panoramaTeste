<?php
session_start();
include 'recebimentoConexao.php';
?>
<!DOCTYPE html>
<html Lang="pt-br">
                    <head>
    <meta charset="utf-8">
    <title>TONER - Recebimento</title>
    <style>
        /* deixa preto o fundo */
        body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
    }

    /*cria tipo uma caixa q impede as opçoes d selecionar e escrever d ir pro lado tlgd */
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
    }

        /* isso mexe no cabeçalho q vai ta o <h1> <h1> */
        h1 {
            margin: 0;
            padding: 10px;
            background-color: #333;
            color: white;
            text-align: center;
        }

        /*mexe no espaçamento das opçoes la d escreve*/
        form label {
      display: block;
      margin-top: 10px;
    }

    form input,
    form select {
      margin-top: 5px;
      padding: 5px;
    }

    /*isso aqi da a borda da tabela, uma borda branca*/ 
    table th,
    table td {
      padding: 10px;
      text-align: center;
      border: 1px solid white;
    }

        /* deixa a tabela piquitita */
        table {
            border-collapse: collapse;
            width: 64%;
            margin: 0 auto;
            margin-top: 20px;
        }
        
      /*noooossa, muda a cor do titulo da tabela*/
        th {
            background-color: #333;
            color: white;
        }


    </style>
</head>
<body>
  <div class="container">
    <h1>Controle de Recebimento</h1>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION ['msg'];
    unset ($_SESSION['msg']);
}
?>

<form method="POST" action="recebimentoProcessa.php">
    
         <label >Data: </label>
         <input type="date" name="data" placeholder="  /  /   "><br>

         <label>Filial: </label>
         <select name="filial">
        <option value="" disabled selected>Selecione a Filial</option>
        <option value="P01 (Republica)">P01 (Republica)</option>
        <option value="P02 (JK)">P02 (JK)</option>
        <option value="P03 (Cataratas)">P03 (Cataratas)</option>
        <option value="P04 (Morumbi)">P04 (Morumbi)</option>
        <option value="P05 (Vila A)">P05 (Vila A)</option>
        <option value="P06 (CD)">P06 (CD)</option>
        <option value="P07 (Santa Terezinha)">P07 (Santa Terezinha)</option>
        <option value="P08 (Porto Meira)">P08 (Porto Meira)</option>
        <option value="P09 (Medianeira)">P09 (Medianeira)</option>
        <option value="P10 (Toledo)">P10 (Toledo)</option>
        <option value="P11 (Soho)">P11 (Soho)</option>
        <option value="PORTOBELLO SHOP">PORTOBELLO SHOP</option>
      </select>

      <label>Modelo: </label>
            <select name="modelo">
        <option value="" disabled selected>Selecione o Modelo do Toner</option>
        <option value="310A BK">310A BK</option>
        <option value="311A C">311A C</option>
        <option value="312A Y">312A Y</option>
        <option value="313A M">313A M</option>
        <option value="5010 BK">5010 BK</option>
        <option value="5212 Y">5212 Y</option>
        <option value="5313 M">5313 M</option>
        <option value="CB 320A BK">CB 320A BK</option>
        <option value="CE 278A">CE 278A</option>
        <option value="CE 278A / 435A">CE 285A / 435A</option>
        <option value="CE321">CE321</option>
        <option value="CE322">CE322</option>
        <option value="CE 323A">CE 323A</option>
        <option value="CF 248A">CF 248A</option>
        <option value="CF 500A BK">CF 500A BK</option>
        <option value="CF 501A C">CF 501A C</option>
        <option value="CF 501A C">CF 502A Y</option>
        <option value="CF 503A M">CF 503A M</option>
        <option value="MP601">MP601</option>
        <option value="SP3710">SP3710</option>
        <option value="TK-1122">TK-1122</option>
        <option value="TK-1152">TK-1152</option>
        <option value="TK-1175">TK-1175</option>
        <option value="TK-3102">TK-3102</option>
        <option value="TK-3162">TK-3162</option>
        <option value="TK-5232 C">TK-5232 C</option>
        <option value="TK-5232K">TK-5232 K</option>
        <option value="TK-5232Y">TK-5232 Y</option>
      </select>

      <label>Quem Reenviou: </label>
     <input type="text" name="reenvio" placeholder="(Opcional)"><br>

     <label>Setor: </label>
     <input type="text" name="setor" placeholder=""><br>

     <input type="submit" type="button" value="enviar"/>
    </form>
</div>

<table id="recebimentotb">
    <thead>
        <tr>
        <th scope="col">Data</th>
        <th scope="col">Filial</th>
        <th scope="col">Modelo</th>
        <th scope="col">Reenvio</th>
        <th scope="col">Setor</th>
                    
        </tr>
      </thead>
      <?php
                
                $sql = "SELECT *
                    FROM recebimentodb
                    ORDER BY data  DESC";
                     $busca = mysqli_query($link, $sql);

                     while ($dados = mysqli_fetch_array($busca)) {

                      $data = $dados['data'];
                      $filial = $dados['filial'];
                      $modelo = $dados['modelo'];
                      $reenvio = $dados['reenvio'];
                      $setor = $dados['setor'];

                 ?>

       <tr>
          <td><?php echo $data ?></td>
          <td><?php echo $filial ?></td>
          <td><?php echo $modelo ?></td>
          <td><?php echo $reenvio ?></td>
          <td><?php echo $setor ?></td>
        </tr>
        
    <?php } ?>
    </tbody>
    </table>
  </div>

  <div>
  </div>

 <script> </script>
    </body>
</html>