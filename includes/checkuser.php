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
	if (isset( $_SESSION['SESS_MEMBER_ID'])) {
	$userbanresult = mysql_query("SELECT * FROM users WHERE id='". $_SESSION['SESS_MEMBER_ID']."'");

	$userbanrow = mysql_fetch_array($userbanresult);
	
	if ($userbanrow['usergroupid'] == 0) {
	loadTemplate('misc');
	main_above('Error');

	/*
	 * Content Area
	 */ 
	echo '
	<div class="container"> 
	<div id="content">
	
		<div class="article" style="margin-left:auto;
	margin-right: auto;">
	<div class="article-header">Error</div>
	<div class="article-content">You can\'t view the forums while you\'re banned</div>
	</div>
	';
main_below();

		exit();	
	}

	}
?>