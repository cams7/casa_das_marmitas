
CREATE TABLE users (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(60) NOT NULL,
                email VARCHAR(50) NOT NULL,
                password VARCHAR(60) NOT NULL,
                remember_token VARCHAR(30) NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE funcionarios (
                id INT NOT NULL,
                cargo SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE produtos (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                ingredientes LONGTEXT NOT NULL,
                custo DOUBLE PRECISIONS NOT NULL,
                tamanho SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE taxas (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                taxa DOUBLE PRECISIONS NOT NULL,
                tipo_taxa SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE empresas (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                cnpj VARCHAR(14) NOT NULL,
                email VARCHAR(50) NOT NULL,
                telefone VARCHAR(11) NOT NULL,
                cep VARCHAR(8) NOT NULL,
                cidade VARCHAR(60) NOT NULL,
                bairro VARCHAR(60) NOT NULL,
                logradouro VARCHAR(100) NOT NULL,
                numero_imovel VARCHAR(30) NOT NULL,
                complemento_endereco VARCHAR(30),
                ponto_referencia VARCHAR(30),
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE entregadores (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                empresa_id SMALLINT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                cpf VARCHAR(11) NOT NULL,
                rg VARCHAR(10) NOT NULL,
                celular VARCHAR(11) NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE clientes (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                nascimento DATE,
                telefone VARCHAR(11) NOT NULL,
                cep VARCHAR(8) NOT NULL,
                cidade VARCHAR(60) NOT NULL,
                bairro VARCHAR(60) NOT NULL,
                logradouro VARCHAR(100) NOT NULL,
                numero_residencial VARCHAR(30) NOT NULL,
                complemento_endereco VARCHAR(30),
                ponto_referencia VARCHAR(30),
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE pedidos (
                id BIGINT AUTO_INCREMENT NOT NULL,
                user_id INT NOT NULL,
                cliente_id INT NOT NULL,
                taxa_id SMALLINT NOT NULL,
                quantidade_total SMALLINT NOT NULL,
                total_pedido DOUBLE PRECISIONS NOT NULL,
                situacao_pedido SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE pedido_itens (
                id BIGINT AUTO_INCREMENT NOT NULL,
                pedido_id BIGINT NOT NULL,
                produto_id INT NOT NULL,
                quantidade SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


ALTER TABLE empresas ADD CONSTRAINT funcionarios_empresas_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE entregadores ADD CONSTRAINT funcionarios_entregadores_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE clientes ADD CONSTRAINT funcionarios_clientes_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedidos ADD CONSTRAINT funcionarios_pedidos_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE taxas ADD CONSTRAINT funcionarios_taxas_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE produtos ADD CONSTRAINT funcionarios_produtos_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE funcionarios ADD CONSTRAINT users_funcionarios_fk
FOREIGN KEY (id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedido_itens ADD CONSTRAINT produtos_pedido_itens_fk
FOREIGN KEY (produto_id)
REFERENCES produtos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedidos ADD CONSTRAINT taxas_pedidos_fk
FOREIGN KEY (taxa_id)
REFERENCES taxas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE entregadores ADD CONSTRAINT empresas_entregadores_fk
FOREIGN KEY (empresa_id)
REFERENCES empresas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedidos ADD CONSTRAINT clientes_pedidos_fk
FOREIGN KEY (cliente_id)
REFERENCES clientes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedido_itens ADD CONSTRAINT pedidos_pedido_itens_fk
FOREIGN KEY (pedido_id)
REFERENCES pedidos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
