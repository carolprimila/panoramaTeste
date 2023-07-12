<?php
session_start();
include 'teste2.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
        <head>
        <meta charset="utf-8">
            <title>TONER -  Envio</title>
            <style>
                 body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form label {
      display: block;
      margin-top: 10px;
    }

    form input,
    form select {
      margin-top: 5px;
      padding: 5px;
    }

    form button {
      margin-top: 10px;
      padding: 5px 10px;
      background-color: white;
      color: black;
      border: none;
      cursor: pointer;
    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 10px;
      text-align: left;
      border: 1px solid white;
    }

    .sidebar {
      position: fixed;
      left: 10px;
      top: 22.5%;
      transform: translateY(-50%);
      display: flex;
      flex-direction: column-reverse;
      align-items: center;
      gap: 10px;
    }

    .sidebar button {
      width: 150px;
      height: 45px;
      background-color: #ffffff;
      color: rgb(0, 0, 0);
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .sidebar button:hover {
      background-color: #e68920;
    }
  </style>
        </head>
        <body>
            <div class="container">
            <h1>Monitoração de Envio</h1>
            <?php
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset ($_SESSION['msg']);
            }
            ?>

            <form method="POST" action="processa.php">

              <script> </script>

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
      </select>

            <label>Modelo: </label>
            <select name="modelo">
        <option value="" disabled selected>Selecione o Modelo do Toner</option>
        <option value="310A">310A</option>
        <option value="311A">311A</option>
        <option value="312A">312A</option>
        <option value="313A">313A</option>
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

            <label>Quantia: </label>
            <input type="number" name="quantia" placeholder="" min="1" max="5"><br>

            <label>Quem Solicitou: </label>
            <input type="text" name="solicitante" placeholder=""><br>

            <label>Setor: </label>
            <input type="text" name="setor" placeholder=""><br>

            <input type="submit" type="button" value="enviar" onclick="cadToner(data.value, filial.value, modelo.value, quantia.value, solicitante.value, setor.value)"/>

        </form>
            </div>

              <!--  Select do banco para carregar as informaõções alegria  -->
              <table id="toner">
        <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Filial</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Quantia</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Setor</th>
                    
                  
                </tr>
            </thead>
           <?php
                
                $sql = "SELECT *
                    FROM teste02
                    -- ORDER BY STR_TO_DATE(data, '%d/%m/%Y') DESC";
                     $busca = mysqli_query($link, $sql);

                     while ($dados = mysqli_fetch_array($busca)) {

                      $data = $dados['data'];
                      $filial = $dados['filial'];
                      $modelo = $dados['modelo'];
                      $quantia = $dados['quantia'];
                      $solicitante = $dados['solicitante'];
                      $setor = $dados['setor'];

                 ?>

       <tr>
          <td><?php echo $data ?></td>
          <td><?php echo $filial ?></td>
          <td><?php echo $modelo ?></td>
          <td><?php echo $quantia ?></td>
          <td><?php echo $solicitante ?></td>
          <td><?php echo $setor ?></td>
        </tr>
        


  
    <?php } ?>
    </tbody>
    </table>
  </div>

  <div class="sidebar">
    <a href="file:///C:/Users/TeamInfra/Desktop/ligacoes.html" target="_blank" rel="noopener noreferrer"><button>Ligações</button></a>
    <a href="file:///C:/Users/TeamInfra/Desktop/recebimento.html" target="_blank" rel="noopener noreferrer"><button>Recebimento</button></a>
  </div>

 <script type="text/javascript" src="cadToner.js.js"> </script>
    </body>
</html>