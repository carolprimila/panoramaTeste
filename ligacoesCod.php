<?php
session_start();
include 'ligacoesConexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
        <head>
        <meta charset="utf-8">
        <title> TONER - Ligações</title>
        <style>
        /* deixa preto o fundo */
        body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
    }

    /*cria tipo uma caixa q impede as opçoes d selecionar e escrever d ir pro lado tlgd */
    .container {
      max-width: 700px;
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
            width: 100%;
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
    <h1>Controle de Ligações</h1>

  <?php
if(isset($_SESSION['msg'])){
    echo $_SESSION ['msg'];
    unset ($_SESSION['msg']);
}
?>

    <form method="POST" action="ligacoesProcessa.php">

      <label >Data: </label>
      <input type="date" name="data" placeholder="  /  /   "><br>

         <label>Filial: </label>
         <select name="filial">
        <option value="" disabled selected>Selecione a Filial</option>
        <option value="P01 (Republica) 6101">P01 (Republica) 6101</option>
        <option value="P02 (JK)">P02 (JK)</option>
        <option value="P03 (Cataratas) 7403">P03 (Cataratas) 7403</option>
        <option value="P04 (Morumbi) 404">P04 (Morumbi) 404</option>
        <option value="P05 (Vila A) 7405">P05 (Vila A) 7405</option>
        <option value="P06 (CD) 7196">P06 (CD) 7196</option>
        <option value="P06 (CD) 7126">P06 (CD) 7126</option>
        <option value="P07 (Santa Terezinha) 7407">P07 (Santa Terezinha) 7407</option>
        <option value="P08 (Porto Meira) 408">P08 (Porto Meira) 408</option>
        <option value="P09 (Medianeira) 7409">P09 (Medianeira) 7409</option>
        <option value="P10 (Toledo) 7410">P10 (Toledo) 7410</option>
        <option value="P11 (Soho)">P11 (Soho)</option>
        <option value="PORTOBELLO SHOP">PORTOBELLO SHOP</option>
      </select>

      <label>Precisa:</label>
      <div class="radio-group">
        <label><input type="radio" name="precisa" value="Sim">Sim</label>
        <label><input type="radio" name="precisa" value="Não">Não</label>
      </div>

      <label for="quem">Quem atendeu?</label>
      <input type="text" id="quem"  name="quem" placeholder=""><br>

      <input type="submit" type="button" value="enviar"/>
    </form>

    <table id="ligacoestb">
      <thead>
        <tr>
        <th scope="col">Data</th>
        <th scope="col">Filial</th>
        <th scope="col">Precisa</th>
        <th scope="col">Quem</th>                    
        </tr>
      </thead>

      <?php
                
                $sql = "SELECT *
                    FROM ligacoesdb
                    ORDER BY data  desc, filial, precisa, quem";
                    
                     $busca = mysqli_query($link, $sql);

                     while ($dados = mysqli_fetch_array($busca)) {

                      $data = $dados['data'];
                      $filial = $dados['filial'];
                      $precisa = $dados['precisa'];
                      $quem = $dados['quem'];
        ?>

       <tr>
          <td><?php echo $data ?></td>
          <td><?php echo $filial ?></td>
          <td><?php echo $precisa ?></td>
          <td><?php echo $quem ?></td>
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