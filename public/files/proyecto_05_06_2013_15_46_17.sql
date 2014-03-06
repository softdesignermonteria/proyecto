
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `access_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(24) NOT NULL DEFAULT '',
  `resource` varchar(32) NOT NULL DEFAULT '',
  `action` varchar(32) NOT NULL DEFAULT '',
  `allow` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `access_list` WRITE;
/*!40000 ALTER TABLE `access_list` DISABLE KEYS */;
INSERT INTO `access_list` VALUES (1,'administrador','*','*','Y'),(2,'restringido','*','*','N');
/*!40000 ALTER TABLE `access_list` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nombre_completo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `role` varchar(30) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AVG_ROW_LENGTH=16384 ROW_FORMAT=DYNAMIC COMMENT='TABLA DE ADMIN';
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (3,'admin','21232f297a57a5a743894a0e4a801fc3','Harold Florez','administrador');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aplicacion` varchar(50) DEFAULT NULL,
  `posicion` varchar(20) NOT NULL DEFAULT 'encabezado',
  `posicion_x` int(11) NOT NULL DEFAULT '0',
  `posicion_y` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tittle` varchar(100) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=321 COMMENT='TABLA DE MENU DE USUARIOS';
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'default','left',1,0,1,'Inicio','Menu de Imagen','home/aplicaciones/'),(2,'default','left',100,0,100,'Cerrar Session','Cerrar Session','login/salir'),(3,'default','left',10,0,3,'Investigacion','Agregar Proyectos de Investigacion','#'),(4,'default','left',0,10,1,'Proyecto Investigacion','Agregar Proyectos de Investigacion','proyecto_de_investigacion/'),(5,'default','left',0,10,3,'Grupos de Investigacion','Agregar Grupos de Investigacion','grupos_de_investigacion/'),(6,'default','left',0,10,4,'Productos Investigacion','Agregar Productos de Investigacion','productos_de_investigacion/'),(8,'default','left',0,10,5,'Redes de Cooperacion','Agregar Redes de Cooperacion','redes_de_cooperacion/'),(9,'default','left',9,0,9,'Entidades Territoriales','Agregar Ent. Terrortoriales Mun - Dpt - Pais','#'),(10,'default','left',0,9,1,'Pais','Agregar Paises','pais/'),(11,'default','left',0,9,2,'Departamentos','Agregar Departamentos','departamentos/'),(12,'default','left',0,9,3,'Municipios','Agregar Municipios','municipios/'),(13,'default','left',8,0,1,'Financiacion y Gastos','Agregar Tipos de Financiacion y Gastos','#'),(14,'default','left',0,8,2,'Financiacion Nacional','Agregar Financiacion Nacional','fuentes_de_financiacion_nacional/'),(15,'default','left',0,8,3,'Financiacion Internacional','Agregar Fuentes de Financiacion Internacional','fuentes_de_financiacion_internacional/'),(16,'default','left',0,8,4,'Tipos de Gasto','Agregar Tipos de Gastos','tipos_de_gastos/');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_actividades_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_actividades_investigacion` (
  `Cod_Actividades_Investigacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Actividades_Investigacion` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Actividades_Investigacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_actividades_investigacion` WRITE;
/*!40000 ALTER TABLE `tbl_actividades_investigacion` DISABLE KEYS */;
INSERT INTO `tbl_actividades_investigacion` VALUES (2,'Actividades de administración y otras actividades de apoyo');
/*!40000 ALTER TABLE `tbl_actividades_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_centros_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_centros_investigacion` (
  `Cod_Centro_Investigacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Centro_Investigacion` varchar(255) NOT NULL DEFAULT '',
  `FK_Cod_IES` int(11) DEFAULT NULL,
  `FK_Cod_Municipio` int(11) NOT NULL,
  `Fecha_Creacion_Centro_Investigacion` varchar(10) DEFAULT NULL,
  `Fecha_Adicion_Grupo` varchar(10) NOT NULL DEFAULT '',
  `Fecha_Retiro_Grupo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Cod_Centro_Investigacion`),
  KEY `FK_Tbl_Centros_Investigacion_Tbl_IES` (`FK_Cod_IES`),
  KEY `FK_Tbl_Centros_Investigacion_Tbl_Municipio` (`FK_Cod_Municipio`),
  CONSTRAINT `FK_Tbl_Centros_Investigacion_Tbl_IES` FOREIGN KEY (`FK_Cod_IES`) REFERENCES `tbl_ies` (`Cod_IES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Centros_Investigacion_Tbl_Municipio` FOREIGN KEY (`FK_Cod_Municipio`) REFERENCES `tbl_municipio` (`Cod_Municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_centros_investigacion` WRITE;
/*!40000 ALTER TABLE `tbl_centros_investigacion` DISABLE KEYS */;
INSERT INTO `tbl_centros_investigacion` VALUES (1,'CI_USB',1001,1,'2013-01-01','2013-01-01',NULL);
/*!40000 ALTER TABLE `tbl_centros_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_centros_investigacion_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_centros_investigacion_proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Proyecto` int(11) NOT NULL,
  `Cod_Centro_Investigacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Centros_Investigacion_Proyectos_Tbl_Centros_Investigacion` (`Cod_Centro_Investigacion`),
  KEY `FK_Tbl_Centros_Investigacion_Proyectos_Tbl_Proyecto` (`Cod_Proyecto`),
  CONSTRAINT `FK_Tbl_Centros_Investigacion_Proyectos_Tbl_Centros_Investigacion` FOREIGN KEY (`Cod_Centro_Investigacion`) REFERENCES `tbl_centros_investigacion` (`Cod_Centro_Investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Centros_Investigacion_Proyectos_Tbl_Proyecto` FOREIGN KEY (`Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_centros_investigacion_proyectos` WRITE;
/*!40000 ALTER TABLE `tbl_centros_investigacion_proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_centros_investigacion_proyectos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_departamento` (
  `Cod_Departamento` int(11) NOT NULL AUTO_INCREMENT,
  `Departamento` varchar(255) NOT NULL DEFAULT '',
  `FK_Cod_Pais` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Departamento`),
  KEY `FK_Tbl_Departamento_Tbl_Pais` (`FK_Cod_Pais`),
  CONSTRAINT `FK_Tbl_Departamento_Tbl_Pais` FOREIGN KEY (`FK_Cod_Pais`) REFERENCES `tbl_pais` (`Cod_Pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_departamento` WRITE;
/*!40000 ALTER TABLE `tbl_departamento` DISABLE KEYS */;
INSERT INTO `tbl_departamento` VALUES (1,'Antioquia',1);
/*!40000 ALTER TABLE `tbl_departamento` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_entidades_integrantes_red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_entidades_integrantes_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Entidad_Integrante_Red` varchar(50) NOT NULL DEFAULT '',
  `Fecha_Creacion_Entidad_Integrante_Red` varchar(10) NOT NULL DEFAULT '',
  `FK_Cod_Sector_Entidad` int(11) NOT NULL,
  `FK_Cod_Pais` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Entidades_Integrantes_Red_Tbl_Sector_Entidad` (`FK_Cod_Sector_Entidad`),
  CONSTRAINT `FK_Tbl_Entidades_Integrantes_Red_Tbl_Sector_Entidad` FOREIGN KEY (`FK_Cod_Sector_Entidad`) REFERENCES `tbl_sector_entidad` (`Cod_Sector_Entidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_entidades_integrantes_red` WRITE;
/*!40000 ALTER TABLE `tbl_entidades_integrantes_red` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_entidades_integrantes_red` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_financiacion_nacional_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_financiacion_nacional_proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Cod_Fuente_F_Nacional` int(11) NOT NULL,
  `FK_Cod_Proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Financiacion_Nacional_Proyecto_Tbl_Fuente_Financiacion_Na` (`FK_Cod_Fuente_F_Nacional`),
  KEY `FK_Tbl_Financiacion_Nacional_Proyecto_Tbl_Proyecto` (`FK_Cod_Proyecto`),
  CONSTRAINT `FK_Tbl_Financiacion_Nacional_Proyecto_Tbl_Fuente_Financiacion_Na` FOREIGN KEY (`FK_Cod_Fuente_F_Nacional`) REFERENCES `tbl_fuente_financiacion_nacional` (`Cod_Fuente_Financiacion_Nacional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Financiacion_Nacional_Proyecto_Tbl_Proyecto` FOREIGN KEY (`FK_Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_financiacion_nacional_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_financiacion_nacional_proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_financiacion_nacional_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_fuente_f_internacional_actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fuente_f_internacional_actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Cod_Fuente_F_Internacional` int(11) NOT NULL,
  `FK_Cod_Actividades_Investigacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Fuente_F_Internacional_Actividades_Tbl_Actividades_Invest` (`FK_Cod_Fuente_F_Internacional`),
  CONSTRAINT `FK_Tbl_Fuente_F_Internacional_Actividades_Tbl_Actividades_Invest` FOREIGN KEY (`FK_Cod_Fuente_F_Internacional`) REFERENCES `tbl_actividades_investigacion` (`Cod_Actividades_Investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_fuente_f_internacional_actividades` WRITE;
/*!40000 ALTER TABLE `tbl_fuente_f_internacional_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fuente_f_internacional_actividades` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_fuente_f_internacional_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fuente_f_internacional_proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Cod_Fuente_F_Internacional` int(11) NOT NULL,
  `FK_Cod_Proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Fuente_F_Internacional_Proyecto_Tbl_Fuente_Financiacion_I` (`FK_Cod_Fuente_F_Internacional`),
  KEY `FK_Tbl_Fuente_F_Internacional_Proyecto_Tbl_Proyecto` (`FK_Cod_Proyecto`),
  CONSTRAINT `FK_Tbl_Fuente_F_Internacional_Proyecto_Tbl_Fuente_Financiacion_I` FOREIGN KEY (`FK_Cod_Fuente_F_Internacional`) REFERENCES `tbl_fuente_financiacion_internacional` (`Cod_Fuente_Financiacion_Internacional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Fuente_F_Internacional_Proyecto_Tbl_Proyecto` FOREIGN KEY (`FK_Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_fuente_f_internacional_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_fuente_f_internacional_proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fuente_f_internacional_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_fuente_f_nacional_actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fuente_f_nacional_actividades` (
  `id` int(11) NOT NULL,
  `FK_Cod_Fuente_F_Nacional` int(11) NOT NULL,
  `FK_Cod_Actividades_Investigacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Fuente_F_Nacional_Actividades_Tbl_Actividades_Investigaci` (`FK_Cod_Fuente_F_Nacional`),
  CONSTRAINT `FK_Tbl_Fuente_F_Nacional_Actividades_Tbl_Actividades_Investigaci` FOREIGN KEY (`FK_Cod_Fuente_F_Nacional`) REFERENCES `tbl_actividades_investigacion` (`Cod_Actividades_Investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_fuente_f_nacional_actividades` WRITE;
/*!40000 ALTER TABLE `tbl_fuente_f_nacional_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fuente_f_nacional_actividades` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_fuente_financiacion_internacional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fuente_financiacion_internacional` (
  `Cod_Fuente_Financiacion_Internacional` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Fuente_Financiacion_Internacional` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Fuente_Financiacion_Internacional`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_fuente_financiacion_internacional` WRITE;
/*!40000 ALTER TABLE `tbl_fuente_financiacion_internacional` DISABLE KEYS */;
INSERT INTO `tbl_fuente_financiacion_internacional` VALUES (1,'Sector Empresarial'),(2,'Sector Administración Pública'),(3,'Centros de Investigación y Desarrollo Tecnológico'),(4,'Hospitales y Clínicas'),(5,'Instituciones privadas sin ánimo de lucro'),(6,'Instituciones de Educación Superior'),(7,'Fuente Internacional Del Comercio');
/*!40000 ALTER TABLE `tbl_fuente_financiacion_internacional` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_fuente_financiacion_nacional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fuente_financiacion_nacional` (
  `Cod_Fuente_Financiacion_Nacional` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Fuente_Financiacion_Nacional` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Fuente_Financiacion_Nacional`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_fuente_financiacion_nacional` WRITE;
/*!40000 ALTER TABLE `tbl_fuente_financiacion_nacional` DISABLE KEYS */;
INSERT INTO `tbl_fuente_financiacion_nacional` VALUES (1,'Recursos Personales'),(2,'Recursos IES'),(3,'Recursos públicos nacionales ? Colciencias');
/*!40000 ALTER TABLE `tbl_fuente_financiacion_nacional` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gastos` (
  `Cod_Gasto` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Proyecto` int(11) NOT NULL,
  `Valor_Gastos` decimal(19,4) NOT NULL,
  `FK_Cod_Tipo_Gastos` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Gasto`),
  KEY `FK_Tbl_Gastos_Tbl_Proyecto` (`Cod_Proyecto`),
  KEY `FK_Tbl_Gastos_Tbl_Tipo_Gasto` (`FK_Cod_Tipo_Gastos`),
  CONSTRAINT `FK_Tbl_Gastos_Tbl_Proyecto` FOREIGN KEY (`Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Gastos_Tbl_Tipo_Gasto` FOREIGN KEY (`FK_Cod_Tipo_Gastos`) REFERENCES `tbl_tipo_gasto` (`Cod_Tipo_Gasto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_gastos` WRITE;
/*!40000 ALTER TABLE `tbl_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gastos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_grupo_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_grupo_investigacion` (
  `Cod_Grupo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Grupo` longtext NOT NULL,
  `Fecha_Creacion_Grupo_I` date DEFAULT NULL,
  `Fecha_Vigencia_Grupo_I` date DEFAULT NULL,
  `FK_Cod_NBC` int(11) DEFAULT NULL,
  `FK_Cod_IES` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Grupo`),
  KEY `FK_Tbl_Grupo_Investigacion_Tbl_IES` (`FK_Cod_IES`),
  KEY `FK_Tbl_Grupo_Investigacion_Tbl_NBC` (`FK_Cod_NBC`),
  CONSTRAINT `FK_Tbl_Grupo_Investigacion_Tbl_IES` FOREIGN KEY (`FK_Cod_IES`) REFERENCES `tbl_ies` (`Cod_IES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Grupo_Investigacion_Tbl_NBC` FOREIGN KEY (`FK_Cod_NBC`) REFERENCES `tbl_nbc` (`Cod_NBC`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_grupo_investigacion` WRITE;
/*!40000 ALTER TABLE `tbl_grupo_investigacion` DISABLE KEYS */;
INSERT INTO `tbl_grupo_investigacion` VALUES (1,'grupo de prueba','2012-01-01','2015-01-01',1,1001);
/*!40000 ALTER TABLE `tbl_grupo_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_grupo_investigacion_investigadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_grupo_investigacion_investigadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Grupo_Investigacion` int(11) NOT NULL,
  `Identificacion_Investigador` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Grupo_Investigacion_Investigadores_Tbl_Grupo_Investigacio` (`Cod_Grupo_Investigacion`),
  KEY `FK_Tbl_Grupo_Investigacion_Investigadores_Tbl_Investigador` (`Identificacion_Investigador`),
  CONSTRAINT `FK_Tbl_Grupo_Investigacion_Investigadores_Tbl_Grupo_Investigacio` FOREIGN KEY (`Cod_Grupo_Investigacion`) REFERENCES `tbl_grupo_investigacion` (`Cod_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Grupo_Investigacion_Investigadores_Tbl_Investigador` FOREIGN KEY (`Identificacion_Investigador`) REFERENCES `tbl_investigador` (`Indentificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_grupo_investigacion_investigadores` WRITE;
/*!40000 ALTER TABLE `tbl_grupo_investigacion_investigadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_grupo_investigacion_investigadores` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_grupos_inv_centros_inv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_grupos_inv_centros_inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Grupo_Inv` int(11) NOT NULL,
  `Cod_Centro_Inv` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Grupos_Inv_Centros_Inv_Tbl_Centros_Investigacion` (`Cod_Centro_Inv`),
  KEY `FK_Tbl_Grupos_Inv_Centros_Inv_Tbl_Grupo_Investigacion` (`Cod_Grupo_Inv`),
  CONSTRAINT `FK_Tbl_Grupos_Inv_Centros_Inv_Tbl_Centros_Investigacion` FOREIGN KEY (`Cod_Centro_Inv`) REFERENCES `tbl_centros_investigacion` (`Cod_Centro_Investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Grupos_Inv_Centros_Inv_Tbl_Grupo_Investigacion` FOREIGN KEY (`Cod_Grupo_Inv`) REFERENCES `tbl_grupo_investigacion` (`Cod_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_grupos_inv_centros_inv` WRITE;
/*!40000 ALTER TABLE `tbl_grupos_inv_centros_inv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_grupos_inv_centros_inv` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_grupos_investigacion_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_grupos_investigacion_proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Proyecto` int(11) NOT NULL,
  `Cod_Grupo_Investigacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Grupos_Investigacion_Proyectos_Tbl_Grupo_Investigacion` (`Cod_Grupo_Investigacion`),
  KEY `FK_Tbl_Grupos_Investigacion_Proyectos_Tbl_Proyecto` (`Cod_Proyecto`),
  CONSTRAINT `FK_Tbl_Grupos_Investigacion_Proyectos_Tbl_Grupo_Investigacion` FOREIGN KEY (`Cod_Grupo_Investigacion`) REFERENCES `tbl_grupo_investigacion` (`Cod_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Grupos_Investigacion_Proyectos_Tbl_Proyecto` FOREIGN KEY (`Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_grupos_investigacion_proyectos` WRITE;
/*!40000 ALTER TABLE `tbl_grupos_investigacion_proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_grupos_investigacion_proyectos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_ies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ies` (
  `Cod_IES` int(11) NOT NULL,
  `Nombre_IES` longtext NOT NULL,
  PRIMARY KEY (`Cod_IES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_ies` WRITE;
/*!40000 ALTER TABLE `tbl_ies` DISABLE KEYS */;
INSERT INTO `tbl_ies` VALUES (1001,'Unviersidad de San Buenaventura Medellin2'),(1002,'IES DE PRUEBA');
/*!40000 ALTER TABLE `tbl_ies` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_investigador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_investigador` (
  `Indentificacion` varchar(50) NOT NULL DEFAULT '',
  `PrimerNombre` varchar(50) NOT NULL DEFAULT '',
  `SegundoNombre` varchar(50) NOT NULL DEFAULT '',
  `PrimerApellido` varchar(50) NOT NULL DEFAULT '',
  `SegundoApellido` varchar(50) NOT NULL DEFAULT '',
  `FK_Cod_IES` int(11) DEFAULT NULL,
  `FK_Cod_NBC` int(11) DEFAULT NULL,
  `FK_Cod_Nivel_Educativo` int(11) DEFAULT NULL,
  `FK_Cod_Tipo_Participacion_Proyecto` int(11) NOT NULL,
  PRIMARY KEY (`Indentificacion`),
  KEY `FK_Tbl_Investigador_Tbl_IES` (`FK_Cod_IES`),
  KEY `FK_Tbl_Investigador_Tbl_NBC` (`FK_Cod_NBC`),
  KEY `FK_Tbl_Investigador_Tbl_Nivel_Educativo` (`FK_Cod_Nivel_Educativo`),
  KEY `FK_Tbl_Investigador_Tbl_Tipo_Participacion_Proyecto` (`FK_Cod_Tipo_Participacion_Proyecto`),
  CONSTRAINT `FK_Tbl_Investigador_Tbl_IES` FOREIGN KEY (`FK_Cod_IES`) REFERENCES `tbl_ies` (`Cod_IES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Investigador_Tbl_NBC` FOREIGN KEY (`FK_Cod_NBC`) REFERENCES `tbl_nbc` (`Cod_NBC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Investigador_Tbl_Nivel_Educativo` FOREIGN KEY (`FK_Cod_Nivel_Educativo`) REFERENCES `tbl_nivel_educativo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Investigador_Tbl_Tipo_Participacion_Proyecto` FOREIGN KEY (`FK_Cod_Tipo_Participacion_Proyecto`) REFERENCES `tbl_tipo_participacion_proyecto` (`Cod_Tipo_Participacion_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_investigador` WRITE;
/*!40000 ALTER TABLE `tbl_investigador` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_investigador` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_municipio` (
  `Cod_Municipio` int(11) NOT NULL AUTO_INCREMENT,
  `Municipio` varchar(255) NOT NULL DEFAULT '',
  `FK_Cod_Departamento` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Municipio`),
  KEY `FK_Tbl_Municipio_Tbl_Departamento` (`FK_Cod_Departamento`),
  CONSTRAINT `FK_Tbl_Municipio_Tbl_Departamento` FOREIGN KEY (`FK_Cod_Departamento`) REFERENCES `tbl_departamento` (`Cod_Departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_municipio` WRITE;
/*!40000 ALTER TABLE `tbl_municipio` DISABLE KEYS */;
INSERT INTO `tbl_municipio` VALUES (1,'Medellin',1),(2,'Bello',1),(3,'Abejorral',1),(4,'Necocli',1);
/*!40000 ALTER TABLE `tbl_municipio` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_nbc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nbc` (
  `Cod_NBC` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_NBC` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_NBC`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_nbc` WRITE;
/*!40000 ALTER TABLE `tbl_nbc` DISABLE KEYS */;
INSERT INTO `tbl_nbc` VALUES (1,'Agronomia Veterinaria');
/*!40000 ALTER TABLE `tbl_nbc` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_nivel_educativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel_educativo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_nivel_educativo` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_educativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nivel_educativo` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_objetivo_socioeconomico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_objetivo_socioeconomico` (
  `Cod_Objetivo_Socioeconomico` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Objetivo_Socioeconomico` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Objetivo_Socioeconomico`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_objetivo_socioeconomico` WRITE;
/*!40000 ALTER TABLE `tbl_objetivo_socioeconomico` DISABLE KEYS */;
INSERT INTO `tbl_objetivo_socioeconomico` VALUES (1,'Exploración y explotación de la tierra'),(2,'Infraestructuras y ordenación del territorio'),(3,'Control y protección del medio ambiente'),(4,'Protección y mejora de la salud humana'),(5,'Exploración y explotación de la tierra'),(6,'Producción y tecnología agrícola'),(7,'Producción y tecnología industrial'),(8,'Estructuras y relaciones sociales'),(9,'Exploración y explotación del espacio'),(10,'Investigaciones financiadas con los fondos generales de las universidades'),(11,'Investigación no orientada'),(12,'Otras investigaciones civiles'),(13,'Defensa');
/*!40000 ALTER TABLE `tbl_objetivo_socioeconomico` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pais` (
  `Cod_Pais` int(11) NOT NULL,
  `Nombre_Pais` longtext NOT NULL,
  PRIMARY KEY (`Cod_Pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_pais` WRITE;
/*!40000 ALTER TABLE `tbl_pais` DISABLE KEYS */;
INSERT INTO `tbl_pais` VALUES (1,'Colombia');
/*!40000 ALTER TABLE `tbl_pais` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_producto_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_producto_investigacion` (
  `Cod_Producto_Investigacion` int(11) NOT NULL,
  `Descripcion_Producto_Investigacion` char(10) DEFAULT NULL,
  `Año_Obtecion` int(11) DEFAULT NULL,
  `Mes_Obtencion` int(11) DEFAULT NULL,
  `FK_Tipo_Producto` int(11) DEFAULT NULL,
  `FK_NBC` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cod_Producto_Investigacion`),
  KEY `FK_Tbl_Producto_Investigacion_Tipo_Producto_Investigacion` (`FK_Tipo_Producto`),
  CONSTRAINT `FK_Tbl_Producto_Investigacion_Tipo_Producto_Investigacion` FOREIGN KEY (`FK_Tipo_Producto`) REFERENCES `tipo_producto_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_producto_investigacion` WRITE;
/*!40000 ALTER TABLE `tbl_producto_investigacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_producto_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_proyecto` (
  `Cod_Proyecto` int(11) NOT NULL,
  `FK_Cod_IES` int(11) DEFAULT NULL,
  `Titulo_Proyecto` longtext NOT NULL,
  `Fecha_Inicio_Proyecto` date NOT NULL,
  `FK_Tipo_Proyecto` int(11) DEFAULT NULL,
  `Duracion_Proyecto` int(11) NOT NULL,
  `FK_Cod_Objeto_Socieconomico` int(11) DEFAULT NULL,
  `Objetivo_Proyecto` longtext NOT NULL,
  `Resumen_Proyecto` longtext,
  `Resultados_Esperados` longtext NOT NULL,
  `Valor_Proyecto` decimal(19,4) NOT NULL,
  PRIMARY KEY (`Cod_Proyecto`),
  KEY `FK_Tbl_Proyecto_Tbl_IES` (`FK_Cod_IES`),
  KEY `FK_Tbl_Proyecto_Tbl_Objetivo_Socioeconomico` (`FK_Cod_Objeto_Socieconomico`),
  KEY `FK_Tbl_Proyecto_Tbl_Tipo_Proyecto` (`FK_Tipo_Proyecto`),
  CONSTRAINT `FK_Tbl_Proyecto_Tbl_IES` FOREIGN KEY (`FK_Cod_IES`) REFERENCES `tbl_ies` (`Cod_IES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Proyecto_Tbl_Objetivo_Socioeconomico` FOREIGN KEY (`FK_Cod_Objeto_Socieconomico`) REFERENCES `tbl_objetivo_socioeconomico` (`Cod_Objetivo_Socioeconomico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Proyecto_Tbl_Tipo_Proyecto` FOREIGN KEY (`FK_Tipo_Proyecto`) REFERENCES `tbl_tipo_proyecto` (`Cod_Tipo_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_proyecto_porducto_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_proyecto_porducto_investigacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Proyecto` int(11) NOT NULL,
  `Cod_Producto_Investigacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Proyecto_Porducto_Investigacion_Tbl_Producto_Investigacio` (`Cod_Producto_Investigacion`),
  KEY `FK_Tbl_Proyecto_Porducto_Investigacion_Tbl_Proyecto` (`Cod_Proyecto`),
  CONSTRAINT `FK_Tbl_Proyecto_Porducto_Investigacion_Tbl_Producto_Investigacio` FOREIGN KEY (`Cod_Producto_Investigacion`) REFERENCES `tbl_producto_investigacion` (`Cod_Producto_Investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Proyecto_Porducto_Investigacion_Tbl_Proyecto` FOREIGN KEY (`Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_proyecto_porducto_investigacion` WRITE;
/*!40000 ALTER TABLE `tbl_proyecto_porducto_investigacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_proyecto_porducto_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_red_cooperacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_red_cooperacion` (
  `Cod_Red_Cooperacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Red_Cooperacion` longtext NOT NULL,
  `FK_Cod_IES` int(11) NOT NULL,
  `FK_Cod_NBC` int(11) NOT NULL,
  `Fecha_Creacion_Red_Cooperacion` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Red_Cooperacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_red_cooperacion` WRITE;
/*!40000 ALTER TABLE `tbl_red_cooperacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_red_cooperacion` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_red_cooperacion_integrantes_red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_red_cooperacion_integrantes_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Cod_Red_Cooperacion` int(11) NOT NULL,
  `FK_Id_Entidades_Integrantes_Red` int(11) NOT NULL,
  `Fecha_Adicion` varchar(10) NOT NULL DEFAULT '',
  `Fecha_Retiro` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Red_Cooperacion_Integrantes_Red_Tbl_Entidades_Integrantes` (`FK_Id_Entidades_Integrantes_Red`),
  KEY `FK_Tbl_Red_Cooperacion_Integrantes_Red_Tbl_Red_Cooperacion` (`FK_Cod_Red_Cooperacion`),
  CONSTRAINT `FK_Tbl_Red_Cooperacion_Integrantes_Red_Tbl_Entidades_Integrantes` FOREIGN KEY (`FK_Id_Entidades_Integrantes_Red`) REFERENCES `tbl_entidades_integrantes_red` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Red_Cooperacion_Integrantes_Red_Tbl_Red_Cooperacion` FOREIGN KEY (`FK_Cod_Red_Cooperacion`) REFERENCES `tbl_red_cooperacion` (`Cod_Red_Cooperacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_red_cooperacion_integrantes_red` WRITE;
/*!40000 ALTER TABLE `tbl_red_cooperacion_integrantes_red` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_red_cooperacion_integrantes_red` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_red_cooperacion_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_red_cooperacion_proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Proyecto` int(11) NOT NULL,
  `Cod_Red_Cooperacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Tbl_Red_Cooperacion_Proyecto_Tbl_Proyecto` (`Cod_Proyecto`),
  KEY `FK_Tbl_Red_Cooperacion_Proyecto_Tbl_Red_Cooperacion` (`Cod_Red_Cooperacion`),
  CONSTRAINT `FK_Tbl_Red_Cooperacion_Proyecto_Tbl_Proyecto` FOREIGN KEY (`Cod_Proyecto`) REFERENCES `tbl_proyecto` (`Cod_Proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tbl_Red_Cooperacion_Proyecto_Tbl_Red_Cooperacion` FOREIGN KEY (`Cod_Red_Cooperacion`) REFERENCES `tbl_red_cooperacion` (`Cod_Red_Cooperacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_red_cooperacion_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_red_cooperacion_proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_red_cooperacion_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_sector_entidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sector_entidad` (
  `Cod_Sector_Entidad` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Cod_IES` int(11) NOT NULL,
  `FK_Cod_Pais` int(11) NOT NULL,
  `Descripcion_Sector_Entidad` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Sector_Entidad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_sector_entidad` WRITE;
/*!40000 ALTER TABLE `tbl_sector_entidad` DISABLE KEYS */;
INSERT INTO `tbl_sector_entidad` VALUES (1,1,1,'Sector Empresarial'),(2,2,2,'Sector Administración Pública'),(3,3,3,'Centros de Investigación y Desarrollo Tecnológico'),(4,4,4,'Hospitales y Clínicas'),(5,5,5,'Instituciones privadas sin ánimo de lucro'),(6,6,6,'Instituciones de Educación Superior'),(7,7,7,'Sector extranjero');
/*!40000 ALTER TABLE `tbl_sector_entidad` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_tipo_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_gasto` (
  `Cod_Tipo_Gasto` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Tipo_Gasto` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Tipo_Gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_tipo_gasto` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_gasto` DISABLE KEYS */;
INSERT INTO `tbl_tipo_gasto` VALUES (1,'Intramuros - Corrientes'),(2,'Intramuros - Capital'),(3,'Extramuros'),(4,'Mantenimiento de equipos'),(5,'Compra de portatil');
/*!40000 ALTER TABLE `tbl_tipo_gasto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_tipo_participacion_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_participacion_proyecto` (
  `Cod_Tipo_Participacion_Proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Tipo_Participacion_Proyecto` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Tipo_Participacion_Proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_tipo_participacion_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_participacion_proyecto` DISABLE KEYS */;
INSERT INTO `tbl_tipo_participacion_proyecto` VALUES (1,'Director de Proyecto'),(2,'Investigador Principal'),(3,'CoInvestigador'),(4,'Investigador'),(5,'Asesor'),(6,'Estudiante - Joven Investigador'),(7,'Estudiante - Semillero'),(8,'Auxiliar - Joven Investigador'),(9,'Auxiliar - Semillero');
/*!40000 ALTER TABLE `tbl_tipo_participacion_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tbl_tipo_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_proyecto` (
  `Cod_Tipo_Proyecto` int(11) NOT NULL,
  `Descripcion_Tipo_Proyecto` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cod_Tipo_Proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tbl_tipo_proyecto` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_proyecto` DISABLE KEYS */;
INSERT INTO `tbl_tipo_proyecto` VALUES (1,'Investigación'),(3,'Servicios de Recolección de Datos Científicos'),(4,'Servicios de Información'),(5,'Servicios de Estudios para la Planeación y Formulación de Políticas'),(6,'Servicios de Estudios de Factibilidad o viabilidad'),(7,'Servicios de Ensayos, Normalización, Metodología y Control de Calidad'),(8,'Otros Servicios'),(10,'Imnovacionmmmm');
/*!40000 ALTER TABLE `tbl_tipo_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tipo_producto_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_producto_investigacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Tipo_Investigacion` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tipo_producto_investigacion` WRITE;
/*!40000 ALTER TABLE `tipo_producto_investigacion` DISABLE KEYS */;
INSERT INTO `tipo_producto_investigacion` VALUES (1,'Artículos de Investigación'),(2,'Libros de investigación'),(3,'Capítulos de libro'),(4,'Productos o procesos tecnológicos patentados o registrados'),(5,'Productos o procesos tecnológicos usualmente no patentables o protegidas por secreto industrial'),(6,'Normas basadas en los resultados de investigación'),(7,'Literatura gris y otros productos no certificados'),(8,'Tesis y trabajos de grado'),(9,'Participación en programas académicos de postgrado'),(10,'Productos asociados a servicios técnicos o consultoría cualificada'),(11,'Productos de divulgación o popularización de resultados de investigación');
/*!40000 ALTER TABLE `tipo_producto_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

