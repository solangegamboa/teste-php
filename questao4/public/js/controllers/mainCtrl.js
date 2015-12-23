angular.module('mainCtrl', ['ui.filters','ui.sortable'])
    .controller('mainController', function($scope, $http, Tarefa) {
        $scope.tarefaData = {};
        $scope.predicate = 'prioridade';
        $scope.loading = true;
        $scope.edit = false;

        Tarefa.get()
            .success(function(data) {
                $scope.tarefas = data;
                console.log($scope.tarefas);
                $scope.loading = false;


                $scope.sortableOptions = {
                    update: function(e, ui) {
                        var logEntry = $scope.tarefas.map(function(i){
                            return i.id;
                        }).join(', ');
                        console.log(logEntry);
                    },
                    stop: function (e, ui) {
                        var logEntry = $scope.tarefas.map(function (i) {
                            return i.id;
                        }).join(', ');
                        console.log(logEntry);
                        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                        $http.post('/api/tarefas', $.param({ lista: logEntry }))
                            .success(function(data) {
                                Tarefa.get()
                                    .success(function(getData) {
                                        $scope.tarefas = getData;
                                        $scope.loading = false;
                                    });

                            })
                            .error(function(data) {
                                console.log(data);
                            });
                    }
                };
            });

        $scope.submitTarefa = function() {
            $scope.loading = true;

            Tarefa.save($scope.tarefaData)
                .success(function(data) {
                    Tarefa.get()
                        .success(function(getData) {
                            $scope.tarefas = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        $scope.deleteTarefa = function(id) {
            $scope.loading = true;
            Tarefa.destroy(id)
                .success(function(data) {
                    Tarefa.get()
                        .success(function(getData) {
                            $scope.tarefas = getData;
                            $scope.loading = false;
                        });

                });
        };

        $scope.editTarefa = function(id){
            $(".label-"+id).hide();
            $(".input-"+id).show();
            $(".edit-"+id).hide();
            $(".save-"+id).show();
            $(".delete-btn-"+id).hide();
        }

        $scope.saveTarefa = function(id){
            tarefaData = {
                'id' : id
                , 'titulo' : $('#titulo-'+id).val()
                , 'descricao' : $('#descricao-'+id).val()
            };
            $(".label-"+id).show();
            $(".input-"+id).hide();
            $(".edit-"+id).show();
            $(".save-"+id).hide();
            console.log(tarefaData);

            Tarefa.edit(tarefaData)
                .success(function(data) {
                    Tarefa.get()
                        .success(function(getData) {
                            $scope.tarefas = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        }

    });
