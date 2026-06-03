DROP DATABASE IF EXISTS Akime_Hotel;
CREATE DATABASE Akime_Hotel
CHARACTER SET utf8mb4;
USE Akime_Hotel;

CREATE TABLE Hospede (
host_id INT PRIMARY KEY AUTO_INCREMENT,
host_nome VARCHAR(100) NOT NULL,
host_doc ENUM('Cartão de Cidadão','Passaporte','Outros'),
host_NIF INT,
host_estado ENUM('Ativo','Inativo'),
host_email VARCHAR(70),
host_password VARCHAR(80)
);

CREATE TABLE Reserva (
res_id INT PRIMARY KEY AUTO_INCREMENT,
res_host_id INT NOT NULL,
res_quarto_id INT NOT NULL,
res_inicio DATETIME,
res_fim DATETIME,
res_estado ENUM('Activa','Cancelada'),
res_check_in ENUM('Sim','Não'),
res_check_out ENUM('Sim','Não')
);

CREATE TABLE Pagamento (
pag_id INT PRIMARY KEY AUTO_INCREMENT,
pag_montante DOUBLE NOT NULL,
pag_func_id INT NOT NULL,
pag_data DATETIME,
pag_tipo ENUM('Parcial','Total')
);

CREATE TABLE Funcionario (
func_id INT PRIMARY KEY AUTO_INCREMENT,
func_nome VARCHAR(80) NOT NULL,
func_funcao VARCHAR(50) NOT NULL,
func_email VARCHAR(70),
fun_password VARCHAR(80)
);

CREATE TABLE Pagamento_Reserva (
pag_res_id INT PRIMARY KEY AUTO_INCREMENT,
pag_res_pag_id INT NOT NULL,
pag_res_res_id INT NOT NULL
);

CREATE TABLE Quarto (
quarto_id INT PRIMARY KEY AUTO_INCREMENT,
quarto_tipo VARCHAR(80) NOT NULL,
quarto_quant INT NOT NULL,
quarto_estado ENUM('Ocupado','Livre'),
quarto_descricao VARCHAR(200),
quarto_valor_base DOUBLE NOT NULL,
quarto_custo_peq_almoco DOUBLE
);

-- FOREIGN KEYS

-- RESERVA

ALTER TABLE Reserva
ADD CONSTRAINT Reserva_fk_Hospede
FOREIGN KEY (res_host_id) REFERENCES Hospede(host_id);

-- PAGAMENTO

ALTER TABLE Pagamento
ADD CONSTRAINT Pagamento_fk_Funcionario
FOREIGN KEY (pag_func_id) REFERENCES Funcionario(func_id);

-- PAGAMENTO_RESERVA

ALTER TABLE Pagamento_Reserva
ADD CONSTRAINT Pagamento_Reserva_fk_Pagamento
FOREIGN KEY (pag_res_pag_id) REFERENCES Pagamento(pag_id);

ALTER TABLE Pagamento_Reserva
ADD CONSTRAINT Pagament_Reserva_fk_Reserva
FOREIGN KEY (pag_res_res_id) REFERENCES Reserva(res_id);
