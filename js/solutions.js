angular.module('solutions', ['ui.bootstrap','ui.router']);

angular.module('solutions')
	.controller('DomainsController', function($http,$log,$q,$scope){
		$scope.domains = [];
		$http.get('http://dev.oneelevenextras.co.uk/Projects/SolutionsSystem/phpinc/domains.php')
			.success(function(domains){
				$scope.domains = domains;
				$log.debug(domains);
			})
			.error(function(error){
				$log.error(error);
			});
	})
	.controller('DomainController', function($http,$log,$modal,$q,$scope){
		$scope.edit = function(){
			$modal.open({
				'controller': 'DomainEditController',
				'templateUrl': 'views/modals/edit.htm',
				'resolve':{
					'domain': function(){return $scope.domain}
				}
			})
		}
	})
	.controller('DomainEditController', function($log,$modalInstance,$scope,domain){
		$scope.domain = domain;
		$scope.dismiss = function(){
			$modalInstance.dismiss();
		};
		$scope.save = function(){
			// do http.post stuff here
			$http.post('http://example.com', $scope.domain)
				.success(function(){
					$modalInstance.close();
				})
		};
	})