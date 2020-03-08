<?php
	$archivoLogo     = $argv [ 1 ];

	if ( ! file_exists ( $archivoLogo ) ) die ();

	$cmdAnchoLinea   = 'cat ' . $archivoLogo . ' | awk \'{print length, $0}\' | sort -nr | head -1 | cut -d \' \' -f 1';
	$anchoLinea      = (int) str_replace ( PHP_EOL, "", shell_exec ( $cmdAnchoLinea ) );
	$anchoPantalla   = (int) str_replace ( PHP_EOL, "", shell_exec ( 'tput cols' ) );
	$agregarEspacios = ( $anchoPantalla - $anchoLinea ) / 2;
	
	$fn = fopen ( $archivoLogo , "r" );

	echo PHP_EOL;

	$margen = str_repeat ( " ", $agregarEspacios );

	while ( ! feof ( $fn ) )  
	{
		echo  $margen . fgets ( $fn );
	}

	echo PHP_EOL;
?>