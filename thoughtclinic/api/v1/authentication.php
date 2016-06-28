<?php 
$app->get('/session', function() {
    $db = new DbHandler();
    $session = $db->getSession();
    $response["uid"] = $session['uid'];
    $response["email"] = $session['email'];
    $response["name"] = $session['name'];
    $response["utype"] = $session['utype'];
    $response["uimg"] = $session['uimg'];
    echoResponse(200, $session);
});

$app->post('/login', function() use ($app) {
    require_once 'passwordHash.php';
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'password'),$r->customer);
    $response = array();
    $db = new DbHandler();
    $password = $r->customer->password;
    $email = $r->customer->email;
    $user = $db->getOneRecord("select uid,name,password,email,created,uimg from customers_auth where phone='$email' or email='$email'");
    if ($user != NULL) {
        if(passwordHash::check_password($user['password'],$password)){
        $response['status'] = "success";
        $response['message'] = 'Logged in successfully.';
		if($user['uimg']==""){
			$user['uimg']='admin/assets/users/counsellor.jpg';
		}else{
			$user['uimg']='admin/assets/users/'.$user['uimg'];
			
		}
        $response['name'] = $user['name'];
        $response['uid'] = $user['uid'];
        $response['email'] = $user['email'];
        $response['createdAt'] = $user['created'];
        $response['uimg'] = $user['uimg'];
        $response['utype'] = 'patient';
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['uid'] = $user['uid'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user['name'];
        $_SESSION['uimg'] = $user['uimg'];
        $_SESSION['utype'] = 'patient';
        } else {
            $response['status'] = "error";
            $response['message'] = 'Login failed. Incorrect credentials';
        }
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such user is registered';
        }
    echoResponse(200, $response);
});
$app->post('/signUp', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'name', 'password'),$r->customer);
    require_once 'passwordHash.php';
    $db = new DbHandler();
    /*$phone = $r->customer->phone;
    $address = $r->customer->address;*/
    $name = $r->customer->name;
    $email = $r->customer->email;
    $password = $r->customer->password;
	
    $isUserExists = $db->getOneRecord("select 1 from customers_auth where  email='$email'");
    if(!$isUserExists){
        $r->customer->password = passwordHash::hash($password);
        $tabble_name = "customers_auth";
        $column_names = array('phone', 'name', 'email', 'password', 'city', 'address');
        $result = $db->insertIntoTable($r->customer, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"] = "success";
            $response["message"] = "User account created successfully";
            $response["uid"] = $result;
            $response["utype"] = 'patient';
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['uid'] = $response["uid"];
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['utype'] = 'patient';
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

$app->post('/signUpd', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('doc_email', 'doc_name', 'doc_pass'),$r->customer);
    /*require_once 'passwordHash.php';*/
    $db = new DbHandler();
    /*$phone = $r->customer->phone;
    $address = $r->customer->address;*/
    $name = $r->customer->doc_name;
    $email = $r->customer->doc_email;
    $password = $r->customer->doc_pass;
	
    $isUserExists = $db->getOneRecord("select 1 from doctors where  doc_email='$email'");
    if(!$isUserExists){
        /*$r->customer->password = passwordHash::hash($password);*/
        $tabble_name = "doctors";
        $column_names = array('doc_email', 'doc_name', 'doc_pass');
        $result = $db->insertIntoTable($r->customer, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"] = "success";
            $response["message"] = "Counsellor account created successfully";
            $response["uid"] = $result;
            $response["utype"] = 'doctor';
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['uid'] = $response["uid"];
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['utype'] = 'doctor';
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
$app->post('/logind', function() use ($app) {
    /*require_once 'passwordHash.php';*/
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'password'),$r->customer);
    $response = array();
    $db = new DbHandler();
    $password = $r->customer->password;
    $email = $r->customer->email;
    $user = $db->getOneRecord("select doc_id,doc_img,doc_name,doc_pass,doc_email,doc_time from doctors where doc_email='$email'");
    if ($user != NULL) {
        /*if(passwordHash::check_password($user['password'],$password)){*/
        if(md5($user['doc_pass'])==md5($password)){
		if($user['doc_img']==""){
			$user['doc_img']='admin/assets/doctors/counsellor.jpg';
		}else{
			$user['doc_img']='admin/assets/doctors/'.$user['doc_img'];
			
		}	
        $response['status'] = "success";
        $response['message'] = 'Logged in successfully.';
        $response['name'] = $user['doc_name'];
        $response['uid'] = $user['doc_id'];
        $response['email'] = $user['doc_email'];
        $response['uimg'] = $user['doc_img'];
        $response['createdAt'] = $user['doc_time'];
        $response['utype'] = 'doctor';
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['uid'] = $user['doc_id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user['doc_name'];
        $_SESSION['uimg'] = $user['doc_img'];
        $_SESSION['utype'] = 'doctor';
        } else {
            $response['status'] = "error";
            $response['message'] = 'Login failed. Incorrect credentials';
        }
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such user is registered';
        }
    echoResponse(200, $response);
});

$app->post('/subscribe', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email'),$r->sub);
    $db = new DbHandler();
    $email = $r->sub->email;
    $isUserExists = $db->getOneRecord("select 1 from subscribe where email='$email'");
    if(!$isUserExists){
        $tabble_name = "subscribe";
        $column_names = array('email');
        $result = $db->insertIntoTable($r->sub, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"] = "success";
            $response["message"] = "You Have Subscribed successfully";
            echoResponse(200, $response);
        } else {
            $response["status"] = "error";
            $response["message"] = "Failed to Subscribe. Please try again";
            echoResponse(201, $response);
        }            
    }else{
        $response["status"] = "error";
        $response["message"] = "You Have Subscribed Already";
        echoResponse(201, $response);
    }
});

$app->get('/logout', function() {
    $db = new DbHandler();
    $session = $db->destroySession();
    $response["status"] = "info";
    $response["message"] = "Logged out successfully";
    echoResponse(200, $response);
});
?>