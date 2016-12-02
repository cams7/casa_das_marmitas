
CREATE SEQUENCE users_id_seq;

CREATE TABLE users (
                id INTEGER NOT NULL DEFAULT nextval('users_id_seq'),
                name VARCHAR(60) NOT NULL,
                email VARCHAR(50) NOT NULL,
                password VARCHAR(60) NOT NULL,
                remember_token VARCHAR(30) NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT users_pk PRIMARY KEY (id)
);


ALTER SEQUENCE users_id_seq OWNED BY users.id;

CREATE TABLE funcionarios (
                id INTEGER NOT NULL,
                cargo SMALLINT NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT funcionarios_pk PRIMARY KEY (id)
);


CREATE SEQUENCE produtos_id_seq;

CREATE TABLE produtos (
                id INTEGER NOT NULL DEFAULT nextval('produtos_id_seq'),
                user_id INTEGER NOT NULL,
                nome VARCHAR(60) NOT NULL,
                ingredientes TEXT NOT NULL,
                custo REAL NOT NULL,
                tamanho SMALLINT NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT produtos_pk PRIMARY KEY (id)
);


ALTER SEQUENCE produtos_id_seq OWNED BY produtos.id;

CREATE SEQUENCE taxas_id_seq;

CREATE TABLE taxas (
                id SMALLINT NOT NULL DEFAULT nextval('taxas_id_seq'),
                user_id INTEGER NOT NULL,
                taxa REAL NOT NULL,
                tipo_taxa SMALLINT NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT taxas_pk PRIMARY KEY (id)
);


ALTER SEQUENCE taxas_id_seq OWNED BY taxas.id;

CREATE SEQUENCE empresas_id_seq;

CREATE TABLE empresas (
                id SMALLINT NOT NULL DEFAULT nextval('empresas_id_seq'),
                user_id INTEGER NOT NULL,
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
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT empresas_pk PRIMARY KEY (id)
);


ALTER SEQUENCE empresas_id_seq OWNED BY empresas.id;

CREATE SEQUENCE entregadores_id_seq;

CREATE TABLE entregadores (
                id INTEGER NOT NULL DEFAULT nextval('entregadores_id_seq'),
                user_id INTEGER NOT NULL,
                empresa_id SMALLINT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                cpf VARCHAR(11) NOT NULL,
                rg VARCHAR(10) NOT NULL,
                celular VARCHAR(11) NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT entregadores_pk PRIMARY KEY (id)
);


ALTER SEQUENCE entregadores_id_seq OWNED BY entregadores.id;

CREATE SEQUENCE clientes_id_seq;

CREATE TABLE clientes (
                id INTEGER NOT NULL DEFAULT nextval('clientes_id_seq'),
                user_id INTEGER NOT NULL,
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
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT clientes_pk PRIMARY KEY (id)
);


ALTER SEQUENCE clientes_id_seq OWNED BY clientes.id;

CREATE SEQUENCE pedidos_id_seq;

CREATE TABLE pedidos (
                id BIGINT NOT NULL DEFAULT nextval('pedidos_id_seq'),
                user_id INTEGER NOT NULL,
                cliente_id INTEGER NOT NULL,
                taxa_id SMALLINT NOT NULL,
                quantidade_total SMALLINT NOT NULL,
                total_pedido REAL NOT NULL,
                situacao_pedido SMALLINT NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT pedidos_pk PRIMARY KEY (id)
);


ALTER SEQUENCE pedidos_id_seq OWNED BY pedidos.id;

CREATE SEQUENCE pedido_itens_id_seq;

CREATE TABLE pedido_itens (
                id BIGINT NOT NULL DEFAULT nextval('pedido_itens_id_seq'),
                pedido_id BIGINT NOT NULL,
                produto_id INTEGER NOT NULL,
                quantidade SMALLINT NOT NULL,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                CONSTRAINT pedido_itens_pk PRIMARY KEY (id)
);


ALTER SEQUENCE pedido_itens_id_seq OWNED BY pedido_itens.id;

ALTER TABLE empresas ADD CONSTRAINT funcionarios_empresas_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE entregadores ADD CONSTRAINT funcionarios_entregadores_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE clientes ADD CONSTRAINT funcionarios_clientes_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedidos ADD CONSTRAINT funcionarios_pedidos_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE taxas ADD CONSTRAINT funcionarios_taxas_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE produtos ADD CONSTRAINT funcionarios_produtos_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE funcionarios ADD CONSTRAINT users_funcionarios_fk
FOREIGN KEY (id)
REFERENCES users (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido_itens ADD CONSTRAINT produtos_pedido_itens_fk
FOREIGN KEY (produto_id)
REFERENCES produtos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedidos ADD CONSTRAINT taxas_pedidos_fk
FOREIGN KEY (taxa_id)
REFERENCES taxas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE entregadores ADD CONSTRAINT empresas_entregadores_fk
FOREIGN KEY (empresa_id)
REFERENCES empresas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedidos ADD CONSTRAINT clientes_pedidos_fk
FOREIGN KEY (cliente_id)
REFERENCES clientes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido_itens ADD CONSTRAINT pedidos_pedido_itens_fk
FOREIGN KEY (pedido_id)
REFERENCES pedidos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
