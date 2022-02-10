<?php
// Casilla inicial caballo 1
$x1 = 1;
$y1 = 1;

// Casilla inicial caballo 2
$x2 = 16;
$y2 = 16;

$movimientos = array();

 do{
	    //se mueve el caballo 1	
		do{
			$posicion_c1 = posicionCaballo($x1, $y1);
			
				$c1_x = $posicion_c1['0']; 
				$c1_y = $posicion_c1['1']; 
		
		}while($posicion_c1 == false);
		
			$x1=$c1_x;
			$y1=$c1_y;
			$pieza1 = "Caballo 1";
			$color = colorCasilla($x1, $y1);
			
			$mov_c1 = array("Pieza" => $pieza1, "Color" => $color, "Posicion_X" => $x1,"Posicion_Y" => $y1,);
		
			array_push($movimientos, $mov_c1);
		
		//se mueve el caballo 2	
		do{	
			$posicion_c2 = posicionCaballo($x2, $y2);
			$c2_x = $posicion_c2['0']; 
			$c2_y = $posicion_c2['1'];

		}while($posicion_c2 == false);
		
			$x2=$c2_x;
			$y2=$c2_y;
			$pieza2 = "Caballo 2";
			$color2 = colorCasilla($x2, $y2);
				
			$mov_c2 = array("Pieza" => $pieza2, "Color" => $color2, "Posicion_X" => $x2,"Posicion_Y" => $y2,);
			
			array_push($movimientos, $mov_c2);

		
 }while($posicion_c1 != $posicion_c2);
 
	
//Encode Array
$json = json_encode($movimientos);

echo $json;



function posicionCaballo($x,$y)
{
	$casillas= 16;
	
	//coordenadas de posibles movimientos
	$mov_eje_x = [2, 1, -1, -2, -2, -1, 1, 2];
	$mov_eje_y = [1, 2,  2,  1, -1, -2, -2, -1];
	
    $posible = rand(0,7);
	
	//seleccionamos la posición del caballo
    $p_x = $x + $mov_eje_x[$posible];
	$p_y = $y + $mov_eje_y[$posible]; 

	//validamos que este dentro del tablero
	 if ($p_x > 0 && $p_x <= $casillas && $p_y > 0 && $p_y <= $casillas) { 
	  
		  $x=$p_x;
		  $y=$p_y;
		  
		  return array($x, $y);
	 }
}

function colorCasilla($x,$y)
{
    if($x%2!=0 && $y%2!=0)
        return "blanco";
    return "negro";
	 return false;
}