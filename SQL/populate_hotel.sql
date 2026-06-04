USE Akime_Hotel;

INSERT INTO Hospede (host_nome, host_doc, host_NIF, host_estado, host_email, host_password) 
VALUES ('Deuwer Santos', 'Passaporte', 123456789, 'Ativo','deuwer@gmail.com','123456'),
('Elias Benvindo', 'Cartão de Cidadão', 234567891, 'Ativo','elias@gmail.com','123456'),
('Beatriz Lopes', 'Passaporte', 345678912, 'Ativo','beatriz@ghotmail.com','123456'),
('Enzo Nascimento', 'Outros', 456789123, 'Ativo','enzo_nasc@hotmail.com','123456'),
('Tony Galliard', 'Passaporte', 567891234, 'Inativo','tonyr@hotmail.com','123456');

INSERT INTO Funcionario (func_nome, func_funcao, func_email, fun_password) 
VALUES ('Enzo', 'Gestor', 'enzo@hotel.com', '123456'),
('Nicolas','Rececionista', 'nicola@hotel.com', '123456'),
('Francesca','Rececionista','francesca@hotel.com','123456');

INSERT INTO Pagamento (pag_montante, pag_func_id, pag_data, pag_tipo) 
VALUES (300,1,NOW(),'Total'),
(180,2,NOW(), 'Parcial'),
(250,1,NOW(), 'Total'),
(400,3,NOW(), 'Parcial'),
(220,2,NOW(),'Total');

INSERT INTO Quarto (quarto_tipo, quarto_quant, quarto_estado, quarto_descricao, quarto_valor_base, quarto_custo_peq_almoco) 
VALUES ('Único',1,'Ocupado','Quarto individual com vista para a cidade',60,8),
('Único',1,'Livre','Quarto individual económico',55,8),
('Duplo',1,'Ocupado','Quarto duplo standard',90,10),
('Duplo',1,'Livre','Quarto duplo com varanda',95,10),
('Casal',1,'Ocupado','Quarto casal com cama king size',80,10),
('Casal',1,'Livre','Quarto casal económico',75,10),
('Família',1,'Livre','Quarto familiar para quatro pessoas',150,15),
('Família',1,'Livre','Quarto familiar premium',180,15),
('Suite',1,'Livre','Suite executiva',250,20),('Suite',1,'Livre','Suite presidencial',400,25);

INSERT INTO Reserva (res_host_id, res_quarto_id, res_inicio, res_fim, res_estado, res_check_in, res_check_out) 
VALUES (1,1,'2026-06-04 14:00:00','2026-06-10 12:00:00','Activa','Sim','Não'),
(2,2,'2026-07-05 14:00:00','2026-07-20 12:00:00','Activa','Não','Não'),
(3,3,'2026-06-08 14:00:00','2026-07-30 12:00:00','Activa','Sim','Sim'),
(4,4,'2026-06-20 14:00:00','2026-06-25 12:00:00','Cancelada','Não','Não'),
(5,2,'2026-06-06 14:00:00','2026-08-15 12:00:00','Activa','Não','Não');

INSERT INTO Pagamento_Reserva (pag_res_pag_id, pag_res_res_id) VALUES (1,1),
(2,2),
(3,3),
(4,4),
(5,5);

