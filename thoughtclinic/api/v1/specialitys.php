<?php 
$app->get('/specialitys/', function() {
    $response = array();
    $db = new DbHandler();
    $specialitys = $db->getAllRecord("select * from specialitys order by spe_id desc");
    if ($specialitys != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
		
		for($i=0;$i<count($specialitys);$i++){
			if($specialitys[$i]['spe_img']==""){
				$specialitys[$i]['spe_img']='art-bg.jpg';
			}
			$specialitys[$i]['spe_time']=date('j M,Y',strtotime($specialitys[$i]['spe_time']));
		}
		
		$response['specialitys'] = $specialitys;
         
    }else {
            $response['status'] = "error";
            $response['message'] = 'No specialities to display';
	}
    echoResponse(200, $response);
});
$app->get('/specialitys/limit/:num', function($num) {
	
    $response = array();
    $db = new DbHandler();
    $specialitys = $db->getAllRecord("select * from specialitys order by spe_id desc limit $num");
    if ($specialitys != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
		
		for($i=0;$i<count($specialitys);$i++){
			if($specialitys[$i]['spe_img']==""){
				$specialitys[$i]['spe_img']='art-bg.jpg';
			}
			$specialitys[$i]['spe_time']=date('j M,Y',strtotime($specialitys[$i]['spe_time']));
		}
		
		$response['specialitys'] = $specialitys;
         
    }else {
            $response['status'] = "error";
            $response['message'] = 'No specialities to display';
	}
    echoResponse(200, $response);
});
$app->get('/specialitys/:aid', function($aid) {
    $response = array();
    $db = new DbHandler();
     $speciality = $db->getOneRecord("select * from specialitys where spe_id='$aid'");
    if ($speciality != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
        
        $rows = array();
		array_push($rows, $speciality);
		if($rows['0']['spe_img']==""){
			$rows['0']['spe_img']='art-bg.jpg';
		}
		$rows['0']['spe_time']=date('j M,Y',strtotime($rows['0']['spe_time']));
        $response['specialitys'] = $rows;
       
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such speciality exists';
        }
    echoResponse(200, $response);
});

?>