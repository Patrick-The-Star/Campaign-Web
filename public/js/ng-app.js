(function (){
	'use strict';

	angular.module('myApp',[],function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
			angular.module('myApp')
            .controller('HttpController',httpController);

            httpController.$inject=['$scope','$http'];


            var url = "http://ec2-52-58-134-229.eu-central-1.compute.amazonaws.com/campaignTemp/";
            
            
            function httpController($scope,$http){

                $("#contentForm").hide();
                $("#campaignForm").hide(); 
                
                $scope.campaigns ={};

                $http.get('/getContentJson/1').then(function(response){
                    console.log(response.data);
                    $scope.contents = response.data;
                });

                $scope.getContentJson = function($campaignId){
                    console.log($campaignId);
                    $campaignId = $campaignId || '2';
                    $http.get('/getContentJson/'+$campaignId).then(function(response){
                        $scope.contents = response.data;
                    });

                }



                $scope.putContent = function(){
                    
                    $http.put('/putContent',$scope.content).then(function(response){
                        console.log(response.data);
                        $scope.contents.push(response.data);
                        $("#addCampaign").show();
                        $("#contentForm").hide();
                        $("#addContent").show();
                    });
                }
                
                $(".update").click(function(){
                    var $item = $(this).closest("tr")
                    var str = $item[0].textContent;

                    str = str.replace(/  +/g, '$');
                    console.log(str);
                    var arr = str.trim("$").split("$");
                    arr.shift();arr.pop();
                    console.log(arr);
                    // $.ajax({type: "GET",url: "/ajaxCall",data:{id:arr[0],content_type:arr[1],content:arr[2]},dataType:"text/html",contentType:"json",success:function(result){
                        
                    //     console.log(result);
                    // }});
                        
                    console.log("m here");
                        
                });
                    


                



                
            }
})();