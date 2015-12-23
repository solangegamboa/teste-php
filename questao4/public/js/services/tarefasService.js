angular.module('tarefaService', [])

    .factory('Tarefa', function($http) {

        return {
            get : function() {
                return $http.get('/api/tarefas');
            },

            save : function(tarefaData) {
                return $http({
                    method: 'POST',
                    url: '/api/tarefas',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(tarefaData)
                });
            },

            edit : function(tarefaData) {
                return $http({
                    method: 'POST',
                    url: '/api/tarefas/save',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(tarefaData)
                });
            },

            destroy : function(id) {
                return $http({
                    method: 'DELETE',
                    url: '/api/tarefas/'+id
                });
            },

            show : function(id){
                return $http.get('/api/tarefas' + id);
            }
        }

    });
