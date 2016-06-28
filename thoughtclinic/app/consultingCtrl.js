app.controller('consultingCtrl', function($scope,Upload, $timeout, $rootScope, $routeParams, $location, $http, Data){
	
    var sessionsUrl = 'sessions';
    var messageUrl = 'messages';
    var doctorUrl = 'doctors';
	
	$scope.doctor = {};
	$scope.message = {};
	$scope.session = {};
	$scope.msgrply = {};
	$scope.booking = {};
	$scope.sessionsList = [];
	$scope.messageList = [];
	$scope.repliesList = [];
	$scope.slotsList = [];
	$scope.msgs= false;
	$scope.msgd= false;
	$scope.selectedDate='';
	
	    	
	/*Calander*/
	var fifteenDays = new Date();
	fifteenDays.setDate(fifteenDays.getDate() + 7);
	$scope.options = {
		minDate: new Date(),
		maxDate:fifteenDays
	};
	$scope.getDate = function(dt){
		var date = new Date(dt);
		var sdate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
		var parastring = $routeParams.cid+'_'+sdate;
		
		Data.get(doctorUrl+'/slots/'+parastring).then(function(result){
			
			if(result.status=='success'){
				$scope.selectedDate = sdate;
				$scope.slotsList=result.slots;				
				$scope.msgd= false;
			}else{
				$scope.slotsList=[];				
				$scope.msgd= true;
				$scope.reg_msg= result.message;
			}
		});
	}
	$scope.selectSlot=function(selectedDate,slot){
		
		$scope.booking={did:$routeParams.cid,ctype:$routeParams.ctype,date:selectedDate,slot:slot,name:$rootScope.tcusername,email:$rootScope.email};
	}
	$scope.bookMessageConsulting = function (cid) {
		
		$location.path("checkout/"+cid+"/messaging");
    };
	$scope.bookapt=function(booking){
		Data.post('booking/create',{booking:$scope.booking}).then(function (results) {
			Data.toast(results);
			if (results.status == "success") {
				$ctypestring = $scope.booking.ctype+'_'+$scope.booking.date+'_'+$scope.booking.slot+'_'+results.slot_id;
				$location.path("checkout/"+$routeParams.cid+"/"+$ctypestring);
				$scope.booking={date:'',slot:'',mobile:'',reason:''};
			}else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
		});
	}
	$scope.doctorLoad = function () {		
		
		Data.get('session').then(function(results) {
			if (results.uid){
				if(results.utype!='patient'){
					$location.path("/home");				
				}else{
					$rootScope.authenticated = true;							
					if ($routeParams.cid) {			
						$scope.booking.ctype = $routeParams.ctype;
						$scope.getSingledoctor($routeParams.cid).then(function (data) {
							$scope.doctor = data;
						});
					}
				}
			}else{	
				$location.path("/signup");				
			}
		});		
    }
	$scope.sessionsLoad = function () {		
		Data.get('session').then(function(results) {
			if (results.uid){
				if(results.utype=='doctor'){
					$scope.docth=false;
					$scope.doctd=false;
				}
				$rootScope.authenticated = true;							
				Data.get(sessionsUrl).then(function (results) {           
					$scope.sessionsList = results.sessions;
				});
			} else {	
				$location.path("/home");				
			}
		});		
    }
	$scope.doViewS = function(mid){
		$location.path("sessions/"+mid);
	}
	
	$scope.loadSession = function(){
		if($routeParams.mid){
			Data.get(sessionsUrl + '/' +$routeParams.mid).then(function (results) {
				$scope.session = results.sessions[0];
			});	
			
		}
	}
	
	$scope.messagesLoad = function () {		
		Data.get('session').then(function(results) {
			if (results.uid){
				$rootScope.authenticated = true;							
				Data.get(messageUrl).then(function (results) {           
					$scope.messageList = results.messages;
				});
			} else {	
				$location.path("/home");				
			}
		});		
    }
	
	$scope.message = {subject:'',txt:''};
	$scope.sendMessage=function(did){
		Data.post(messageUrl+'/create/'+did,{message:$scope.message}).then(function (results) {
			Data.toast(results);
			if (results.status == "success") {
				$scope.message = {subject:'',txt:''};
                $scope.reg_msg= results.message;
				$scope.msgs= true;
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
		});
	}
	
	$scope.doReply = function(mid){
		$location.path("messages/"+mid);
	}
		
	$scope.msgrply={reply:''};
	$scope.loadMessage = function(){
		if($routeParams.mid){
			Data.get(messageUrl + '/' +$routeParams.mid).then(function (results) {
				$scope.message = results.message[0];
			});	
			
			$scope.getAllReplies($routeParams.mid).then(function (data) {
				$scope.repliesList = data;
			});
		}
	}
	$scope.getAllReplies = function(x){
		return Data.get('replies/'+x).then(function (results) {           
			return results.replies;
		});		
	}
	$scope.reply = function (x) {			
        Data.post(messageUrl+'/reply/'+x,{msgrply: $scope.msgrply}).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
				$scope.getAllReplies(x).then(function (data) {
					$scope.repliesList = data;
				});
				$scope.msgrply={reply:''};
                $scope.msgs= true;
				$scope.reg_msg= results.message;
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
		
	$scope.getSingledoctor = function (id) {
		
        return Data.get(doctorUrl + '/' + id).then(function (results) {
            return results.doctors[0];
        });
    }
	
	  

});