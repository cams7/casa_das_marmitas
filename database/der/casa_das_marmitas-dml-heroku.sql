--Insert users
INSERT INTO "public"."users" (id,name,email,password,remember_token,created_at,updated_at) VALUES (1,'Dr. Ziraldo Estrada','irocha@example.net','$2y$10$chg3b487JZUc2IP6HpSE2.6i1GTsKta0ebpmdFgMieV8mDqohMLT.','DTPgJZChFS','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."users" (id,name,email,password,remember_token,created_at,updated_at) VALUES (2,'Sra. Sara Pedrosa Zaragoça','mendonca.alexa@example.com','$2y$10$chg3b487JZUc2IP6HpSE2.6i1GTsKta0ebpmdFgMieV8mDqohMLT.','2ZjkyIr4NX','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."users" (id,name,email,password,remember_token,created_at,updated_at) VALUES (3,'Evandro Aragão Corona Filho','qdavila@example.org','$2y$10$chg3b487JZUc2IP6HpSE2.6i1GTsKta0ebpmdFgMieV8mDqohMLT.','nuJRqwOutT','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."users" (id,name,email,password,remember_token,created_at,updated_at) VALUES (4,'Sr. Lucas Salas','feliciano.guilherme@example.com','$2y$10$chg3b487JZUc2IP6HpSE2.6i1GTsKta0ebpmdFgMieV8mDqohMLT.','YML4qQ5dkK','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM users;

--Insert funcionarios
INSERT INTO "public"."funcionarios" (id,cargo,created_at,updated_at) VALUES (1,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."funcionarios" (id,cargo,created_at,updated_at) VALUES (2,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."funcionarios" (id,cargo,created_at,updated_at) VALUES (3,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."funcionarios" (id,cargo,created_at,updated_at) VALUES (4,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM funcionarios;

--Insert empresas
INSERT INTO "public"."empresas" (id,user_id,nome,cnpj,email,telefone,cep,cidade,bairro,logradouro,numero_imovel,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (1,1,'Santana e Filha','16053895000162','ziraldo.valencia@estrada.com','3120454109','33164777','Santa Luzia','Vila Otoni','R. Sabrina Valentin','265',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."empresas" (id,user_id,nome,cnpj,email,telefone,cep,cidade,bairro,logradouro,numero_imovel,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (2,1,'Delvalle e Filho','31512090000123','camilo.guerra@tamoio.br','3194944459','33061896','Santa Luzia','Imperial','Largo Amanda Serra','922',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."empresas" (id,user_id,nome,cnpj,email,telefone,cep,cidade,bairro,logradouro,numero_imovel,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (3,4,'Mendes-Paz','51029402000150','montenegro.carla@neves.com','3137509212','33078134','Santa Luzia','São Geraldo','R. Salomé Franco','7',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."empresas" (id,user_id,nome,cnpj,email,telefone,cep,cidade,bairro,logradouro,numero_imovel,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (4,3,'Prado-Madeira','85323541000103','ferreira.guilherme@esteves.com','31995791826','34697433','Sabará','Sobradinho','R. Elias Ávila','6',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."empresas" (id,user_id,nome,cnpj,email,telefone,cep,cidade,bairro,logradouro,numero_imovel,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (5,1,'Balestero de Valência','30298337000198','leonardo14@pedrosa.com','3125726083','31108795','Belo Horizonte','Novo Ouro Preto','Av. Norma Rezende','39215',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM empresas;

--Insert entregadores
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (1,3,1,'Dr. Gustavo Ian Rivera Jr.','85745327898','329324853','31993587127','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (2,3,2,'Sr. Everton Demian Gomes Jr.','53460496738','816722684','31978327056','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (3,3,2,'Sr. Henrique Zamana Jr.','51224666968','847670937','31971490474','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (4,1,2,'Mel Correia Pacheco Filho','49159604204','914964992','31973043348','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (5,4,3,'Sra. Luciana Bittencourt Pontes Sobrinho','06687778005','229121268','31988766409','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (6,3,3,'Hortência Salazar Neto','14635872874','421909340','31983490930','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (7,4,4,'Ivana Galvão Mascarenhas Filho','15788266084','209926830','31973484092','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (8,1,4,'Valentin Rodrigues Jr.','25480934767','888400527','31994528052','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (9,1,5,'Dr. Taís Lovato Rodrigues Neto','71895296242','996717102','31984586895','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (10,4,5,'Thalissa Ferreira Benites Filho','32776354908','660056461','31982828815','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."entregadores" (id,user_id,empresa_id,nome,cpf,rg,celular,created_at,updated_at) VALUES (11,4,5,'Elias Tamoio Delatorre','38957235841','072460105','31996237399','2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM entregadores;

--Insert produtos
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (1,4,'Marmita com bife e ovo','Arroz, feijão, bife e ovo frito',18.0,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (2,1,'Marmita com bife e ovo','Arroz, feijão, bife e ovo frito',15.0,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (3,2,'Marmita com bife e ovo','Arroz, feijão, bife e ovo frito',12.25,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (4,1,'Marmita com bife e salada','Arroz, feijão, bife e salada de tomate',15.0,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (5,2,'Marmita com bife e salada','Arroz, feijão, bife e salada de tomate',11.5,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (6,1,'Marmita com bife e salada','Arroz, feijão, bife e salada de tomate',9.0,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (7,3,'Marmita com frango e creme','Arroz, feijão, file de frango e creme de milho',14.0,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (8,4,'Marmita com frango e creme','Arroz, feijão, file de frango e creme de milho',9.5,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (9,2,'Marmita com frango e creme','Arroz, feijão, file de frango e creme de milho',7.0,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (10,2,'Marmita com frango e salada','Arroz, feijão, file de frango e salada de tomate',10.0,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (11,4,'Marmita com frango e salada','Arroz, feijão, file de frango e salada de tomate',7.25,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."produtos" (id,user_id,nome,ingredientes,custo,tamanho,created_at,updated_at) VALUES (12,4,'Marmita com frango e salada','Arroz, feijão, file de frango e salada de tomate',5.0,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM produtos;

--Insert taxas
INSERT INTO "public"."taxas" (id,user_id,taxa,tipo_taxa,created_at,updated_at) VALUES (1,3,0.5,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."taxas" (id,user_id,taxa,tipo_taxa,created_at,updated_at) VALUES (2,2,1.25,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."taxas" (id,user_id,taxa,tipo_taxa,created_at,updated_at) VALUES (3,2,2.0,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM taxas;

--Insert clientes
INSERT INTO "public"."clientes" (id,user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (1,2,'Dr. Luis Molina Filho','1982-08-30','3136107121','30786556','Belo Horizonte','Cônego Pinheiro','Largo Cristóvão Marinho','3',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."clientes" (id,user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (2,4,'Miguel Fontes','1990-10-10','3196079667','33129351','Santa Luzia','Vila Santa Mônica','Av. Christian','306',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."clientes" (id,user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (3,1,'Mia Rosa Delgado Jr.','1963-11-09','3125173932','33125106','Santa Luzia','Morada do Rio','Travessa Ivana','56',null,null,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM clientes;

--Insert pedidos
INSERT INTO "public"."pedidos" (id,user_id,cliente_id,taxa_id,quantidade_total,total_pedido,situacao_pedido,created_at,updated_at) VALUES (1,1,1,2,9,128.0,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedidos" (id,user_id,cliente_id,taxa_id,quantidade_total,total_pedido,situacao_pedido,created_at,updated_at) VALUES (2,2,2,2,4,73.25,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedidos" (id,user_id,cliente_id,taxa_id,quantidade_total,total_pedido,situacao_pedido,created_at,updated_at) VALUES (3,1,3,2,3,40.75,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM pedidos;

--Insert pedido_itens
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (1,1,2,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (2,1,3,3,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (3,1,4,4,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (4,2,1,4,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (5,3,2,1,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
INSERT INTO "public"."pedido_itens" (id,pedido_id,produto_id,quantidade,created_at,updated_at) VALUES (6,3,3,2,'2016-12-02 13:41:14.0','2016-12-02 13:41:14.0');
SELECT * FROM pedido_itens;
