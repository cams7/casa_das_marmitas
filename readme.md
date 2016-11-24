========================
* Autor: César Magalhães
* Tecnologias: MiKTeX 2.9.6069, TeXstudio 2.11.0, **Laravel Framework 5.3.24**
* Banco de dados: **MySQL**, **PostgreSQL**
* Resumo: Portfólio do 4º semestre da faculdade UNOPAR
* Linguagem: TeX, **PHP 7.1.0**
* Fonte: <https://github.com/cams7/casa_das_marmitas>
* Site: <https://casa-das-marmitas.herokuapp.com/>

O que é o sistema: Casa das Marmitas?
-------------------
Portfólio do 4º semestre da faculdade UNOPAR.

Sistemas requeridos
-------------------
* [Microsoft Windows 10](https://www.microsoft.com/pt-br/software-download/windows10)
* [MiKTeX 2.9.6069](http://miktex.org/)
* [TeXstudio 2.11.0](http://www.texstudio.org/)
* [VirtualBox](https://www.virtualbox.org/)
* [Vagrant](https://www.vagrantup.com/)
* [Ubuntu 14.04.5 LTS](http://releases.ubuntu.com/14.04/)
* [Git](https://git-scm.com/downloads)
* [MySQL](https://www.mysql.com/)
* [Apache](https://www.apache.org/)
* [PHP 7.1.0](https://secure.php.net/)
* [Composer](https://getcomposer.org/)
* [Laravel Framework 5.3.24](https://laravel.com/)
* [Heroku](https://www.heroku.com/)

Para rodar o programa
-------------------
* No Windows 10, instale o MiKTeX 2.9.6069
* No Windows 10, instale o TeXstudio 2.11.0
* No Windows 10, instale o VirtualBox
* No Windows 10, instale o Vagrant 
* No Windows 10, execute no **Prompt de Comando** a linha abaixo:
	
		vagrant init ubuntu/trusty64

* Inclua as seguintes linhas no arquivo **Vagrantfile**

	config.vm.network "forwarded_port", guest: 80, host: 90
  	config.vm.network "forwarded_port", guest: 3306, host: 3306
  	config.vm.network "forwarded_port", guest: 8000, host: 8000

* No Windows 10, dentro do diretório **trusty64**, execute no **Prompt de Comando** a linha abaixo:

		vagrant up --provider virtualbox

* Com o **Putty**, conecte via **SSH** na maquina virtual inicializada
* No Ubuntu, instale o **Git** através dos comandos abaixo:

		sudo apt-get update
		sudo apt-get install git-core
		git config --global user.name "Your Name Here"
		git config --global user.email "your_email@youremail.com"
		git --version

* No Ubuntu, instale o **MySQL** através dos comandos abaixo:
	
		sudo apt-get install mysql-server
    	mysql --version

* No Ubuntu, instale o **Apache** através dos comandos abaixo:
	
		sudo apt-get install apache2
		apache2 -v

* No Ubuntu, instale o **PHP 7** através dos comandos abaixo:
	
		sudo apt-get install python-software-properties
		sudo add-apt-repository ppa:ondrej/php
		sudo apt-get update
		sudo apt-get purge php5-fpm -y
		sudo apt-get install php7.0 php7.0-fpm
		sudo apt-get install libapache2-mod-php7.0
		sudo apt-get install php7.0-mysql -y
		apt-get --purge autoremove -y
		php --version

* No Ubuntu, instale o **Composer** através dos comandos abaixo:

		curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
		composer

* No Ubuntu, instale o **Laravel** através dos comandos abaixo:
		
		composer global require "laravel/installer"

* No Ubuntu, instale o **Heroku** através dos comandos abaixo:

		wget -O- https://toolbelt.heroku.com/install-ubuntu.sh | sh
		heroku --version

* Crie o banco **casa_da_marmita** através dos comandos abaixo:
		
		mysql -u root -p
		CREATE DATABASE casa_da_marmita;
		USE casa_da_marmita;
		CREATE USER 'dono_da_marmita'@'localhost' IDENTIFIED BY 'marmita';
		GRANT ALL PRIVILEGES ON casa_da_marmita.* TO 'dono_da_marmita'@'localhost';
		FLUSH PRIVILEGES;		
		exit		
		mysql --host=127.0.0.1 --user=dono_da_marmita --password=marmita casa_da_marmita
		exit

* Para baixar o projeto **casa_das_marmitas**, execute a linha abaixo:

		git clone https://github.com/cams7/casa_das_marmitas.git
		cd casa_das_marmitas
	
* Caso deseje rodar o **casa_das_marmitas** num [PAAS](https://pt.wikipedia.org/wiki/Plataforma_como_serviço), primeiro e necessário ter uma conta no **Heroku**. Após criar uma conta no Heroku, execute as linhas abaixo:				
		
		rm -r .git
		git init

		heroku login
		heroku create nome_da_sua_aplicacao
		heroku config:add \
			BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-multi.git

		vim .buildpacks
			https://github.com/heroku/heroku-buildpack-nodejs
			https://github.com/heroku/heroku-buildpack-php
		
		vim Procfile
			web: vendor/bin/heroku-php-apache2 public/
				
		heroku addons:add heroku-postgresql:hobby-dev
		
		git add .
		git commit -m "Initial commit"
		
		git push heroku -u master
		
		heroku run "php artisan migrate"
		heroku run "php artisan migrate:status"

* Caso deseje remover a aplicação do seu PAAS, execute a linha abaixo:
		
		heroku apps:destroy --app nome_da_sua_aplicacao