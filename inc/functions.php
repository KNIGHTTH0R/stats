<?php

// show the content
function fetch_page() {
	switch($GLOBALS['url1']) {
		case "home" :
			$page = "home.php";
			$GLOBALS['pagetitle'] = "Home - ";
			break;
		case "login" :
			$page = "login.php";
			$GLOBALS['pagetitle'] = "Login - ";
			break;
		default:
			$page = "home.php";
			$GLOBALS['pagetitle'] = "";
			break;
	}
	
	return $page;	
}


// clean input
function sanitize($term) {
	$term = str_ireplace("<script>","",$term);
	$term = str_ireplace("<script","",$term);
	$term = str_ireplace("</script>","",$term);
	$term = str_ireplace("javascript","",$term);
	$term = str_ireplace(".php","",$term);
	$term = str_ireplace("href","",$term);
	$term = str_ireplace("etc/passwd","",$term);
	$term = str_ireplace("passwd","",$term);
	$term = str_ireplace("iframe","",$term);
	$term = str_ireplace("../","",$term);
	$term = str_ireplace("response.write","",$term);
	$term = str_ireplace("print","",$term);
	$term = str_ireplace("md5","",$term);
	$term = str_ireplace("response.","",$term);
	$term = preg_replace('/[^A-Za-z0-9\-_@. ]/', '', $term); // Removes special chars.
	return $term;
}

// Generic redirect
function redirect($location) {
	header("Location: {$location}");
}


// Error Box Display (for ajax)
function status_box() {
	?>
    <div class="row" id="StatusDisplay">
    	 <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-exclamation-triangle fa-fw"></i> Status
                    <div class="pull-right"></div>
                </div>
                                    
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">
                        	<div id="statusbox"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}



?>