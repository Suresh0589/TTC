app.controller('profileCtrl', function ($scope,Upload, $timeout, $rootScope, $routeParams, $location, $http, Data) {
    
    var profileUrl = 'profile';
    var doctorUrl = 'doctors';
    var userUrl = 'users';
	$scope.msgs= false;
	$scope.msgd= false;
	
	$scope.profile = {};
    	
	$scope.profileLoad = function () {
		
		Data.get('session').then(function(results) {
			if (results.uid) {
				$rootScope.authenticated = true;							
				if(results.utype=='patient'){
					$scope.getuser(results.uid).then(function(res){
						$scope.profile=res;
					});	
				}else if(results.utype=='doctor'){
					$scope.getSingledoctor(results.uid).then(function(res){
						$scope.profile=res;
						$scope.$watch('profile.msg_con',function(val,old){
						   $scope.profile.msg_con = parseInt(val); 
						});
						$scope.$watch('profile.text_con',function(val,old){
						   $scope.profile.text_con = parseInt(val); 
						});
						$scope.$watch('profile.video_con',function(val,old){
						   $scope.profile.video_con = parseInt(val); 
						});
						$scope.$watch('profile.phone_con',function(val,old){
						   $scope.profile.phone_con = parseInt(val); 
						});
					});
				}
			} else {	
				$location.path("/home");				
			}
			
		});
		
    }
	
	$scope.updateProfileP=function(file){
		if($rootScope.authenticated){
			/*Data.post(doctorUrl+'/update/'+$rootScope.uid,{profile:profile}).then(function (results) {
				return results.doctors[0];
			});*/
			file.upload = Upload.upload({
			  url: 'api/v1/'+userUrl+'/update/'+$rootScope.uid,
			  data: {profile:$scope.profile,file:file},
			}).then(function (results){
					Data.toast(results);
					if (results.status == "success") {
						$scope.msgs= true;
						$scope.reg_msg= results.message;
					}else{
						$scope.msgd= true;
						$scope.reg_msg= results.message;
					}
			});
		}
	}
	
	$scope.updateProfile=function(file){
		if($rootScope.authenticated){
			/*Data.post(doctorUrl+'/update/'+$rootScope.uid,{profile:profile}).then(function (results) {
				return results.doctors[0];
			});*/
			file.upload = Upload.upload({
			  url: 'api/v1/'+doctorUrl+'/update/'+$rootScope.uid,
			  data: {profile:$scope.profile,file:file},
			}).then(function (results){
					Data.toast(results);
					if (results.status == "success") {
						$scope.msgs= true;
						$scope.reg_msg= results.message;
					}else{
						$scope.msgd= true;
						$scope.reg_msg= results.message;
					}
			});
		}
	}
	
	$scope.getSingledoctor = function (id) {
        return Data.get(doctorUrl + '/' + id).then(function (results) {
			return results.doctors[0];
        });
    }
	$scope.getuser = function (id) {
        return Data.get(userUrl + '/' + id).then(function (results) {
			return results.users[0];
        });
    }
	

});