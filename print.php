<?php
	$archivoLogo     = $argv [ 1 ];

	$cmdAnchoLinea   = 'cat ' . $archivoLogo . ' | awk \'{print length, $0}\' | sort -nr | head -1 | cut -d \' \' -f 1';
	$anchoLinea      = (int) str_replace ( "\n", "", shell_exec ( $cmdAnchoLinea ) );
	$anchoPantalla   = (int) str_replace ( "\n", "", shell_exec ( 'tput cols' ) );
	$agregarEspacios = ( $anchoPantalla - $anchoLinea ) / 2;
	

	echo "\n";

	$fn = fopen ( $archivoLogo , "r" );

	while ( ! feof ( $fn ) )  
	{
		echo str_repeat ( " ", $agregarEspacios ) . fgets ( $fn );
	}

	echo "\n";
?>