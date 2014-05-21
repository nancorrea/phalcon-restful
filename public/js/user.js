/*
 * upgrade study 
 * 
 * 
 *var userModule = angular.module('myApp',[]);
	
	userModule.service('crudService', function( $rootScope, $http ) {
	    
	    this.list = function( apiUri ) {
	        return $http.get(apiUri);
	    }
	    
	    this.save = function(obj, apiUri) {
	        post = $http({
	           method: 'POST',
	           url: apiUri,
	           data: $.param(obj)
	        });
	        post.success(function ( response ) 
	        {
	            $rootScope.message = response.message;
	            if( response.status != 'success' ) {
	                $rootScope.result = false;
	            }
	        });
	        return $rootScope.result !== false ? post : false; 
	    }
	});
	
	userModule.controller('userController', function( $rootScope, $scope, $http, crudService ) {
	    
	    $scope.apiUri = '/api/crud/user';
	    $scope.users = [{}];
	    
	    $scope.list = function() 
	    {
            crudService.list($scope.apiUri).then(function ( response ) {
                $scope.users = response.data
            });
	    }
	    
	    $scope.postForm = function() 
	    {
	        if( save = crudService.save($scope.newUser, $scope.apiUri) ) {
	            save.then(function ( response ) {

                    $rootScope.response = response;
                   
                    if ( ! $scope.users instanceof Array ) this.list();                    
                    $scope.users.push(response.data.data[0]);
                });
	        }
	    }
});*/