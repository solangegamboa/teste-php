<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Organizador de Tarefas</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="container" ng-app="tarefaApp" ng-controller="mainController">
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
    <div class="page-header">
        <h2>Organizador de Tarefas</h2>
    </div>
    <form ng-submit="submitTarefa()">
        <div class="form-group">
            <input type="text" name="titulo" ng-model="tarefaData.titulo" placeholder="Título">
        </div>
        <div class="form-group">
            <textarea rows="5" name="descricao" ng-model="tarefaData.descricao" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
    <ul class="list-unstyled list" ui-sortable="sortableOptions" ng-model="tarefas">
        <li class="todoTask item" ng-repeat="tarefa in tarefas | orderBy:predicate:reverse">
                <h3 class="todoName label-{{tarefa.id}}">{{tarefa.titulo}}</h3>

                <span class="label-{{tarefa.id}}">{{tarefa.descricao}}</span>
                <input id="titulo-{{tarefa.id}}" class="input-{{tarefa.id}}" style="display:none;" type="text" value="{{tarefa.titulo}}"><br />
                <textarea id="descricao-{{tarefa.id}}" class="input-{{tarefa.id}}" style="display:none;">{{tarefa.descricao}}</textarea>
		<div class="botoes">
			<button type="button" id="delete-btn" class="close delete-btn-{{tarefa.id}}" aria-hidden="true" ng-click="deleteTarefa(tarefa.id)">Deletar</button>
			<button type="button" id="edit-btn" class="close edit-{{tarefa.id}}" aria-hidden="true" ng-click="editTarefa(tarefa.id)">Editar</button>
			<button type="button" id="save-btn" class="close save-{{tarefa.id}}" style="display:none;" aria-hidden="true" ng-click="saveTarefa(tarefa.id)">Salvar</button>
		</div>

        </li>
    </ul>
</div>
</body>
<!-- JS -->
<script src="js/libs/jquery.min.js"></script>
<script src="js/libs/jquery-ui.min.js"></script>
<script src="js/libs/angular.min.js"></script>
<script src="js/libs/angular-ui.min.js"></script>
<script src="js/libs/sortable.js"></script>
<!-- ANGULAR -->
<script src="js/controllers/mainCtrl.js"></script>
<script src="js/services/tarefasService.js"></script>
<script src="js/app.js"></script>
</html>
