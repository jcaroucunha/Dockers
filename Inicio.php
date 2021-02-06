<!DOCTYPE html>
<html lang= "en"\cf2 >
<head>
<meta charset= "utf-8" >
<meta name= "viewport" content= " width= device-width, initial-scale=1.0"
>
<style> ul {
    list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
    background-color: #111133;
}
li {
    float: left;
}
li a {
display: block;
color: white;
    text-align: center;
padding: 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #331333;
}
table, th, td {
border: 1px solid black;
}

#fishTankValues {
border-collapse: collapse;
width: 100%;
}

#fishTankValues td, #fishTankValues th {
border: 2px solid black;
padding: 8px;
}

#fishTankValues tr:nth-child(even){background-color: #f2f2f2;}

#fishTankValues tr:hover {background-color: #ddd;}

</style>
</head>
<body> <header> <h2> Controlador Aquario </h2>
</header>
<section>
<ul>
<li>
<a href= "http://10.0.1.47:5000/Camara" > Camara </a>
</li>
<li> <a href= "http://10.0.1.47:5000/Funcionalidades" > Funcionalidades </a> </li>
<li> <a href= "http://10.0.1.47/phpmyadmin" > Base de Dados </a> </li>
<li> <a href= "http://10.0.1.47:5000/updateValues" > Atualizar Parametros </a> </li>
<li> <a href= "http://10.0.1.47:5000/reboot"> Reiniciar Sistema </a> </li>
</ul>
<br>
</body>
</html>
<?php
    $connection = mysqli_connect('localhost', 'root', 'jonycunha', 'Controlador_Aquario'); //The Blank string is the password
    
    $query = "SELECT * FROM `Sensores` WHERE id=(SELECT max(id) FROM Sensores)"; //You don't need a ; like you do in SQL
    $result = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    ?>

<html>
<h2 align="center"> Valores dos Parâmetros do Aquário </h2>
<br>
<table id='fishTankValues' style="width:100%">
<tr>
<th> pH </th>
<th> Temperatura Ambiente </th>
<th> Temperatura Água </th>
<th> Nível Água </th>
<th> Hora </th>
<th> Data </th>
</tr>
<tr>
<td align="center"> <?php echo $row['pH']?> </td>
<td align="center"> <?php echo $row['TemperaturaAmbiente']?> </td>
<td align="center"> <?php echo $row['TemperaturaAgua']?> </td>
<td align="center"> <?php echo $row['NivelAgua']?> </td>
<td align="center"> <?php echo $row['Hora']?> </td>
<td align="center"> <?php echo $row['Data']?> </td>
</tr>
</table>
<br>
<h2 align="center"> Estado Relês de Contrlolo do Sistema </h2>
<br>
<table id='fishTankValues' style="width:100%">
<tr>
<th> Led Azul </th>
<th> Led Branco </th>
<th> Luzes T4 </th>
<th> Bomba Retorno Sump </th>
</tr>
<tr>
<td align="center"> <?php echo $row['rele1_state']?> </td>
<td align="center"> <?php echo $row['rele2_state']?> </td>
<td align="center"> <?php echo $row['rele3_state']?> </td>
<td align="center"> <?php echo $row['rele4_state']?> </td>
</tr>
<tr>
<th> Escumador </th>
<th> Motor Movimento Cima </th>
<th> Motor Movimento Baixo </th>
<th> Termostato </th>
</tr>
<tr>
<td align="center"> <?php echo $row['rele5_state']?> </td>
<td align="center"> <?php echo $row['rele6_state']?> </td>
<td align="center"> <?php echo $row['rele7_state']?> </td>
<td align="center"> <?php echo $row['rele8_state']?> </td>
</tr>
<tr>
<th> Ventoínhas de Arrefecimento </th>
<th> Sistema de Auto Top Up </th>
<th> Luzes Sump </th>
<th> Termostato de Segurança </th>
</tr>
<tr>
<td align="center"> <?php echo $row['rele9_state']?> </td>
<td align="center"> <?php echo $row['rele10_state']?> </td>
<td align="center"> <?php echo $row['rele11_state']?> </td>
<td align="center"> </td>
</tr>
</table>
</html>

<?php
    }
    
    mysqli_close($connection); //Make sure to close out the database connection
    
    ?>
