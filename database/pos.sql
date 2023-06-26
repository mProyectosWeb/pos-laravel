create database pos;

use pos;

create table categoria(
	id_categoria int auto_increment primary key,
    categoria varchar(50),
    descripcion varchar(250),
    estatus bool
) Engine InnoDB;

create table detalle_ingreso(
	id_detalle_ingreso int auto_increment primary key,
    id_ingreso int,
    id_producto int,
    cantidad int,
    precio_compra decimal(10,2),
    precio_venta decimal(10,2),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
    foreign key (id_ingreso) references ingreso(id_ingreso)
) Engine InnoDB;

create table detalle_venta(
	id_detalle_venta int auto_increment primary key,
    id_venta int,
    id_producto int,
    cantidad int,
    precio_venta decimal(10,2),
    descuento decimal(10,2),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
    foreign key (id_venta) references venta(id_venta)
) Engine InnoDB;



create table ingreso(
	id_ingreso int auto_increment primary key,
    id_proveedor int,
    tipo_comprobante varchar(20),
    num_comprobante varchar(10),
    fecha_hora datetime,
    impuesto decimal(10,2),
    estado varchar(30),
    foreign key (id_proveedor) references persona(id_persona)
) Engine InnoDB;

create table persona(
	id_persona int auto_increment primary key,
    tipo_persona varchar(20),
    nombre varchar(50),
    tipo_documento varchar(30),
    num_documento varchar(30),
    direccion varchar(50),
    telefono varchar(10),
    email varchar(50)
) Engine InnoDB;

create table productos(
	id_producto int auto_increment primary key,
    id_categoria int,
    codigo varchar(50),
    nombre varchar(100),
    stock int,
    descripcion varchar(100),
    imagen varchar(50),
    estatus varchar(20),
    foreign key (id_categoria) references categoria(id_categoria)
) Engine InnoDB;

create table venta(
	id_venta int auto_increment primary key,
    id_cliente int,
    tipo_comprobante varchar(30),
    num_comprobante varchar(30),
    fecha_hora datetime,
    impuesto decimal(10,2),
    total_venta decimal(10,2),
    estado varchar(30),
    foreign key (id_cliente) references persona(id_persona)
) Engine InnoDB;
