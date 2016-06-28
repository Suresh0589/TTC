<?php 
$app->get('/articles/', function() {
    $response = array();
    $db = new DbHandler();
    $articles = $db->getAllRecord("select * from articles order by art_id desc");
    if ($articles != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
		
		for($i=0;$i<count($articles);$i++){
			if($articles[$i]['art_img']==""){
				$articles[$i]['art_img']='art-bg.jpg';
			}
			$articles[$i]['art_time']=date('j M,Y',strtotime($articles[$i]['art_time']));
		}
		
		$response['articles'] = $articles;
         
    }else {
            $response['status'] = "error";
            $response['message'] = 'No Articles to display';
	}
    echoResponse(200, $response);
});
$app->get('/articles/limit/:num', function($num) {
	
    $response = array();
    $db = new DbHandler();
    $articles = $db->getAllRecord("select * from articles order by art_id desc limit $num");
    if ($articles != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
		
		for($i=0;$i<count($articles);$i++){
			if($articles[$i]['art_img']==""){
				$articles[$i]['art_img']='art-bg.jpg';
			}
			$articles[$i]['art_time']=date('j M,Y',strtotime($articles[$i]['art_time']));
		}
		
		$response['articles'] = $articles;
         
    }else {
            $response['status'] = "error";
            $response['message'] = 'No Articles to display';
	}
    echoResponse(200, $response);
});
$app->get('/articles/:aid', function($aid) {
    $response = array();
    $db = new DbHandler();
     $article = $db->getOneRecord("select * from articles where art_id='$aid'");
    if ($article != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
        
        $rows = array();
		array_push($rows, $article);
		if($rows['0']['art_img']==""){
			$rows['0']['art_img']='art-bg.jpg';
		}
		$rows['0']['art_time']=date('j M,Y',strtotime($rows['0']['art_time']));
        $response['articles'] = $rows;
       
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such article exists';
        }
    echoResponse(200, $response);
});
$app->post('/vendor/create', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    $db = new DbHandler();
    $tabble_name = "vendor";
    $column_names = array('fullname', 'specialization','qualification','experience','mobile','email','address','about','availability','tags','profilepic');
    $result = $db->insertIntoTable($r->vendor, $column_names, $tabble_name);
    if ($result != NULL) {
        $response["status"] = "success";
        $response["message"] = "Vendor created successfully";
        $response["vid"] = $result;
        echoResponse(200, $response);
    } else {
        $response["status"] = "error";
        $response["message"] = "Failed to create vendor. Please try again";
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