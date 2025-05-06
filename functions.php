<?php

function box($inner, $id){
	echo "<div class=\"s4-box\" id=\"$id\">$inner</div>";
}

function siteHeader(){
	echo "
		<link rel='stylesheet' href='style.css?v=5'>
	
		<link rel='apple-touch-icon' sizes='57x57' href='/apple-icon-57x57.png'>
		<link rel='apple-touch-icon' sizes='60x60' href='/apple-icon-60x60.png'>
		<link rel='apple-touch-icon' sizes='72x72' href='/apple-icon-72x72.png'>
		<link rel='apple-touch-icon' sizes='76x76' href='/apple-icon-76x76.png'>
		<link rel='apple-touch-icon' sizes='114x114' href='/apple-icon-114x114.png'>
		<link rel='apple-touch-icon' sizes='120x120' href='/apple-icon-120x120.png'>
		<link rel='apple-touch-icon' sizes='144x144' href='/apple-icon-144x144.png'>
		<link rel='apple-touch-icon' sizes='152x152' href='/apple-icon-152x152.png'>
		<link rel='apple-touch-icon' sizes='180x180' href='/apple-icon-180x180.png'>
		<link rel='icon' type='image/png' sizes='192x192' href='/android-icon-192x192.png'>
		<link rel='icon' type='image/png' sizes='32x32' href='/favicon-32x32.png'>
		<link rel='icon' type='image/png' sizes='96x96' href='/favicon-96x96.png'>
		<link rel='icon' type='image/png' sizes='16x16' href='/favicon-16x16.png'>
		<link rel='manifest' href='/manifest.json'>
		<meta name='msapplication-TileColor' content='#ffffff'>
		<meta name='msapplication-TileImage' content='/ms-icon-144x144.png'>
		<meta name='theme-color' content='#ffffff'>
	
		<meta name='viewport' content='width=1200px, initial-scale=1.0'>
		<meta charset='UTF-8'>
	
		<title>Settlers 4 HD Patch</title>
	";
}

function getVersion($asset){
	$pdo = new PDO('mysql:host=localhost;dbname=HD-Patch', 'hd_backend', 'harsefeld1');
    
    $sql = "SELECT * FROM current_branch_versions b
                    WHERE b.Type = :asset AND b.Branch = :branch 
                    OR b.Type = :asset AND b.Branch = 'release' 
                ORDER BY b.Branch='release' ASC;";
    
    parse_str($_SERVER['QUERY_STRING'], $query);
    $variables = ["asset"=>$asset];
	$variables += ["branch"=>"release"];
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute($variables);
    
    if($stmt->rowCount() == 0){
        throw new Exception();
    }
    
    return $stmt->fetch()["Version"];
}

?>