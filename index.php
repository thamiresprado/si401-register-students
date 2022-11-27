<?php	

		// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
		// 	function get_data() {
		// 		$datae = array();
		// 		$datae[] = array(
		// 			'Nome' => $_POST['nome'],
		// 			'RA' => $_POST['ra'],
		// 			'Idade' => $_POST['idade'],
		// 			'Endereco' => $_POST['endereco'],
		// 			'Telefone' => $_POST['number'],
		// 			'Email' => $_POST['email'],
		// 			'Genero' => $_POST['gender'],
		// 		);
		// 		return json_encode($datae);
		// 	}
			
		// 	$name = "relatorio";
		// 	$file_name = $name . '.json';
		
		// 	(file_put_contents("$file_name", get_data()));
		// }
		

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
					'Genero' => $_POST['gender'],
				);
				$array_data[]=$extra;
				echo "file exist<br/>";
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
					'Genero' => $_POST['gender'],
				);
				echo "file not exist<br/>";
				return json_encode($datae);
			  }
			}
			
			$file_name='RelatorioAlunos'. '.json';
		  
			if(file_put_contents("$file_name", get_data())) {
			  echo 'success';
			}                
			else {
			  echo 'There is some error';             
			}
		  }

	?>