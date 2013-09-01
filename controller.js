app = angular.module('prices', ['ui.bootstrap']);





function PriceController($scope, $http) { //, Contact) {

    //$scope.delContact = Contact.delContact;
    //Contact.getAll();
   


    getAll = function () {

        $http.get('prices.json.php').success(function (data) {
			console.log(data);
            $scope.prices = data;            
        });

    }

    $scope.getAll = getAll;


	/*setQuantityFromCatalog = function(category, id, qty) {
		prices = $scope.prices;
		prices[category][id].quantity = qty;
		$scope.prices = prices;
	}
	
	$scope.setQuantityFromCatalog = setQuantityFromCatalog;
   
	$scope.quantityFilter = function (item) {
		return item.qauntity > 0;
	};*/

    getAll();
	
	$scope.getTotal = function() {		
		var total = 0;
		function categoTotal(items) {	
			var total = 0;
			for (i = 0; i < items.length ;i++) {
				if (items[i].quantity > 0) {
					total = total + items[i].quantity * items[i].price;
				}
			}
			return total;
		}
		for(var  catego in $scope.prices){
			total = total + categoTotal($scope.prices[catego]);
		}
		return total;
	};
	
	$scope.clearCommand = function() {
		
		function clearCategory(items) {	
			var total = 0;
			for (i = 0; i < items.length ;i++) {
				if (items[i].quantity > 0) {		
					items[i].quantity = '';
				}
			}
			return items;
		}
		for(var  catego in $scope.prices){
			$scope.prices[catego] = clearCategory($scope.prices[catego]);
		}
		
		$scope.prices =$scope.prices;
		
	}
	
	$scope.checkInteger = function(item) {	
		qty = item.quantity+'';		
		console.log('checking quantity ['+item.quantity+'] ');
		
		var intRegex = /^\d+$/;
		if(!intRegex.test(item.quantity)) {
			
			console.log ('['+item.quantity+'] is NOT an integer');
			item.quantity = '';
		}		
		else {
			console.log ('['+item.quantity+'] IS  an integer');
			item.quantity = item.quantity;
		}
		
		if (qty.length > 2) {
			item.quantity = '';
		}		
	}
}



// override the default input to update on blur
app.directive('ngModelOnblur', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, elm, attr, ngModelCtrl) {
            if (attr.type === 'radio' || attr.type === 'checkbox') return;
            
            elm.unbind('input').unbind('keydown').unbind('change');
            elm.bind('blur', function() {
                scope.$apply(function() {
                    ngModelCtrl.$setViewValue(elm.val());
                });         
            });
        }
    };
});


app.filter('quantityFilter', function ( ) {
	
    return function (item) {
		var filtered = new Array();
		for (i = 0; i < item.length ;i++) {
			if (item[i].quantity > 0) {
				filtered.push(item[i]);
			}
		}
        return filtered;
    }
});


app.directive('myCurrentTime', function($timeout, dateFilter) {
    // return the directive link function. (compile function not needed)
    return function(scope, element, attrs) {
      var format,  // date format
          timeoutId; // timeoutId, so that we can cancel the time updates
 
      
 
      // listen on DOM destroy (removal) event, and cancel the next UI update
      // to prevent updating time after the DOM element was removed.
      element.on('$destroy', function() {
        $timeout.cancel(timeoutId);
      });
 
      updateLater(); // kick off the UI update process.
    }
  });
