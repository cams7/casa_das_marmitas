========================
* Autor: César Magalhães
* Tecnologias: MiKTeX 2.9.6069, TeXstudio 2.11.0, **Laravel Framework 5.3.24**
* Banco de dados: **PostgreSQL**
* Resumo: Portfólio do 4º semestre da faculdade UNOPAR
* Linguagem: TeX, **PHP 7.1.0**
* Fonte: <https://github.com/cams7/casa_das_marmitas>
* Site: <https://enigmatic-river-52302.herokuapp.com/>

O que é o sistema: Casa das Marmitas?
-------------------
Portfólio do 4º semestre da faculdade UNOPAR.

Sistemas requeridos
-------------------
* [MiKTeX 2.9.6069](http://miktex.org/)
* [TeXstudio 2.11.0](http://www.texstudio.org/)
* [PHP 7.1.0](https://secure.php.net/)
* [Composer](https://getcomposer.org/)
* [Laravel Framework 5.3.24](https://laravel.com/)
* [PostgreSQL](http://www.postgresql.org/download/)
* [Git](https://git-scm.com/downloads)
* [Heroku](https://www.heroku.com/)

Para rodar o programa
-------------------
* Instale o MiKTeX 2.9.6069
* Instale o TeXstudio 2.11.0
* Instale os seguintes programas: **PHP 7**, **Git**, **PostgreSQL**, caso ainda não os tenha instalados.
* No **Postgres**, crie um banco o qual o nome seja **casa_das_marmitas**.
* Para baixar o projeto (**casa_das_marmitas**), execute a linha abaixo:

		git clone https://github.com/cams7/casa_das_marmitas.git
	
* Caso deseje rodar o **casa_das_marmitas** num [PAAS](https://pt.wikipedia.org/wiki/Plataforma_como_serviço), primeiro e necessário ter uma conta no **Heroku**. Após criar uma conta no Heroku, execute as linhas abaixo:

		git clone https://github.com/cams7/casa_das_marmitas.git
		cd casa_das_marmitas
		wget -O- https://toolbelt.heroku.com/install-ubuntu.sh | sh
		heroku --version
		heroku login
		heroku create casa-das-marmitas
		heroku config:add \
		BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-multi.git

		vim .buildpacks
		https://github.com/heroku/heroku-buildpack-nodejs
		https://github.com/heroku/heroku-buildpack-php
		
		vim Procfile
		web: vendor/bin/heroku-php-apache2 public/
		
		git add .
		git commit -m "Initial commit"
		
		git push heroku -u master
		
		heroku apps:destroy --app casa-das-marmitas

		

