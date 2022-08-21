<?php

function compress($arquivo, $destino, $qualidade) {

    set_time_limit(0);

    $info = getimagesize($arquivo);
    //echo "<pre>";
    //print_r($novoNome[0]);
    //echo "<br>";
    //die ('Fim do teste');
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($arquivo);
       // $image = imagerotate($image, 90, 0);
    }
    elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($arquivo);
        //$image = imagerotate($image, 90, 0);
}
    imagejpeg($image, $destino, $qualidade);

    return $destino;
}

$arquivo_img = 'arquivo.jpg';
$destino_img = 'destino.jpg';

/*
echo "<pre>";
print_r($destino_img);
echo "<br>";
die ('Fim do teste');
*/
//$d = compress($arquivo_img, $destino_img, 90);

$tipos = array( 'png', 'jpg', 'jpeg', 'gif' );
if ( $handle = opendir('original') ) {
    while ( $entry = readdir( $handle ) ) {
        $ext = strtolower( pathinfo( $entry, PATHINFO_EXTENSION) );
        if( in_array( $ext, $tipos ) ){

			//echo $entry;
            $novoNome = explode ('.' , $entry);

//die ('Fim do teste');
			//$d = compress("./teste/".$entry, "./comprimidas/".$destino_img."_".$i.".".$ext, 90);
            $d = compress("./original/".$entry, "./comprimidas/".$novoNome[0].".".$ext, 90);

            
		}

    }
    closedir($handle);
}

?>
