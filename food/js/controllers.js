var App = angular.module('module', []);

App.config(function ($routeProvider, $locationProvider){

  	$locationProvider.html5Mode(false);

    $routeProvider.
    // when('', {templateUrl: '/food/partials/auth.html', controller: 'authCtrl'}).
    // when('/', {templateUrl: '/food/partials/auth.html', controller: 'authCtrl'}).
    when('/index.html', {templateUrl: '/food/partials/auth.html', controller: 'authCtrl'}).
    when('/', {templateUrl: '/food/partials/auth.html', controller: 'authCtrl'}).
    when('/:login', {templateUrl: '/food/partials/user.html', controller: 'userCtrl'})





});

function authCtrl($scope, $http){

	$scope.doAuthRequest = function(){


		$http.post('/login/', { "login": $scope.user.login, "password": $scope.user.password }).success(function(response)
  		{
    		alert(response);
  		});

	}


	$scope.getInfo = function(){
		$http.get('/user').success(function(response)
  		{
  			alert(response);
  		});
	}

}

function userCtrl($scope, $routeParams){
    $scope.login = $routeParams.login;
}

 

