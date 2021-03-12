CREATE DATABASE proimpo_test_DB CHARACTER SET latin1 COLLATE latin1_swedish_ci;

CREATE TABLE proimpo_test_DB.usuarios (
    id BIGINT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR (20) NOT NULL,
    nombres VARCHAR (25) NULL,
    apellidos VARCHAR (40) NULL,
    email VARCHAR (70) NULL,
    passwd VARCHAR (100) NOT NULL,
    genero ENUM('F','M') NULL,
    municipio ENUM('Cali','Palmira', 'Yumbo', 'Jamundí') NULL,
    direccion VARCHAR (50) NULL,
    fecha_nacimiento DATE NULL,
    fecha_creacion DATETIME NOT NULL,
    fecha_edicion DATETIME NULL,
    PRIMARY KEY (id),
    UNIQUE (usuario),
    UNIQUE (email)
)
CHARACTER SET latin1 COLLATE latin1_swedish_ci
ENGINE MyISAM;

-- Se crea usuario de prueba, la contraseña de este es "rasmuslerdorf"
INSERT INTO proimpo_test_DB.usuarios (usuario, nombres, apellidos, email, passwd, genero, municipio, direccion, fecha_nacimiento, fecha_creacion) VALUES ("prueba", "prueba", "prueba", "prueba@prueba.com", "$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq", "F", "Cali", "calle 2 carrera 3", "1988-06-02", NOW());
