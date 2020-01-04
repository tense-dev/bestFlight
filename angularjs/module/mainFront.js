var app = angular.module("mainFront", []);
app.directive("owlCarousel", ()=> {
    return {
        restrict: 'E',
        transclude: false,
        link:  (scope)=> {
            scope.initCarousel = (element)=> {
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
            };
        }
    };
});
app.directive('owlCarouselItem', [()=> {
    return {
        restrict: 'A',
        transclude: false,
        link: (scope, element)=> {
          // wait for the last item in the ng-repeat then call init
            if(scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
}]);
const configapp = {baseUrl:'http://localhost/bestFlightVersion/index.php/'}
app.controller('mainctl', ($scope,$http)=> {
  $scope.getLtPromotion = ()=>{
    $http({
      method: 'GET',
      url: configapp.baseUrl+'mainFront/getListPromotion',
      headers: {'Content-Type': undefined},
       }).then(successCallback = (response)=> {   
         const datares = response.data;
         console.log(datares);
         $scope.ltPromotion = datares;
      }); 
 
  }
  $scope.range = function(min, max, step) {
      step = step || 1;
      var input = [];
      for (var i = min; i <= max; i += step) {
          input.push(i);
      }
      return input;
  };
  $scope.getLtPromotion();
  
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



//////////////////////
