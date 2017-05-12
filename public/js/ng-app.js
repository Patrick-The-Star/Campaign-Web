(function (){
	'use strict';

	angular.module('myApp',[]);
			angular.module('myApp')
            .controller('HttpController',httpController);

            httpController.$inject=['$scope','$http'];


            
            var obj = {id:6,content_type:'please work',content:'dont hail angular'};
            
            function httpController($scope,$http){

                
                 
            	$("#contentForm").hide();
                $("#campaignForm").hide(); 
                function call(){
                    console.log(obj);
                    
                }

                $scope.putOrder = function(){
                    console.log("hello");
                    $http.put('/ajaxCall',obj).then(function(response){
                    console.log(response);
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
                        call();
                    });
                    


                



                
            }
})();