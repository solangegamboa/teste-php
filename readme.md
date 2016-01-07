Questão 4 - TODOLIST
=========
#### Demo
	http://ec2-54-201-45-79.us-west-2.compute.amazonaws.com
=========
	Comparativo Laravel X CakePHP
	http://vschart.com/compare/laravel/vs/cakephp
	
#### Ferramentas utilizadas

	Framework Laravel
	Framework AngularJS
	Bootstrap

#### Instalação

	Instalação no Linux Ubuntu 14.04.1 - Developers

#### Aplicações instaladas:
	apt-get install mysql-client
	apt-get install mysql-server
	apt-get install php5
	apt-get install apache2
	apt-get install php5-mysql
	apt-get install php5-mysqlnd
	apt-get install php5-mcrypt

#### Ativar Módulos Apache e PHP
	# Apache
	  	a2enmod rewrite
	# PHP
		php5enmod mcrypt

#### Composer:
	curl -s https://getcomposer.org/installer | php
	sudo mv composer.phar /usr/local/bin/composer

#### Dump: 
	prova-php.sql
	configuração do banco em questao4/app/config/database.php

#### Iniciar o Laravel:
	$ cd questao4 
	$ php artisan serve
	- Normalmente ele gera o acesso em http://localhost:8000

#### API REST: 
	/api/tarefas
	
#### ROTAS: 
	php artisan routes

#### Mais informações:
	solange.gamboa@gmail.com
