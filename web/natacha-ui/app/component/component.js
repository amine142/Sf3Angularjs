/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




angular.module('app.dashboard').component('menu', {
  templateUrl: 'dashboard/layout/menu.html',
  controller: function MyMenuController(Menu,$scope) {
     
       Menu.getAll().then(function (result) {
        $scope.menus =  result.data;
     
      }, function (error) {
        console.log('error', error);
      });
      
      $scope.setActif = function(item){
          var navbars = $(".navbar-brand");
        navbars.each(function(){
           
           if ($(this).text() !== item.href ){ 
             angular.element($(".navbar-brand")).removeClass("actif");
            }
        });
         item.actif = 'actif';
      }
      
  }
});

