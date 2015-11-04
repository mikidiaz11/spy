<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap Navbar Example</title>
		<!-- Bootstrap -->
		<link href="../Styles/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../Scripts/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../Scripts/bootstrap.min.js"></script>
		
		<style class="text/css">
		body{
			padding-top: 20px;
			background-color: black;
		}

		table{
			color: white;
		}

		.table-hover tbody tr:hover td {
        	background-color: #6666FF;
        }
}
		</style>
	</head>
	<body>
		<div class="container">
			
			<div class="jumbotron"><h2><b>estadísticas (index.html 🔜 enlaces)</b></h2></div>

			<table class="table table-bordered table-hover">
			    <thead>
			        <tr>
			            <th>Páginas web</th>
			            <th>Número de visitas</th>
			            <th>Porcentaje %</th>
			        </tr>
			    </thead>
			    <tbody>
			            <?php
							$mysqli = new mysqli("localhost", "root", "", "daw", 33060);
								
							if(!$mysqli || $mysqli->connect_errno){
								die("<h2>error connecting to database</h2>");
							}

							$result = $mysqli->query("SELECT destino, COUNT(*) as visitadas, COUNT(*)*100/(SELECT COUNT(*) FROM enlaces) as porcentaje FROM enlaces GROUP BY origen,destino;");

							while($row = $result->fetch_array(MYSQLI_BOTH)){
								echo "<tr>";
								echo "<td>".$row["destino"]."</td> <td>".$row["visitadas"]."</td> <td>".$row["porcentaje"]." %</td>";
								echo "</tr>";
							}
						?>
			    </tbody>
			</table>
		</div>
	</body>
</html>