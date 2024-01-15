CREATE DATABASE universidad;

USE universidad;

CREATE TABLE campus (
    id INT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE departamento (
    id INT PRIMARY KEY,
    nombre VARCHAR(100)
);

/*LISTO*/
CREATE TABLE curso (
    id INT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE periodo_academico (
    id INT PRIMARY KEY,
    nivel VARCHAR(10),
    siglas VARCHAR(4),
    mes_inicio DATE,
    año_inicio YEAR,
    mes_fin DATE,
    año_fin YEAR
);

CREATE TABLE materia (
    codigo VARCHAR(10) PRIMARY KEY,
    curso INT,
    nombre VARCHAR(100),
    descripcion TEXT,
    horas_creditos INT,
    horas_teoria INT, 
    horas_laboratorio INT,
    horas_otros INT,
    CONSTRAINT curso_materia_fk FOREIGN KEY (curso) REFERENCES curso(id)
);

CREATE TABLE nrc (
    nrc VARCHAR(10) PRIMARY KEY,
    campus INT,
    departamento INT,
    materia VARCHAR(10),
    docente VARCHAR(9),
    periodo INT,
    CONSTRAINT docente_nrc_fk FOREIGN KEY (docente) REFERENCES docente(id),
    CONSTRAINT materia_nrc_fk FOREIGN KEY (materia) REFERENCES materia(codigo),
    CONSTRAINT campus_nrc_fk FOREIGN KEY (campus) REFERENCES campus(id),
    CONSTRAINT departamento_nrc_fk FOREIGN KEY (departamento) REFERENCES departamento(id),
    CONSTRAINT periodo_nrc_fk FOREIGN KEY (periodo) REFERENCES periodo(id)
);

/*LISTO*/
CREATE TABLE docente (
    id VARCHAR(9) PRIMARY KEY,
    cedula VARCHAR(10),
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    fecha_nacimiento DATE,
    genero VARCHAR(10),
    telefono VARCHAR(10),
    email VARCHAR(100),
    direccion VARCHAR(100),
    observaciones TEXT
);

CREATE TABLE titulo (
    id VARCHAR(9),
    fecha DATE,  
    ies VARCHAR(100),
    titulo VARCHAR(100),
    observaciones TEXT,
    CONSTRAINT docente_titulo_fk FOREIGN KEY (id) REFERENCES docente(id)
);

/*LISTO*/
CREATE TABLE experiencia_laboral (
    id VARCHAR(9),
    entidad VARCHAR(100),
    cargo VARCHAR(100),
    fecha_ingreso DATE,
    fecha_salida DATE,
    observaciones TEXT,
    CONSTRAINT docente_exp_fk FOREIGN KEY (id) REFERENCES docente(id)
);

/*LISTO*/
CREATE TABLE capacitacion (
    id VARCHAR(9),
    titulo VARCHAR(100),
    ies VARCHAR(100),
    horas INT,
    fecha DATE,
    descripcion TEXT,
    CONSTRAINT docente_capacitacion_fk FOREIGN KEY (id) REFERENCES docente(id)
);

/*LISTO*/
CREATE TABLE responsabilidad_opciones (
    id INT PRIMARY KEY, 
    cargo VARCHAR(100),
    descripcion TEXT
);

/*LISTO*/
CREATE TABLE responsabilidad (
    id VARCHAR(9), 
    responsabilidad INT,
    CONSTRAINT docente_responsabilidad_fk FOREIGN KEY (id) REFERENCES docente(id),
    CONSTRAINT responsabilidad_responsabilidad_fk FOREIGN KEY (responsabilidad) REFERENCES responsabilidad_opciones(id) 
);

/*LISTO*/
CREATE TABLE publicacion_cientifica (
    id VARCHAR(9),
    doi VARCHAR(100),
    titulo VARCHAR(100),
    año YEAR,
    ies VARCHAR(100),
    autor VARCHAR(100),
    CONSTRAINT docente_publi_fk FOREIGN KEY (id) REFERENCES docente(id)
);

/*LISTO*/
CREATE TABLE rol_opciones (
    id INT PRIMARY KEY,
    nombre VARCHAR(20),
    descripcion TEXT
);

/*LISTO*/
CREATE TABLE rol (
    id VARCHAR(9),
    rol INT,
    CONSTRAINT docente_rol_fk FOREIGN KEY (id) REFERENCES docente(id),
    CONSTRAINT rol_rol_fk FOREIGN KEY (rol) REFERENCES rol_opciones(id)
);

/*LISTO*/
CREATE TABLE areas_interes (
    id VARCHAR(9),
    tema VARCHAR(100),
    descripcion TEXT,
    CONSTRAINT docente_area_fk FOREIGN KEY (id) REFERENCES docente(id)
);

CREATE TABLE areas_conocimiento_opciones (
    id INT PRIMARY KEY,
    codigo VARCHAR(10),
    nombre VARCHAR(100)
);

CREATE TABLE areas_conocimiento (
    id VARCHAR(9),
    conocimiento INT,
    CONSTRAINT docente_areacon_fk FOREIGN KEY (id) REFERENCES docente(id),
    CONSTRAINT conocimiento_areacon_fk FOREIGN KEY (conocimiento) REFERENCES areas_conocimiento_opciones(id)
);