create database fsphp;
use fsphp;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    document VARCHAR(255)
) ENGINE=InnoDB;

INSERT INTO users (first_name, last_name, email, document) VALUES 
('John', 'Doe', 'john.doe@example.com', '123456789'),
('Jane', 'Smith', 'jane.smith@example.com', '987654321'),
('Alice', 'Johnson', 'alice.johnson@example.com', '112233445'),
('Bob', 'Brown', 'bob.brown@example.com', '556677889'),
('Charlie', 'Davis', 'charlie.davis@example.com', '998877665'),
('David', 'Miller', 'david.miller@example.com', '667788990'),
('Eve', 'Wilson', 'eve.wilson@example.com', '445566778'),
('Frank', 'Moore', 'frank.moore@example.com', '123123123'),
('Grace', 'Taylor', 'grace.taylor@example.com', '456456456'),
('Hannah', 'Anderson', 'hannah.anderson@example.com', '789789789'),
('Ivan', 'Thomas', 'ivan.thomas@example.com', '123321123'),
('Jack', 'Jackson', 'jack.jackson@example.com', '654654654'),
('Kelly', 'White', 'kelly.white@example.com', '321321321'),
('Leo', 'Harris', 'leo.harris@example.com', '234234234'),
('Mona', 'Martin', 'mona.martin@example.com', '876543210'),
('Nathan', 'Thompson', 'nathan.thompson@example.com', '345678901'),
('Olivia', 'Garcia', 'olivia.garcia@example.com', '567890123'),
('Paul', 'Martinez', 'paul.martinez@example.com', '890123456'),
('Quinn', 'Roberts', 'quinn.roberts@example.com', '234567890'),
('Rita', 'Perez', 'rita.perez@example.com', '987123654'),
('Samuel', 'Wilson', 'samuel.wilson@example.com', '345987654'),
('Tina', 'Young', 'tina.young@example.com', '768934567'),
('Ursula', 'Scott', 'ursula.scott@example.com', '112233667'),
('Victor', 'King', 'victor.king@example.com', '887766554'),
('Wendy', 'Green', 'wendy.green@example.com', '998877666'),
('Xander', 'Adams', 'xander.adams@example.com', '667788443'),
('Yvonne', 'Baker', 'yvonne.baker@example.com', '445677889'),
('Zane', 'Nelson', 'zane.nelson@example.com', '223344556'),
('Aidan', 'Carter', 'aidan.carter@example.com', '324567890'),
('Bea', 'Evans', 'bea.evans@example.com', '567812345'),
('Caleb', 'Parker', 'caleb.parker@example.com', '678901234'),
('Diana', 'Collins', 'diana.collins@example.com', '789012345'),
('Ethan', 'Simmons', 'ethan.simmons@example.com', '890123466'),
('Felix', 'Gonzalez', 'felix.gonzalez@example.com', '123456788'),
('Gina', 'Ramirez', 'gina.ramirez@example.com', '234567890'),
('Howard', 'Hughes', 'howard.hughes@example.com', '345678901'),
('Isla', 'Lopez', 'isla.lopez@example.com', '456789012'),
('Jared', 'King', 'jared.king@example.com', '567890123'),
('Katherine', 'Scott', 'katherine.scott@example.com', '678901234'),
('Liam', 'Lopez', 'liam.lopez@example.com', '789012345'),
('Megan', 'Morris', 'megan.morris@example.com', '890123456'),
('Nina', 'Lee', 'nina.lee@example.com', '901234567'),
('Oscar', 'Perez', 'oscar.perez@example.com', '123456788'),
('Paige', 'Green', 'paige.green@example.com', '234567891'),
('Quincy', 'Bell', 'quincy.bell@example.com', '345678902'),
('Rory', 'Walker', 'rory.walker@example.com', '456789013'),
('Sophie', 'Clark', 'sophie.clark@example.com', '567890124'),
('Tom', 'Rodriguez', 'tom.rodriguez@example.com', '678901235'),
('Uma', 'Graham', 'uma.graham@example.com', '789012346'),
('Vera', 'Wright', 'vera.wright@example.com', '890123457');

select * from users;

create table users_address(
id int primary key auto_increment,
street varchar(255),
number varchar(255),
complement varchar(255),
user_id int not null,
foreign key(user_id) references users(id)
)ENGINE=InnoDB;


INSERT INTO users_address (street, number, complement, user_id) VALUES
('Rua das Flores', '123', 'Apto 101', 1),
('Avenida Paulista', '456', 'Bloco B', 2),
('Rua XV de Novembro', '789', 'Casa 2', 3),
('Avenida Rio Branco', '101', 'Casa', 4),
('Rua da Liberdade', '202', 'Apto 305', 5),
('Rua dos Três Irmãos', '303', 'Casa', 6),
('Rua do Sol', '404', 'Apto 406', 7),
('Avenida das Américas', '505', 'Condomínio Jardim', 8),
('Rua São João', '606', 'Casa 7', 9),
('Rua dos Vencedores', '707', 'Apto 102', 10),
('Rua do Comércio', '808', 'Casa', 11),
('Avenida das Nações', '909', 'Apto 404', 12),
('Rua da Paz', '1010', 'Conjunto 7', 13),
('Rua Brasil', '1111', 'Apto 506', 14),
('Rua do Trabalhador', '1212', 'Casa', 15),
('Avenida Goiás', '1313', 'Apto 307', 16),
('Rua das Palmeiras', '1414', 'Casa 4', 17),
('Avenida do Estado', '1515', 'Apto 209', 18),
('Rua das Margaridas', '1616', 'Casa', 19),
('Rua dos Lírios', '1717', 'Apto 307', 20),
('Rua do Catavento', '1818', 'Casa', 21),
('Avenida João Pessoa', '1919', 'Bloco A', 22),
('Rua dos Jasmins', '2020', 'Casa 5', 23),
('Rua da Saudade', '2121', 'Apto 101', 24),
('Avenida Alvorada', '2222', 'Conjunto 4', 25),
('Rua do Porto', '2323', 'Apto 307', 26),
('Rua das Orquídeas', '2424', 'Casa', 27),
('Rua do Pôr-do-Sol', '2525', 'Apto 507', 28),
('Rua dos Angélicas', '2626', 'Conjunto 2', 29),
('Avenida Independência', '2727', 'Casa 6', 30),
('Rua dos Alecrins', '2828', 'Apto 408', 31),
('Rua do Norte', '2929', 'Conjunto 3', 32),
('Rua dos Carvalhos', '3030', 'Casa', 33),
('Avenida São Luís', '3131', 'Apto 509', 34),
('Rua do Mar', '3232', 'Casa', 35),
('Rua dos Limoeiros', '3333', 'Apto 312', 36),
('Rua da Serra', '3434', 'Conjunto 6', 37),
('Rua do Horizonte', '3535', 'Casa', 38),
('Rua das Acácias', '3636', 'Apto 710', 39),
('Avenida Central', '3737', 'Bloco C', 40),
('Rua do Oriente', '3838', 'Casa 8', 41),
('Rua dos Vagalumes', '3939', 'Apto 204', 42),
('Rua do Sorriso', '4040', 'Conjunto 5', 43),
('Rua dos Ventos', '4141', 'Casa 9', 44),
('Avenida dos Pássaros', '4242', 'Apto 610', 45),
('Rua da Liberdade', '4343', 'Casa', 46),
('Rua dos Prados', '4444', 'Apto 308', 47),
('Avenida Beira Mar', '4545', 'Casa 3', 48),
('Rua das Flores Amarelas', '4646', 'Apto 507', 49),
('Rua do Sol Nascente', '4747', 'Conjunto 8', 50);

select * from users_address;

-- ------------------------------------------------
select * from users order by id desc;
select * from users_address order by id desc;

-- ------------------------------------------------

CREATE TABLE users_2 (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) not null,
    last_name VARCHAR(255) not null,
    email VARCHAR(255) not null unique,
    document VARCHAR(255),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp
) ENGINE=InnoDB;


INSERT INTO users_2 (first_name, last_name, email, document, created_at, updated_at) VALUES
('João', 'Silva', 'joao.silva@email.com', '12345678901', NOW(), NOW()),
('Maria', 'Oliveira', 'maria.oliveira@email.com', '12345678902', NOW(), NOW()),
('Pedro', 'Costa', 'pedro.costa@email.com', '12345678903', NOW(), NOW()),
('Ana', 'Santos', 'ana.santos@email.com', '12345678904', NOW(), NOW()),
('Lucas', 'Pereira', 'lucas.pereira@email.com', '12345678905', NOW(), NOW()),
('Beatriz', 'Rocha', 'beatriz.rocha@email.com', '12345678906', NOW(), NOW()),
('Carlos', 'Mendes', 'carlos.mendes@email.com', '12345678907', NOW(), NOW()),
('Fernanda', 'Almeida', 'fernanda.almeida@email.com', '12345678908', NOW(), NOW()),
('Juliana', 'Martins', 'juliana.martins@email.com', '12345678909', NOW(), NOW()),
('Ricardo', 'Lima', 'ricardo.lima@email.com', '12345678910', NOW(), NOW()),
('Sofia', 'Araujo', 'sofia.araujo@email.com', '12345678911', NOW(), NOW()),
('Bruno', 'Gomes', 'bruno.gomes@email.com', '12345678912', NOW(), NOW()),
('Paula', 'Nunes', 'paula.nunes@email.com', '12345678913', NOW(), NOW()),
('Rafael', 'Souza', 'rafael.souza@email.com', '12345678914', NOW(), NOW()),
('Camila', 'Barbosa', 'camila.barbosa@email.com', '12345678915', NOW(), NOW()),
('Diego', 'Pinto', 'diego.pinto@email.com', '12345678916', NOW(), NOW()),
('Jéssica', 'Ferreira', 'jessica.ferreira@email.com', '12345678917', NOW(), NOW()),
('Gustavo', 'Martins', 'gustavo.martins@email.com', '12345678918', NOW(), NOW()),
('Larissa', 'Cardoso', 'larissa.cardoso@email.com', '12345678919', NOW(), NOW()),
('Felipe', 'Silveira', 'felipe.silveira@email.com', '12345678920', NOW(), NOW()),
('Natália', 'Dias', 'natalia.dias@email.com', '12345678921', NOW(), NOW()),
('Fábio', 'Vieira', 'fabio.vieira@email.com', '12345678922', NOW(), NOW()),
('Camila', 'Lopes', 'camila.lopes@email.com', '12345678923', NOW(), NOW()),
('Eduardo', 'Moura', 'eduardo.moura@email.com', '12345678924', NOW(), NOW()),
('Isabela', 'Martins', 'isabela.martins@email.com', '12345678925', NOW(), NOW()),
('Leandro', 'Cavalcante', 'leandro.cavalcante@email.com', '12345678926', NOW(), NOW()),
('Tainá', 'Rodrigues', 'taina.rodrigues@email.com', '12345678927', NOW(), NOW()),
('Marcelo', 'Santos', 'marcelo.santos@email.com', '12345678928', NOW(), NOW()),
('Talita', 'Araújo', 'talita.araujo@email.com', '12345678929', NOW(), NOW()),
('Felipe', 'Costa', 'felipe.costa@email.com', '12345678930', NOW(), NOW());

create table users_address_2(
id int primary key auto_increment,
street varchar(255) not null,
number varchar(255) not null,
complement varchar(255),
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp,
user_id int not null,
foreign key(user_id) references users(id)
)ENGINE=InnoDB;

INSERT INTO users_address_2 (street, number, complement, created_at, updated_at, user_id) VALUES
('Rua das Flores', '123', 'Apto 101', NOW(), NOW(), 1),
('Avenida Brasil', '456', 'Sala 205', NOW(), NOW(), 2),
('Rua São João', '789', 'Casa 03', NOW(), NOW(), 3),
('Rua do Sol', '101', 'Apto 202', NOW(), NOW(), 4),
('Avenida Paulista', '202', 'Loja 105', NOW(), NOW(), 5),
('Rua das Pedras', '303', 'Apto 304', NOW(), NOW(), 6),
('Rua do Campo', '404', 'Casa 105', NOW(), NOW(), 7),
('Rua das Palmeiras', '505', 'Apto 506', NOW(), NOW(), 8),
('Avenida do Rio', '606', 'Piso 2', NOW(), NOW(), 9),
('Rua Central', '707', 'Sala 307', NOW(), NOW(), 10),
('Rua da Ladeira', '808', 'Apto 409', NOW(), NOW(), 11),
('Rua dos Lírios', '909', 'Casa 510', NOW(), NOW(), 12),
('Avenida dos Trabalhadores', '1010', 'Apto 610', NOW(), NOW(), 13),
('Rua do Comércio', '1111', 'Loja 711', NOW(), NOW(), 14),
('Rua dos Pinheiros', '1212', 'Casa 812', NOW(), NOW(), 15),
('Rua do Parque', '1313', 'Piso 13', NOW(), NOW(), 16),
('Avenida dos Estudantes', '1414', 'Apto 914', NOW(), NOW(), 17),
('Rua da Paz', '1515', 'Casa 1015', NOW(), NOW(), 18),
('Avenida dos Lírios', '1616', 'Sala 1116', NOW(), NOW(), 19),
('Rua do Arco', '1717', 'Apto 1217', NOW(), NOW(), 20),
('Rua dos Andrades', '1818', 'Casa 1318', NOW(), NOW(), 21),
('Rua da Serra', '1919', 'Piso 1419', NOW(), NOW(), 22),
('Avenida das Estações', '2020', 'Apto 1520', NOW(), NOW(), 23),
('Rua da Vitória', '2121', 'Casa 1621', NOW(), NOW(), 24),
('Rua Nova', '2222', 'Loja 1722', NOW(), NOW(), 25),
('Rua do Horizonte', '2323', 'Apto 1823', NOW(), NOW(), 26),
('Avenida das Águas', '2424', 'Casa 1924', NOW(), NOW(), 27),
('Rua do Pôr do Sol', '2525', 'Piso 2025', NOW(), NOW(), 28),
('Avenida da Liberdade', '2626', 'Apto 2126', NOW(), NOW(), 29),
('Rua da Estrela', '2727', 'Casa 2227', NOW(), NOW(), 30);

-- ---------------------------------------------------------
select * from users_2 order by id desc;
select * from users_address_2;

