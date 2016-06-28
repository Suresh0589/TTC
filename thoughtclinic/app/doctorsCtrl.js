app.controller('doctorsCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    
    var doctorUrl = 'doctors';
    
	
	$scope.doctor = {};
    $scope.doctorList = [];
	
	$scope.doctorLoad = function () {
		
        if ($routeParams.cid) {			
			$scope.getSingledoctor($routeParams.cid).then(function (data) {
				
				$scope.doctor = data;
				$scope.abt_dr = data.doc_abt;
			});
        }
		
    }
	
    $scope.getAlldoctors = function () {
		Data.get(doctorUrl).then(function (results) {           
            $scope.doctorList = results.doctors;
        });
    };
	
	$scope.onView = function (cid) {
		
		$location.path("counsellors/"+cid);
    };
	
	$scope.onMessage = function (cid) {
		
		$location.path("counsellors/message/"+cid);
    };
	
	$scope.onBooking = function (cid,ctype) {
		
		$location.path("counsellors/booking/"+cid+'/'+ctype);
    };
	
	$scope.bookMessageConsulting = function (cid) {
		
		$location.path("checkout/"+cid+"/messaging");
    };
	
	
	
	
	
	$scope.getSingledoctor = function (id) {
		
        return Data.get(doctorUrl + '/' + id).then(function (results) {
            return results.doctors[0];
        });
    }
	

});