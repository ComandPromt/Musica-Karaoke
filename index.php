<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Lista de canciones</title>
	
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	
	<style type="text/css">
            .row-centered {
                text-align:center;
            }
            .col-centered {
                display:inline-block;
                float:none;
                text-align:left;
                margin-right:-4px;
            }
           
        </style>
	
</head>

<body>

	<div class="container">
	
		<div class="row row-centered">
		
		<div class="col-lg-8 col-centered">
		
			<div style="padding-top:20px;width:95%;margin-left:-5px;">

				<table class="table display AllDataTables">
			
					<thead>
					
						<tr>
							<th>Cantante</th>
							<th>Canción</th>
					
						</tr>
						
					</thead>
					
					<tbody>
					
					<?php
					
						$mysqli = new mysqli('host','user', 'pass', 'bd');
						
						$mysqli->set_charset("utf8");
					
						$consulta = $mysqli->query('SELECT Cantante,Cancion,Genero FROM canciones ORDER BY Cantante,Cancion');
			
						while($fila = $consulta->fetch_row()){
							print '<tr><td>'.$fila[0].'</td>';
							print '<td>'.$fila[1].'</td></tr>';
						}
									
						$mysqli->close();
			
					?>
					
					</tbody>
				
				</table>
			
				<script src="js/jquery-3.2.1.min.js"></script>
				
				<script src="js/bootstrap.min.js"></script>
				
				<script src="js/jquery.dataTables.min.js"></script>
				
				<script src="js/dataTables.bootstrap.min.js"></script>
				
				<script>
				
					$(document).ready( function () {
						
						$('.AllDataTables').DataTable({
							
							language: {
								"sProcessing":     "Procesando...",
								"sLengthMenu":     "Mostrar _MENU_ registros",
								"sZeroRecords":    "No se encontraron resultados",
								"sEmptyTable":     "Ningún dato disponible en esta tabla",
								"sInfo":           "<hr/> _START_ / _END_ || Total: _TOTAL_",
								"sInfoEmpty":      "",
								"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
								"sInfoPostFix":    "",
								"sSearch":         "Buscar:",
								"sUrl":            "",
								"sInfoThousands":  ",",
								"sLoadingRecords": "Cargando...",
								"oPaginate": {
									"sFirst":    "Primero",
									"sLast":     "Último",
									"sNext":     "Siguiente",
									"sPrevious": "Anterior"
								},
								
								"oAria": {
									"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
									"sSortDescending": ": Activar para ordenar la columna de manera descendente"
								}
								
							}
							
						});
						
					} );
					
				</script>
				</div>
			</div>
			
		</div>
		
	</div>
	
</body>

</html>