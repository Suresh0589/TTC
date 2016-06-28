<?php 
$app->get('/comment/:aid', function($aid) {
    $response = array();
    $db = new DbHandler();
     $comments = $db->getAllRecord("select * from comments where art_id='$aid' order by comment_id desc");
	 
    if ($comments != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
        
        $rows = array();
		array_push($rows, $comments);
		
        $response['comments'] = $rows;
       
    }else {
            $response['status'] = "error";
            $response['message'] = 'No comments exists';
        }
    echoResponse(200, $response);
});
$app->post('/comment/create/:aid', function($aid) use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    $db = new DbHandler();
    $tabble_name = "comments";
    $column_names = array('art_id', 'name','email','txt');
    $result = $db->insertIntoTable($r->comment, $column_names, $tabble_name);
    if ($result != NULL) {
        $response["status"] = "success";
        $response["message"] = "Comment posted successfully";
        $response["vid"] = $result;
        echoResponse(200, $response);
    } else {
        $response["status"] = "error";
        $response["message"] = "Failed to create comment. Please try again";
        echoResponse(201, $response);
    }            
});
$app->post('/vendor/update', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array( 'name', 'password'),$r->customer);
    require_once 'passwordHash.php';
    $db = new DbHandler();
    $name = $r->customer->name;
    $password = $r->customer->password;
    $isUserExists = $db->getOneRecord("select 1 from user where  name='$name'");
    if(!$isUserExists){
        $r->customer->password = passwordHash::hash($password);
        $tabble_name = "user";
        $column_names = array('name', 'password');
        $result = $db->insertIntoTable($r->customer, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"] = "success";
            $response["message"] = "User account created successfully";
            $response["uid"] = $result;
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['uid'] = $response["uid"];
            $_SESSION['name'] = $name;
            echoResponse(200, $response);
        } else {
            $response["status"] = "error";
            $response["message"] = "Failed to create customer. Please try again";
            echoResponse(201, $response);
        }            
    }else{
        $response["status"] = "error";
        $response["message"] = "An user with the provided phone or email exists!";
        echoResponse(201, $response);
    }
});

?>