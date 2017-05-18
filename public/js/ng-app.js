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
                
                
                
                $http.get('/campaigns').then(function(response){
                    $scope.campaigns = response.data;
                });
                

                $scope.deleteTask = function($campaign,$idx){

                    $http.delete('/deleteTask/'+$campaign).then(function(response){
                        
                        $scope.campaigns.splice($idx,1);
                    });
                }

                $scope.getContentJson = function($campaignId){
                    
                    $campaignId = $campaignId || '1';

                    $http.get('/getContentJson/'+$campaignId).then(function(response){
                        console.log(response);
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

                $scope.postContent = function($contentType){
                    console.log($contentType);
                    // var $item = $(this).closest("tr");
                    // var str = $item[0].textContent;

                    // str = str.replace(/  +/g, '$');
                    // console.log(str);
                    // var arr = str.trim("$").split("$");
                    // arr.shift();arr.pop();
                    $http.post('/postContent',$scope.content).then(function(response){
                        console.log($scope.content);
                        for(var i=0;i<$scope.contents.length;i++){
                            if($scope.contents[i].id == response.data.id){
                                $scope.contents[i].id = response.data;
                            }
                        }
                    });
                }
                
                
                    


                



                
            }
})();