Portfólio do 4º semestre da faculdade UNOPAR
========================
* Autor: César Magalhães
* Tecnologias: **JPA 2.1**, **Hibernate 5.1.0**, **JSF 2**, **Primefaces 5.3**, **EJB 3.1**, **Jasperreports 6.2.1**
* Banco de dados: **PostgreSQL**, **H2**
* Resumo: Portfólio do 4º semestre da faculdade UNOPAR
* Linguagem: **Java 8**
* Fonte: <https://github.com/cams7/casa_das_marmitas>
* Site: <http://crud-cams7.rhcloud.com>

O que é o sistema: Casa das Marmitas?
-------------------
Portfólio do 4º semestre da faculdade UNOPAR.

Sistemas requeridos
-------------------
* [JDK 1.8](http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html?ssSourceSiteId=otnpt)
* [Maven 3.3.9](https://maven.apache.org/download.cgi)
* [Wildfly 10.0.0.Final](http://wildfly.org/downloads/)
* [PostgreSQL](http://www.postgresql.org/download/)
* [Git](https://git-scm.com/downloads)

Para rodar o programa
-------------------
* Instale os seguintes programas: **JDK 8**, **Git**, **PostgreSQL**, caso ainda não os tenha instalados.
* No **Postgres**, crie um banco o qual o nome seja **casa_das_marmitas**.
* Configure a variável de ambiente do **Maven 3.3.9**, em seguida, reinicie o PC.
* Para baixar o projeto (**casa_das_marmitas**), execute a linha abaixo:

		git clone https://github.com/cams7/casa_das_marmitas.git
	
* Caso deseje rodar o **casa_das_marmitas** num [PAAS](https://pt.wikipedia.org/wiki/Plataforma_como_serviço), primeiro e necessário ter uma conta no **Github** e **Openshift**. No Github, faça um **Fork** desse projeto, em seguida, clone-o do seu repositório. No Openshift, crie uma aplicação **Wildfly 10**, e também um banco **PostgreSQL 9.2**, depois [sincronize-a com a aplicação do Github](https://developer.jboss.org/wiki/Enable-openshift-ciFullExampleUsingOpenshift-java-client), para isso, execute as linhas abaixo:

		git clone https://github.com/<SEU USUÁRIO DO GITHUB>/casa_das_marmitas.git
		cd casa_das_marmitas
		git remote add openshift -f <URL DO GIT DA APLICAÇÃO NO OPENSHIFT>
		git merge openshift/master -s recursive -X ours
	
* Obs.: Antes de executar a linha abaixo, algumas alterações no arquivo **pom.xml** terão que ser feitas, por isso, pule-a e siga as instruções abaixo.

		git push openshift HEAD
	
* Baixe o **Wildfly 10**, caso ainda não o tenha baixado.

* No **Wildfly 10**, [crie um Datasouce para o PostgreSQL](https://desenvolvo.wordpress.com/2012/06/21/configurando-ds-jbossas7/).

* Obs.: As configurações da conexão do banco de dados estão no arquivo **pom.xml** que esta na raiz do projeto. Antes de rodar a aplicação, altere essas configurações de acordo com o banco que esta sendo usado.

1. Inicialize o **Wildfly 10**, em seguida, no diretório onde o projeto foi baixado, execute as linhas abaixo:

		mvn clean install wildfly:deploy
	
* Obs.: No navegador, informe este endereço: <http://localhost:8080/crud_sys>, caso a porta do **Wildfly** seja **8080**.