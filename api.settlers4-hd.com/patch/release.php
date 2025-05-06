<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=HD-Patch', 'hd_backend', 'harsefeld1');
    
    $sql = "SELECT * FROM current_branch_versions b
                    WHERE b.Type = :asset AND b.Branch = :branch 
                    OR b.Type = :asset AND b.Branch = 'release' 
                ORDER BY b.Branch='release' ASC;";
    
    parse_str($_SERVER['QUERY_STRING'], $query);
    $variables = ["asset"=>$query["asset"]];
    
    if(array_key_exists("branch", $query) && $query["branch"]!=""){
        $variables += ["branch"=>$query["branch"]];
    }else{
        $variables += ["branch"=>"release"];
    }
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute($variables);
    
    if($stmt->rowCount() == 0){
        throw new Exception();
    }
    
    if($query["command"] == "url")
        echo $stmt->fetch()["URL"];
    else if($query["command"] == "version")
        echo $stmt->fetch()["Version"];
}catch (Exception $e) {
    http_response_code(400);
    stop();
}

//echo "<br/>".$_SERVER['QUERY_STRING'];

//echo "<br/>";

?>