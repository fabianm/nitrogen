<?php

 /*
 *   Copyright (C) 2010 Faab234 (FaabDesign)
 *
 *   This program is free software: you can redistribute it and/or modify
 * 	 it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 */


	function __loadAdminFunction() {
	if (isset($_GET['page']) == "") { 
	$result = mysql_query("SELECT * FROM usergroup ORDER BY id LIMIT 0, 20");
	} else {
		if ($_GET['page'] == 0) {
		$result = mysql_query("SELECT * FROM usergroup ORDER BY id LIMIT 0, 20");
		} else {
				$x = $_GET['page'] * 20;
		$y = $_GET['page'] * 40;
		$result = mysql_query("SELECT * FROM usergroup ORDER BY id LIMIT ".$x.", ".$y." ");
		}
	}
	
		echo '
		<table border="0" width="100%" cellspacing="1"  cellpadding="5" style="margin-top: 1px; background: url(images/menu_bg.gif) black; Color: white; Border: 1px solid #ccc; font-weight: bold;">
		<tbody><tr>';
		
				echo '
				
				<td class="windowbg2">
					<span class="smalltext">Usergroupid</span>


				</td>
				<td class="windowbg" valign="middle" align="center" style="width: 17%"><span class="smalltext">Name</span></td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">UT changeable</span>
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">Usertitle</span>
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">Html before</span>
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">Html after</span>
				</td>
			</tr>
			<tr>
	
		</tbody>
		</table>

		'; 
	while ($row = mysql_fetch_array($result)) {
		
	
		echo '
	<table border="0" width="100%" cellspacing="1"  cellpadding="5" style="margin-top: 1px; background: #E2F4FF;">
		<tbody><tr>';
		
				echo '
				
				<td class="windowbg2">
					'.$row['id'].'

				</td>
				<td class="windowbg" valign="middle" align="center" style="width: 17%;"><span class="smalltext">
					'.$row['name'].' - (<a href="http://'.scriptUrl.'/admin.php?p=usergroupsettings&id='.$row['id'].'">Modify</a>)
					
				</span></td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">
							'.$row['usertitlechange'].'
					</span>
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">
							'.$row['usertitle'].'
					</span>
				
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">
							'.htmlspecialchars($row['htmlbefore'], ENT_QUOTES).'
					</span>
					
				</td>
				<td class="windowbg2" valign="middle" width="17%">
					<span class="smalltext">
							'.htmlspecialchars($row['htmlafter'], ENT_QUOTES).'
					</span>
				</td>
			</tr>
			<tr>
	
		</tbody>
		</table>
';
		

		
	}
		$result2 = mysql_query("SELECT * FROM usergroup");
	  $results = mysql_num_rows($result2);
	  $pages = ceil($results /20);
	  if (!isset($_GET['page'])) {
	  $page = 0;
	  } else {
		$page = $_GET['page'];
	  }
	   if($page > 0) {
      
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($page-1).'"><<</a>]';
  }
  else{
      
      echo '[<<]';
  }
  
	for($i = 1; $i <= $pages; $i++)    {
		if (!isset($_GET['page'])) {
			$a = 0;
			
		} else {
			
			$a = $_GET['page'];
		}
		if (!($i - 1) == $a) {
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($i-1).'">'.$i.'</a>]';
	} else {
		 echo '['.$i.']';
	}
    } 
	
	
  if(($page+1) <= ($results/20)) {
      
      echo '[<a href="'.$_SERVER['PHP_SELF'].'?page='.($page+1).'">>></a>]';
  }
  else{
      
      echo '[>>]';
  }
	
	
	
  
} 


?>