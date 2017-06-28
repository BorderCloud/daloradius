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
		
		<h2 id="Intro"><a href="#" onclick="javascript:toggleShowDiv('helpPage')"><?php echo $l['Intro']['repcoEdit.php'];?>
		: <?php echo $_GET['MAC'];?><h144>+</h144></a></h2>

		<div id="helpPage" style="display:none;visibility:visible" >
			<?php echo $l['helpPage']['repco']; ?>
			<br/>
		</div>
		<br/>	

		<table border='0' class='table1'>
			<thead>
				<tr>
					<th><b>Logs</b></th>					
				</tr>
			</thead>
			<tr>
				<td>
					<div style="min-height:60px;height:60px;overflow:auto;">
						<?php echo shell_exec("iw dev wlp4s0b1 station get ".$_GET["MAC"]); ?>
					</div>
				</td>
			</tr>
		</table>
		
		<br/>
		<table border='0' class='table1'>
			<thead>
				<tr>
					<th><b>Onthology</b></th>					
				</tr>
			</thead>
			<tr>
				<td>
					<div style="min-height:60px;height:60px;overflow:auto;">
						[...]
					</div>
				</td>
			</tr>
		</table>

		<br/>
		<table border='0' class='table1'>
			<thead>
				<tr>
					<th><b>Error / Quarantine</b></th>					
				</tr>
			</thead>
			<tr>
				<td>
					<div style="min-height:60px;height:60px;overflow:auto;">
						[...]
					</div>
				</td>
			</tr>
			<tr>
				<input style="float:right;" type="button" value="Out of quarantine" onclick="if (confirm('Are you sure you want to authorize this object ?')) {/*Save it!*/} else {/* Do nothing!*/}"/>
			</tr>
		</table>
		<br/>
		<input style="float:right;" type="button" value="Back" onclick="window.history.go(-1); return false;"/>
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
