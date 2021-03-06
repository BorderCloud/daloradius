<?php
/*
 *********************************************************************************************************
 * daloRADIUS - RADIUS Web Platform
 * Copyright (C) 2007 - Liran Tal <liran@enginx.com> All Rights Reserved.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 *********************************************************************************************************
*
 * Authors:	Julie GENEST <https://github.com/Nevenka3>
 *
 *********************************************************************************************************
 */

    include ("library/checklogin.php");
    $operator = $_SESSION['operator_user'];
        
	include_once('library/config_read.php');
    $log = "visited page: ";

    include ("menu-reports-co.php");
?>
		
		<div id="contentnorightbar">
		
		<h2 id="Intro"><a href="#" onclick="javascript:toggleShowDiv('helpPage')"><?php echo $l['Intro']['repco.php'];?>
		<h144>+</h144></a></h2>

		<div id="helpPage" style="display:none;visibility:visible" >
			<?php echo $l['helpPage']['repco']; ?>
			<br/>
		</div>
		<br/>

<?php 

	$result = shell_exec("arp"); //result of the command line
	$tabResult = explode(" ", $result);	//put in an array the result	
	
	$nbColumn = 6;
	$i = 0; // init of $i

	foreach($tabResult as $val){
		if (!empty($val)){
			if(explode("\n", $val)){
				$values = explode("\n", $val);
				for($j=0;$j<sizeof($values);$j++){
					$tabFinal[$i] = $values[$j];
					$i++;
				}
			}else{
				$tabFinal[$i] = $val; //add the value in the new array
				$i++;
			}				
		}
	}
	
	$count = sizeof($tabFinal); //size of the new array
	
?>	
	<table border='0' class='table1'>
		<thead>
			<tr>
<?php
	for($i=0; $i<$nbColumn;$i++){		
		echo "<th>".$tabFinal[$i]."</th>"; //title column of the array
	}
?>
				<!--<th>Status</th>-->
				<th>Show more</th>
			</tr>
		</thead>
<?php
	for($i=$nbColumn; $i<$count; $i++){
		if($i%$nbColumn == 0)
			echo "<tr>"; // new line in the array
		
		if($i%$nbColumn == 2)
			$mac = $tabFinal[$i];

		echo "<td>".$tabFinal[$i]."</td>"; //data of the array

		if($i%$nbColumn==5)
			echo "<td><a href='co-edit.php?MAC=".$mac."'><img src='images/icons/configMaintenance.png'></a></td></tr>"; 	
	}
?>
	</table>
<br/>
<br/>
<?php 
//echo shell_exec("iw dev wlp4s0b1 station dump");

?>

	<br/><br/>

	<i>Examples</i>
	<table border='0' class='table1' align="center">
		<thead>
			<tr>
				<th>IP</th>
				<th>MAC</th>
				<th>Status</th>
				<th>Show more</th>
			</tr>
		</thead>
		<tr>
			<td>10.42.0.64</td>
			<td>5C-30-C5-75-1B-10</td>
			<td><img src="images/icons/userStatusActive.gif"></td>
			<td><a href="co-edit.php?objectIP=Example1"><img src="images/icons/configMaintenance.png"/></a></td>
		</tr>
		<tr>
			<td>10.42.0.70</td>
			<td>7E-30-V4-75-3A-10</td>
			<td><img src="images/icons/userStatusBlue.gif"></td>
			<td><a href="co-edit.php?objectIP=Example2"><img src="images/icons/configMaintenance.png"></a></td>
		</tr>
		<tr>
			<td>10.42.0.10</td>
			<td>4P-30-C8-54-1G-14</td>
			<td><img src="images/icons/userStatusDisabled.gif"></td>
			<td><a href="co-edit.php?objectIP=Example3"><img src="images/icons/configMaintenance.png"></a></td>
		</tr>
	</table>
<?php
	include('include/config/logging.php');
?>
		</div>
		<div id="footer">
<?php
        include 'page-footer.php';
?>

		
		</div>
		
</div>
</div>


</body>
</html>
