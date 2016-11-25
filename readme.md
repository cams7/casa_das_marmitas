========================
* Autor: César Magalhães
* Tecnologias: MiKTeX 2.9.6069, TeXstudio 2.11.0, Laravel Framework 5.3.24
* Banco de dados: MySQL, PostgreSQL
* Resumo: Portfólio do 4º semestre da faculdade UNOPAR
* Linguagem: TeX, PHP 7.1.0
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
* [PostgreSQL](http://www.postgresql.org/download/)
* [Apache](https://www.apache.org/)
* [PHP 7.1.0](https://secure.php.net/)
* [Composer](https://getcomposer.org/)
* [Laravel Framework 5.3.24](https://laravel.com/)
* [Heroku](https://www.heroku.com/)

Para rodar o programa
-------------------
* No *Windows*, instale o **MiKTeX 2.9.6069**
* No *Windows*, instale o **TeXstudio 2.11.0**
* No *Windows*, instale o **VirtualBox**
* No *Windows*, instale o **Vagrant**
 
* No *Windows*, execute no *Prompt de Comando*, a linha abaixo:
```	
vagrant init ubuntu/trusty64
```

* Inclua as linhas abaixo no arquivo *Vagrantfile*
	
		config.vm.network "forwarded_port", guest: 80, host: 90
		config.vm.network "forwarded_port", guest: 3306, host: 3306
		config.vm.network "forwarded_port", guest: 5432, host: 5432
		config.vm.network "forwarded_port", guest: 8000, host: 8000

* No *Windows*, dentro do diretório *trusty64*, execute no *Prompt de Comando*, a linha abaixo:
```
vagrant up --provider virtualbox
```

* Com o *Putty*, conecte via *SSH* na maquina virtual inicializada

* No *Ubuntu*, instale o **Git** através dos comandos abaixo:
```sh
sudo apt-get update
sudo apt-get install git-core
git config --global user.name <Nome do usuário>
git config --global user.email <E-mail do usuário>
git --version
```
		
* No *Ubuntu*, instale o **MySQL** através dos comandos abaixo:
```sh
sudo apt-get install mysql-server
mysql --version
```			

* No *Ubuntu*, instale o **PostgreSQL** através dos comandos abaixo:
```sh
sudo apt-get install postgresql postgresql-contrib pgadmin3
```			

* No *Ubuntu*, instale o **Apache** através dos comandos abaixo:
```sh
sudo apt-get install apache2
apache2 -v
```		

* No *Ubuntu*, instale o **PHP 7** através dos comandos abaixo:
```sh
sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get purge php5-fpm -y
sudo apt-get install php7.0 php7.0-fpm
sudo apt-get install libapache2-mod-php7.0
sudo apt-get install php7.0-mysql -y
apt-get --purge autoremove -y
php --version
```

* No *Ubuntu*, instale o **Composer** através dos comandos abaixo:
```sh
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
composer
```		

* No *Ubuntu*, instale o **Laravel** através dos comandos abaixo:
```sh
composer global require "laravel/installer"
```		
		
* No *Ubuntu*, instale o **Heroku** através dos comandos abaixo:
```sh
wget -O- https://toolbelt.heroku.com/install-ubuntu.sh | sh
heroku --version
```
	
* No **MySQL**, crie o banco *casa_da_marmita* através dos comandos abaixo:
```sh
mysql -u root -p
CREATE DATABASE casa_da_marmita;
USE casa_da_marmita;
CREATE USER 'dono_da_marmita'@'localhost' IDENTIFIED BY 'marmita';
GRANT ALL PRIVILEGES ON casa_da_marmita.* TO 'dono_da_marmita'@'localhost';
FLUSH PRIVILEGES;		
exit		
mysql --host=127.0.0.1 --user=dono_da_marmita --password=marmita casa_da_marmita
exit
```		
				
* No *Ubuntu*, altere a senha do usuário *postgres* através dos comandos abaixo:
```sh
sudo -i -u postgres
psql postgres
ALTER USER postgres WITH PASSWORD 'postgres';
\q
exit
```		
		
* Feito a instalação e a mudança de senha do usuário *postgres*, você estará apto a desenvolver um trabalho no seu computador conectando normalmente ao **PostgreSQL**, porém, se a ideia é disponibilizar acesso ao banco para receber conexões de outras máquinas, você terá que alterar os arquivos *postgresql.conf* e *pg_hba.conf* no diretório */etc/postgresql/9.3/main*; para isso, siga os passos abaixo:
```sh
sudo su - postgres
cd /etc/postgresql/9.3/main
vim postgresql.conf
```		
		
1. Digite */listen* para busca a linha *#listen_addresses ...*
2. Aperte a tecla *i* para editar o arquivo
3. Remova o caráter *#* do inicio da linha, e altere *'localhost'* por _'*'_
4. Apos alteração, a linha ficará como segue abaixo:
	
		listen_addresses = '*' ...
	
5. Aperte a tecla *ESC*
6. Digite *:wq* para salvar a alteração do arquivo *postgresql.conf*
```sh
vim pg_hba.conf
```		
		
1. Digite */127.0.0.1* para busca a linha *host all all ...*
2. Aperte a tecla *i* para editar o arquivo
3. Altere *127.0.0.1/32* por *0.0.0.0/0*
4. Apos alteração, a linha ficará como segue abaixo:
	
		host all all 0.0.0.0/0 md5
	
5. Aperte a tecla *ESC*
6. Digite *:wq* para salvar a alteração do arquivo *pg_hba.conf*
```sh
exit
```		
		
* Feito a alteração, basta reiniciar o **PostgreSQL**
```sh
sudo /etc/init.d/postgresql restart
```
				
* Obs.: Para testar as alterações no **PostgreSQL**, execute o comando abaixo:
```sh
psql -U postgres -h <IP da maquina>
\q
```				
		
* No **PostgreSQL**, crie o banco *casa_da_marmita* através dos comandos abaixo:
```sh
sudo -i -u postgres
psql -d template1 -U postgres
CREATE USER dono_da_marmita WITH PASSWORD 'marmita';
CREATE DATABASE casa_da_marmita;
GRANT ALL PRIVILEGES ON DATABASE casa_da_marmita to dono_da_marmita;
\q
exit

sudo adduser dono_da_marmita
passwd marmita

su - dono_da_marmita
psql -d casa_da_marmita -U dono_da_marmita
\q
```		

* Para baixar o projeto *casa_das_marmitas*, execute a linha abaixo:
```sh
git clone https://github.com/cams7/casa_das_marmitas.git
cd casa_das_marmitas

git remote add origin <URL do repositório>
git remote -v
git push origin master
```		
	
* Caso deseje rodar o *casa_das_marmitas* num [PAAS](https://pt.wikipedia.org/wiki/Plataforma_como_serviço), primeiro e necessário ter uma conta no **Heroku**. Após criar uma conta nesse site, execute as linhas abaixo:				
```sh		
heroku login
heroku create <Nome da aplicação>
heroku config:add \
```

* Inclua linha abaixo após o comando:
	
		BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-multi.git
	
```sh
vim .buildpacks
```

* Inclua linhas abaixo no arquivo *.buildpacks*:
	
		https://github.com/heroku/heroku-buildpack-nodejs
		https://github.com/heroku/heroku-buildpack-php

```sh
vim Procfile
```

* Inclua linhas abaixo no arquivo *Procfile*:
	
		web: vendor/bin/heroku-php-apache2 public/

```sh		
heroku addons:add heroku-postgresql:hobby-dev

git add .
git commit -m "Initial commit"

git push heroku -u master

heroku run "php artisan migrate"
heroku run "php artisan migrate:status"
```

* Caso deseje remover a aplicação do seu *PAAS*, execute a linha abaixo:
```sh		
heroku apps:destroy --app <Nome da aplicação>
```