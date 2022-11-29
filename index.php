<?php	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			function get_data() {
			  $file_name = 'RelatorioAlunos'. '.json';
			  if(file_exists("$file_name")) {
				$current_data = file_get_contents("$file_name");
				$array_data = json_decode($current_data, true);
				$extra = array(
					'Nome' => $_POST['nome'],
					'RA' => $_POST['ra'],
					'Idade' => $_POST['idade'],
					'Endereco' => $_POST['endereco'],
					'Telefone' => $_POST['number'],
					'Email' => $_POST['email'],
					'Genero' => $_POST['sexo'],
				);
				$array_data[]=$extra;
				//echo "<p>Seu banco de dados já existe.</p><br/>";
				return json_encode($array_data);
			  }
			  else {
				$datae=array();
				$datae[] = array(
					'Nome' => $_POST['nome'],
					'RA' => $_POST['ra'],
					'Idade' => $_POST['idade'],
					'Endereco' => $_POST['endereco'],
					'Telefone' => $_POST['number'],
					'Email' => $_POST['email'],
					'Genero' => $_POST['sexo'],
				);
				//echo "<p>Seu banco de dados ainda não existe. Criaremos pra você!</p><br/>";
				return json_encode($datae);
			  }
			}
			
			$file_name='RelatorioAlunos'. '.json';
		  
			if(file_put_contents("$file_name", get_data())) {
			  echo '<div class ="container-button"><p>Aluno inserido com sucesso! Clique no botão para voltar à tela de cadastro.</p></div>';
			}                
			else {
			  echo 'There is some error';             
			}
		  }
	?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Document</title>

			<link rel="stylesheet" href="styles-relatorio.css">
		</head>
		<body>
			<div class="container-button">
				<a href="index.html"><button class="voltar-button">Voltar para a tela de cadastro</button></a>
			</div>
		
		</body>
		</html>
	