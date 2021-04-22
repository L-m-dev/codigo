<!-- criar NOVO ARQUIVO .php com este codigo>


	<?php
	$user = 'root';
	$password = 'root';
	$db = 'MUDAR ESSA COISA';
	$host = 'localhost';
	$port = 8888;

	$link = mysqli_init();
	$success = mysqli_real_connect(
	   $link, 
	   $host, 
	   $user, 
	   $password, 
	   $db,
	   $port
	);
	 
	 
	$SQL = "INSERT INTO horas (Data, HoraEntrada, HoraSaida, Justificativa) 
	VALUES ('$_POST[Data]','$_POST[HoraEntrada]','$_POST[HoraSaida]','$_POST[Justificativa]')";

	$link->query($SQL);
	 
header("Refresh:0.1; url=PaginaUsuarioInserir.php");
	?>
	<!--;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-->

<!-- no site principal html. 'name' é o q vai ser puxado pelo script acima no '$_POST[Data]' -->

<form name="f2" action="tabela.php" method="post">
							
		<input type="text"  name="Data" <!-- validaçao é um script externo, required = campo obrigatorio--> required  onblur="ValidaData(this)" > 
 
		<input type="time" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]"  name="HoraEntrada" required
		 		
		<input type="time" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" name="HoraSaida" required  
		 		
		<input type="text" name="Justificativa"  required  
		 
		<br><br>
		
		<button class="button" type="submit" value="Submit"> Adicionar </button>
		 
		 
	</form>
	
	<!-- PUXAR E MOSTRAR TABELA: --> 
	
	<table>
<tr>
<th>Data</th>
<th>Hora </th>
<th>Hora </th>
<th>Justificativa</th>
</tr>
<?php  
$user = 'root';
$password = 'root';
$db = 'MUDAR DATABASE AQUI';
$host = 'localhost';
$port = 8888;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
 
$sqlget = "SELECT Data, HoraEntrada, HoraSaida, Justificativa FROM NomeDaTabela";
$result = $link->query($sqlget);
if ($result->num_rows > 0) {
 
 
  while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Data"]. "</td><td>" . $row["HoraEntrada"] . "</td><td>"
. $row["HoraSaida"]. "</td><td>" . $row["Justificativa"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
 