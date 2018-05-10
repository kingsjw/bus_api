<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>버스 정보</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/angular.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
  <div class="container" ng-app="myApp" ng-controller="blog">
    <form>
        <input type="text" class="form-control" ng-model="sch" placeholder="버스 아이디...">
        <button type="submit" name="button" class="btn btn-primary btn-lg btn-block" ng-click="getdata(sch)">불러</button>
    </form>
    <table class="table" ng-if="posts.msgHeader.headerCd == 0">
        <tr class="active">
            <td>역 이름</td>
            <td>첫 차 언제?</td>
            <td>향하는 역</td>
            <td>지금 오는 버스 언제 오나~</td>
            <td>다음 오는 버스 언제 오나~</td>
        </tr>
        <tr ng-if="posts.msgBody.itemList.length == undefined">
            <td>{{posts.msgBody.itemList.stNm}}</td>
            <td>{{posts.msgBody.itemList.firstTm}}</td>
            <td>{{posts.msgBody.itemList.adirection}}</td>
            <td>{{posts.msgBody.itemList.arrmsgSec1}}</td>
            <td>{{posts.msgBody.itemList.arrmsgSec2}}</td>
        </tr>
        <tr ng-repeat="x in posts" ng-if="posts.msgBody.itemList.length > 1">
            <td>{{posts.msgBody.itemList[$index].stNm}}</td>
            <td>{{posts.msgBody.itemList[$index].firstTm}}</td>
            <td>{{posts.msgBody.itemList[$index].adirection}}</td>
            <td>{{posts.msgBody.itemList[$index].arrmsgSec1}}</td>
            <td>{{posts.msgBody.itemList[$index].arrmsgSec2}}</td>
        </tr>
    </table>
    <div class="not_info" ng-if="ch==false">
      검색하신 번호에 버스 정보가 없습니다.
    </div>
  </div>
  <script>
      var app = angular.module('myApp',[]);
      app.controller("blog",function($scope,$http){
          $scope.getdata = function(sch){
            console.log(sch);
              $http.get("data.php?sch="+$scope.sch).then(function(json){
                      $scope.posts = json.data;
                      $scope.ch = true;
                      if($scope.posts.msgHeader.headerCd != 0){
                        $scope.ch = false;
                      }
                      console.log($scope.posts);
              });
          }

      });
  </script>
</body>
</html>
