<?php
$time1 = microtime(true);
//  $PlotSize/$scale has to be even
function draw_function($PlotSize, $scale){
	$index = 0;
	for($i = 0; $i <= 3.1415; $i+=0.0001){
		$Y[$index] = 4*(cos(5*$i-0.35))*sin($i)*$scale ;
		$X[$index] = 4*(cos(5*$i-0.35))*cos($i)*$scale ;
		$index++;
	}
	$grid = $PlotSize / $scale / 2;
	for($i = 0; $i <= $PlotSize; $i+=$scale){
		if($i == $PlotSize / 2){
			$color = '#BCBCBC';    
		}
		else{
			$color = '#D2D2D2';
		}
		echo "<div style=' position: absolute; left: 5px; top: " . ($i+5) . "px; width: ".$PlotSize."px; height: 1px; background: linear-gradient(to right,  ".$color." 0%,".$color." ".($PlotSize/2-3)."px,#999999 ".($PlotSize/2-3)."px,#999999 ".($PlotSize/2+3)."px,".$color." ".($PlotSize/2+3)."px,".$color." 100%);'></div>
		<div style=' position: absolute; left: " . ($i+5) ."px; top: 5px; width: 1px; height: ".$PlotSize."px; background: linear-gradient(to top,  ".$color." 0%,".$color." ".($PlotSize/2-3)."px,#999999 ".($PlotSize/2-3)."px,#999999 ".($PlotSize/2+3)."px,".$color." ".($PlotSize/2+3)."px,".$color." 100%);'></div>
		<div style=' position: absolute; left:".($i+5)."px; top: 5px; font-size: 8px; color: #444444; padding: ".($PlotSize/2+1)."px 0px 0px 1px; '>".-$grid."</div>
		<div style=' position: absolute; left: 5px; top:".($i+5)."px; font-size: 8px; color: #444444; padding: 1px 0px 0px ".($PlotSize/2+1)."px; '>".$grid."</div>";
		$grid--;
	}
	echo "<div style='position: absolute; left: ".($PlotSize/2+5)."px; top: ".($PlotSize/2+5)."px; width: 1px; height: 1px'>";
	for($array_sol = 0; $array_sol <= count($X)-1; $array_sol++){
		if(is_nan($Y[$array_sol]) || $Y[$array_sol] < -$PlotSize/2 || $Y[$array_sol] > $PlotSize/2 || $X[$array_sol] < -$PlotSize/2 || $X[$array_sol] > $PlotSize/2){
		}
		else{
			echo "<div style='position: absolute; left:" . $X[$array_sol] . "px; top:" . -$Y[$array_sol] . "px; width: 1px; height: 1px; background-color: #555555'></div>";
		}
	}
	echo "</div>";
}
draw_function(500, 50);
$time2 = microtime(true);
echo round(1000*($time2 - $time1), 0) . "ms";