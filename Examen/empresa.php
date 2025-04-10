<?php

$typedb = "mysql";
$host = "localhost";
$user = "root";
$pw = "";
$dbname = new PDO($typedb . ":host=" . $host, $user, $pw);

/* Se crea la BD "Empresa" */
try {
  $create = $dbname->query("CREATE DATABASE IF NOT EXISTS empresa DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
  echo '<br>Creada base de datos con éxito</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}


/* Se crea la Tabla "personal" con las restricciones indicadas */

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("CREATE TABLE IF NOT EXISTS personal (
  codi INTEGER(4) PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(20) NOT NULL UNIQUE,
  cognoms VARCHAR(40) NOT NULL UNIQUE,
  data_naixement DATE,
  salari NUMERIC (6,2) CHECK(salari > 0)
) ENGINE=InnoDB;");
  echo '<br>Creada tabla con éxito</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

/* Insercion de datos dentro de la tabla personal */
try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Josep','Font',null,1867.56);");
  echo '<br>insertado Josep</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Jordi','Vila','1970-2-20',1243.06);");
  echo '<br>insertado Jordi</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Anna','Torner',null,1243.06);");
  echo '<br>insertado Annaa</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Miquel','Ferando',null,null);");
  echo '<br>insertado Miquel</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

/* Al intentar introducir los datos del empleado Carla, hay problemas con la restricción de que el apellido no puede ser nulo */

/* Se modifica la columna cognom para que pueda tener valor nulo */

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("ALTER TABLE personal MODIFY cognoms VARCHAR(40) ");
  echo '<br>--Modificado cognoms--</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Carla',null,'1968-4-13',1765);");
  echo '<br>insertado Carla</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Gerard','Codina','1974-5-27',1402.89);");
  echo '<br>insertado Gerard</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}


/* modificar cognom para que no sea unique, para ello se ha borrado el index de cognom */
try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("DROP INDEX cognoms ON personal");
  echo '<br>--Modificado cognoms borrando index--</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}
/* Para insertar a Mercè Vila se le ha asignado un códi=7, ya que siendo codi la PRIMARY KEY no puede repetirse  */
 try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES ('7','Mercè','Vila','1978-6-27',1765);");
  echo '<br>insertado Mercè</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}
/* modificar nom para que no sea unique, para ello se ha borrado el index de nom */
try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("DROP INDEX nom ON personal");
  echo '<br>Cambiado nom</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

 try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Anna',null,'1973-2-1',null);");
  echo '<br>insertado Anna</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}
 

 try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES ('15','Marta','Casas',null,null);");
  echo '<br>insertado Marta</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

 try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Joel','Codina','1981-2-14','1402.89');");
  echo '<br>insertado Joel</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

/* hay que modificar las restricciones de salario para insertar a la trabajadora Marta */
try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("ALTER TABLE personal MODIFY salari VARCHAR(15) ");
  echo '<br>--Modificado salari-- </br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}

 try {
  $create = $dbname->query("USE empresa;");
  $create = $dbname->query("INSERT INTO personal VALUES (null,'Marta','Pérez','1992-2-20',0);");
  echo '<br>insertado Marta</br>';
} catch (PDOException $exception) {
  echo $exception->getMessage();
}
