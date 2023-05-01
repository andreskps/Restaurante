<!DOCTYPE html>
<html>

<head>
	<title>Página de Pedidos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/restaurante/assets/estilos.css">
</head>

<body>

<main class="d-flex">

 <?php @include 'C:\xampp\htdocs\Restaurante\views\chef/chef.php' ?>

<div class="container">
		<h1 class="my-4">Lista de Pedidos</h1>
		<table class="table">
			<thead class="bg-primario text-white">
				<tr>
					<th scope="col"># Orden</th>
					<th scope="col">Fecha y hora</th>
					<th scope="col"># Mesa</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Estado</th>
					<th scope="col">Total</th>
					<th scope="col">Cambiar estado</th>
					<th scope="col">Opciones del pedido</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Conexión a la base de datos
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "restaurantebd";
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Comprobar la conexión
				if ($conn->connect_error) {
					die("Conexión fallida: " . $conn->connect_error);
				}

				// Consulta a la base de datos
				//$sql = "SELECT * FROM pedidos";
				$sql = "SELECT p.id, p.fehcaHora, p.mesa, p.estado, p.total, pp.cantidad FROM pedidos p INNER JOIN pedido_producto pp ON p.id = pp.idPedido";
				$result = $conn->query($sql);

				// Mostrar los resultados en una tabla
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {


						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["fehcaHora"] . "</td>";
						echo "<td>" . $row["mesa"] . "</td>";
						echo "<td>" . $row["cantidad"] . "</td>";
						echo "<td>" . $row["estado"] . "</td>";
						echo "<td>" . $row["total"] . "</td>";
						//action='cambiar_estado.php'
						echo "<td><form method='post' action='cambiar_estado.php'>
									<input type='hidden' name='id' value='" . $row["id"] . "'> ";
						if ($row['estado'] == 'CANCELADO') {
							echo "<select id='Actualizar-Select' name='estado' class='form-control' disabled='disabled' >
										<option value='Preparando'>Preparando</option>
										<option value='Listo'>Listo</option>
										<option value='Esperando'>Esperando</option>
								 </select>
									   <input type='submit' id='Actualizar-btn' value='Actualizar' disabled='disabled' class='button-primario bg-primario text-white'>";
						} else {
							echo "<select id='Actualizar-Select' name='estado' class='form-control'>
										<option value='Preparando'>Preparando</option>
										<option value='Listo'>Listo</option>
										<option value='Esperando'>Esperando</option>
								 </select>
									   <input type='submit' id='Actualizar-btn' value='Actualizar' class='button-primario bg-primario text-white'>";
						}

						echo "</form></td>";
						echo "<td>";
						echo "<a href='CancelarPedido.php?id=" . $row["id"] . "' class='btn btn-eliminar btn-danger'>Cancelar</a>";
						echo "<a href='CalcularTotal.php?id=" . $row["id"] . "' class='btn btn-calcular btn-success mx-1'>Precio total</a>";

						echo "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='6'>No hay pedidos en espera</td></tr>";
				}

				// Cerrar la conexión a la base de datos
				$conn->close();
				?>
			</tbody>
		</table>
	</div>

</main>

	<!--<script src="/restaurante/scripts/comprobarEstado.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>