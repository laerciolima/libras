<?php


class IOUtils{


	private $image;
	private $path;
	private $name_image;




	public function processImage($image, $path, $width, $height, $size){
		$error = [];

		if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $image["type"])){
			$error[1] = "Isso não é uma imagem.";

		}

                // Pega as dimensões da imagem
		$dimensoes = getimagesize($image["tmp_name"]);

                // Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $width) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$width." pixels";

		}

                // Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $height) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$height." pixels";
		}

                // Verifica se o tamanho da imagem é maior que o tamanho permitido

		if($image["size"] > $size) {
			$error[4] = "A imagem deve ter no máximo ".$size." bytes";
		}

                // Se não houver nenhum erro

		if (count($error) == 0) {
                    // Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image["name"], $ext);

                    // Gera um nome único para a imagem
			$name_image = md5(uniqid(time())) . "." . $ext[1];

                    // Caminho de onde ficará a imagem
			$path .= $nome_imagem;
			
		}

		return $error;

	}



	function saveImage(){
		move_uploaded_file($image["tmp_name"], $path);

		return $name_image;
	}



	public function static unlink($file){
		unlink($path);
	}
}

?>