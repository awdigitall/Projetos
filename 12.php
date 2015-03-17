<meta charset="utf-8">
<?php 
	
	/*UPLOAD DE IMAGENS*/
	if(isset($_POST['send'])){
		$arq = $_FILES['arq'];
		$permissao = array('image/jpeg', 'image/jpeg','image/jpg', 'image/pjpeg','image/png','text/plain');
		$ext = $arq['type'] == 'text/plain' ? '.txt' : ($arq['type'] == 'image/png' ? '.png' : '.jpg');
		$size = 1024*1024*2;

		if($arq['size'] > $size){
			echo 'Permitido somente até 2mb!';
		}elseif(!in_array($arq['type'], $permissao)){
			echo 'Aceito somente imagens e arquivos .txt';
		}else{
			$nome = md5(time()).$ext;
			$pasta = $ext == '.txt' ? 'uploads/arquivos' : 'uploads/imagens';
				if(move_uploaded_file($arq['tmp_name'], $pasta.'/'.$nome)){
					echo 'Arquivo enviado com sucesso!';
				}else{
					echo 'Falha ao enviar o arquivo!';
				}
		}
		var_dump($arq);
	}
?>

<form name= "form" action="" method="post" enctype="multipart/form-data">
	<label for="arq">
		<span>Arquivo:</span>
		<input type="file" name="arq">
	</label>
		<input type="submit" value="Upload" name="send">

</form>


