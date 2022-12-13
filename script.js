var app = angular.module('myapp', [])

app.controller('mycontroller', function ($scope, $http) {

    $scope.authButtonSubmit = function () {
        if (typeof $scope.username === 'undefined' && typeof $scope.password === 'undefined') {
            if (typeof $scope.username === 'undefined') {
                document.getElementById("span-username").hidden = false;
            }else{
                document.getElementById("span-username").hidden = true;
            } 
            if (typeof $scope.password === 'undefined') {
                document.getElementById("span-password").hidden = false;
            }else{
                document.getElementById("span-username").hidden = true;
            }
        }else{
            $http.post('authentication.php',{
                "uname":$scope.username,
                "psw":$scope.password
            }).success(function(){
				window.location.href='index.html';
            }).error(function(){
                alert('Login failed. Invalid username or password.');
				window.location.href='login.html';
            })
        }
    }

    $scope.loadTable = function() {
        $http.get('select.php').success(function(data) {
            $scope.JSONValues = data;
        })
    }

    $scope.insert = function() {

        console.log("1")
        if ($scope.produs == null) {
            alert('Enter Name')
            return;
        } else if ($scope.client == null) {
            alert('Enter Phone')
            return;
        } else if ($scope.semn == null) {
            alert('Enter Status')
            return;
        }
        $http.post('insert.php', {
            'produs': $scope.produs,
            'client': $scope.client,
            'cantitate': $scope.cantitate,
            'semn': $scope.semn,
            'cod': $scope.cod
        }).success(function(data) {
            alert('Inserted succesful!');
            window.location.href='index.html';
        })
    }

    $scope.delete = function(id) {
        $http.post('delete.php').success(function() {
            if (confirm('Are You Sure, You Want to Delete')) {
                $http.post('delete.php', { 'send_id': id }).success(function(data) {

                    $scope.loadTable();
                })
            } else {
                false;
            }
        })
    }

    
})
