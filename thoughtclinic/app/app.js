var site_url =window.location.origin+'/thoughtclinic';
var art_img_url =site_url+'/admin/assets/articles/';
var app = angular.module('myApp', ['ngRoute', 'ngSanitize','ngAnimate','ui.bootstrap', 'toaster','angular.chosen','ngFileUpload']);
app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'partials/login.html',
            controller: 'authCtrl'
        })
		.when('/logout', {
			title: 'Home',
			templateUrl: 'partials/home.php',
			controller: 'authCtrl'
		})
		.when('/signup', {
			title: 'Signup',
			templateUrl: 'partials/signup.php',
			controller: 'authCtrl'
		})
		.when('/signupd', {
			title: 'Signupd',
			templateUrl: 'partials/signupd.php',
			controller: 'authCtrl'
		})
		.when('/search', {
			title: 'Search',
			templateUrl: 'partials/search.php',
			controller: 'authCtrl'
		})
		.when('/aboutus', {
			title: 'Search',
			templateUrl: 'partials/aboutus.php',
			controller: 'authCtrl'
		})
		.when('/privacy', {
			title: 'Search',
			templateUrl: 'partials/privacy.php',
			controller: 'authCtrl'
		})
		.when('/refund', {
			title: 'Search',
			templateUrl: 'partials/refund.php',
			controller: 'authCtrl'
		})
		.when('/articles', {
			title: 'Articles',
			templateUrl: 'partials/articles.php',
			controller: 'articleCtrl'
		})
		.when('/articles/:aid',{
			title:'View',
			templateUrl:'partials/article-view.php',
			controller:'articleCtrl'
		})
		.when('/speciality', {
			title: 'Articles',
			templateUrl: 'partials/specialitys.php',
			controller: 'specialityCtrl'
		})
		.when('/speciality/:aid',{
			title:'View',
			templateUrl:'partials/speciality-view.php',
			controller:'specialityCtrl'
		})
		.when('/counsellors', {
			title: 'Counsellors',
			templateUrl: 'partials/counsellors.php',
			controller: 'doctorsCtrl'
		})
		.when('/messages', {
			title: 'Messages',
			templateUrl: 'partials/messages.php',
			controller: 'consultingCtrl'
		})
		.when('/messages/:mid', {
			title: 'Messages',
			templateUrl: 'partials/message-view.php',
			controller: 'consultingCtrl'
		})
		.when('/sessions', {
			title: 'Sessions',
			templateUrl: 'partials/sessions.php',
			controller: 'consultingCtrl'
		})
		.when('/sessions/:mid', {
			title: 'Sessions',
			templateUrl: 'partials/sessions-view.php',
			controller: 'consultingCtrl'
		})
		.when('/counsellors/:cid', {
			title: 'Counsellors',
			templateUrl: 'partials/counsellors-view.php',
			controller: 'doctorsCtrl'
		})
		.when('/counsellors/message/:cid', {
			title: 'Counsellors',
			templateUrl: 'partials/counsellors-message.php',
			controller: 'consultingCtrl'
		})
		.when('/counsellors/booking/:cid/:ctype', {
			title: 'Counsellors',
			templateUrl: 'partials/counsellors-booking.php',
			controller: 'consultingCtrl'
		})
		.when('/checkout/:did/:ctype', {
			title: 'Checkout',
			templateUrl: 'partials/checkout.php',
			controller: 'checkoutCtrl'
		})
		.when('/response', {
			title: 'Checkout',
			templateUrl: 'partials/response.php',
			controller: 'checkoutCtrl'
		})
		.when('/profile', {
			title: 'Profile',
			templateUrl: 'partials/profile.php',
			controller: 'profileCtrl'
		})
		.when('/profilep', {
			title: 'Profile',
			templateUrl: 'partials/profilep.php',
			controller: 'profileCtrl'
		})
		.when('/', {
			title: 'Home',
			templateUrl: 'partials/home.php',
			controller: 'authCtrl',
			role: '0'
		})
		.otherwise({
			redirectTo: '/'
		});
  }])
    .run(function ($rootScope, $location, Data) {
        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            $rootScope.authenticated = false;
            Data.get('session').then(function (results) {
                if (results.uid) {
                    $rootScope.authenticated = true;
                    $rootScope.uid = results.uid;
                    $rootScope.tcusername = results.name;
                    $rootScope.tcuimg = results.uimg;
                    $rootScope.email = results.email;
                    $rootScope.utype = results.utype;
                    $rootScope.usrtabs = true;
                    $rootScope.logbtns = false;
                    $rootScope.unavstyles ="";					
                    /*$rootScope.unavstyles ="margin-right:200px";					*/
                } else {
                    $rootScope.unavstyles ="";
					$rootScope.usrtabs = false;
                    $rootScope.logbtns = true;
                   /* var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/signup' || nextUrl == '/login') {

                    } else {
                        $location.path("/");
                    }*/
                }
            });
        });
    });
app.run(function($rootScope, $window) {

  $rootScope.$on('$routeChangeSuccess', function () {

    var interval = setInterval(function(){
      if (document.readyState == 'complete') {
        $window.scrollTo(0, 0);
        clearInterval(interval);
      }
    }, 200);

  });
});
app.directive('ckEditor', function () {
  return {
    require: '?ngModel',
    link: function (scope, elm, attr, ngModel) {
      var ck = CKEDITOR.replace(elm[0]);
      if (!ngModel) return;
      ck.on('instanceReady', function () {
        ck.setData(ngModel.$viewValue);
      });
      function updateModel() {
        scope.$apply(function () {
          ngModel.$setViewValue(ck.getData());
        });
      }
      ck.on('change', updateModel);
      ck.on('key', updateModel);
      ck.on('dataReady', updateModel);

      ngModel.$render = function (value) {
        ck.setData(ngModel.$viewValue);
      };
    }
  };
});  	

