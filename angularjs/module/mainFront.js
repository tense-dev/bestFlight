var app = angular.module("mainFront", []);
app.directive("owlCarousel", ['$timeout',function($timeout) {
    return {
        restrict: 'E',
        transclude: false,
        link: function (scope) {
            scope.initCarousel = function(element) {
               $timeout(function () { 
                  // provide any default options you want
                    var defaultOptions = {
                    };
                    var customOptions = scope.$eval($(element).attr('data-options'));
                    // combine the two options objects
                    for(var key in customOptions) {
                        defaultOptions[key] = customOptions[key];
                    }
                    // init carousel
                    $(element).owlCarousel(defaultOptions);
               },100);
        };
        }
    };
}]);

app.directive('owlCarouselItem', [function() {
	return {
		restrict: 'A',
		transclude: false,
		link: function(scope, element) {
		  // wait for the last item in the ng-repeat then call init
			if(scope.$last) {
				scope.initCarousel(element.parent());
			}
		}
	};
}]);
const configapp = {baseUrl:'http://localhost/bestFlightVersion/index.php/'}
//const configapp = {baseUrl:'http://devbestflight.com/'}
//const configapp = {baseUrl:'http://devbestflight.com/'}
//const configapp = {baseUrl:'http://devbestflight.com/'}
//const configapp = {baseUrl:'http://devbestflight.com/'}
app.controller('mainctl', ($scope,$http)=> {
    $scope.optionCursor = {
        
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        nav: true,
        loop: true,
        lazyLoad: true,
        navText: [
          '<i class="ti-angle-left"></i>',
          '<i class="ti-angle-right"></i>'
        ],
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          692: {
            items: 1,
            nav: false
          },
          768: {
            items: 2,
            nav: false
  
          },
          991: {
            items: 3,
            nav: true
          }
        }
    }
  $scope.getLtPromotion = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'mainFront/getListPromotion',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         //console.log(datares);
         $scope.ltPromotion = datares;
      }); 
 
  }
  $scope.getLtPromote = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'mainFront/getListPromote',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         console.log(datares);
         $scope.ltPromotion = datares;
      }); 
 
  }
  $scope.getLtlowPrice = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'mainFront/getListLowPriceProgramtour',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         //console.log(datares);
         $scope.ltlowPrice = datares;
      }); 
 
  }
  $scope.getLtSarupByCountry = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'mainFront/getListProgramtourByCountry',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         //console.log(datares);
         $scope.ltsrBCt = datares;
      }); 
 
  }

  $scope.isOdd = (num)=>{ return (num % 2) === 1?false:true;}
  $scope.range = function(min, max, step) {
      step = step || 1;
      var input = [];
      for (var i = min; i <= max; i += step) {
          input.push(i);
      }
      return input;
  };
  $scope.getLtPromotion();
  $scope.getLtSarupByCountry();
  $scope.getLtlowPrice();
  $scope.getLtPromote();

/*   var fd=new FormData();
         fd.append('Model',angular.toJson(data_report));  
         $http({
            method: 'POST',
            data:fd,
            url: config.newcrystalreport+'Reportsale/viewmaintour',
            responseType : 'arraybuffer',
            headers: {'Content-Type': undefined},
            cache: true
             }).then(function successCallback(response) {   
                var file = new Blob([response.data], {type: 'application/pdf'});
                var fileURL = $window.URL.createObjectURL(file);
                load_show.close();
                printJS(fileURL);
            });  */

});




app.controller('mainpgi', ($scope,$http)=> {
$scope.getLtAsiaPass = ()=>{
  $http({
    method: 'GET',
    url: configapp.baseUrl+'packagespass/getLtAsiaPass',
    headers: {'Content-Type': undefined},
     }).then(successCallback = (response)=> {   
       const datares = response.data;
       console.log(datares);
       $scope.ltasiapass = datares;
    }); 

}
$scope.getLtJapan = ()=>{
  $http({
    method: 'GET',
    url: configapp.baseUrl+'packagespass/getLtJapan',
    headers: {'Content-Type': undefined},
     }).then(successCallback = (response)=> {   
       const datares = response.data;
       console.log(datares);
       $scope.ltjapan = datares;
    }); 

}
$scope.getLtAsiaPass();
$scope.getLtJapan();

});




app.controller('mainpgitour', ($scope,$http)=> {

  $scope.getListIndependent1 = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'packagestour/getListIndependent1',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         $scope.lstIndependen1 = datares;
      }); 
  
  }

  $scope.getListIndependent2 = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'packagestour/getListIndependent2',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         $scope.lstIndependen2 = datares;
      }); 
  
  }

  $scope.getListIndependent3 = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'packagestour/getListIndependent3',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         $scope.lstIndependen3 = datares;
      }); 
  

  }
  $scope.getListIndependent4 = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'packagestour/getListIndependent4',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         $scope.lstIndependen4 = datares;
      }); 
  }

  $scope.funcGenPDF = function (msg) {
    $http({
      method: 'POST',
      url: configapp.baseUrl,
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
      }); 
    }

  $scope.getListIndependent1();
  $scope.getListIndependent2();
  $scope.getListIndependent3();
  $scope.getListIndependent4();
  
  });


//////////////////////
