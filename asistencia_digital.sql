/*
 Navicat Premium Data Transfer

 Source Server         : idioma
 Source Server Type    : MySQL
 Source Server Version : 80039 (8.0.39)
 Source Host           : localhost:3306
 Source Schema         : asistencia_digital

 Target Server Type    : MySQL
 Target Server Version : 80039 (8.0.39)
 File Encoding         : 65001

 Date: 12/03/2025 13:34:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alumno
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno`  (
  `id_alumno` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_curso` int NOT NULL,
  PRIMARY KEY (`id_alumno`) USING BTREE,
  INDEX `id_curso`(`id_curso` ASC) USING BTREE,
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES (1, 'Juan', 'Pérez', 1);
INSERT INTO `alumno` VALUES (2, 'María', 'González', 1);
INSERT INTO `alumno` VALUES (3, 'Carlos', 'López', 1);
INSERT INTO `alumno` VALUES (4, 'Ana', 'Martínez', 1);
INSERT INTO `alumno` VALUES (5, 'Luis', 'Hernández', 1);
INSERT INTO `alumno` VALUES (6, 'Sofía', 'Díaz', 1);
INSERT INTO `alumno` VALUES (7, 'Miguel', 'Torres', 1);
INSERT INTO `alumno` VALUES (8, 'Laura', 'Ramírez', 1);
INSERT INTO `alumno` VALUES (9, 'Pedro', 'Sánchez', 1);
INSERT INTO `alumno` VALUES (10, 'Elena', 'Flores', 1);
INSERT INTO `alumno` VALUES (11, 'Andrés', 'Vargas', 1);
INSERT INTO `alumno` VALUES (12, 'Isabel', 'Rojas', 1);
INSERT INTO `alumno` VALUES (13, 'Diego', 'Morales', 1);
INSERT INTO `alumno` VALUES (14, 'Camila', 'Ortega', 1);
INSERT INTO `alumno` VALUES (15, 'Javier', 'Navarro', 1);
INSERT INTO `alumno` VALUES (16, 'Valentina', 'Mendoza', 1);
INSERT INTO `alumno` VALUES (17, 'Ricardo', 'Castillo', 1);
INSERT INTO `alumno` VALUES (18, 'Gabriela', 'Jiménez', 1);
INSERT INTO `alumno` VALUES (19, 'Emiliano', 'Reyes', 1);
INSERT INTO `alumno` VALUES (20, 'Fernanda', 'Silva', 1);

-- ----------------------------
-- Table structure for asistencia
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia`  (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `fecha` date NOT NULL,
  `id_estado` int NOT NULL,
  PRIMARY KEY (`id_asistencia`) USING BTREE,
  INDEX `id_alumno`(`id_alumno` ASC) USING BTREE,
  INDEX `id_estado`(`id_estado` ASC) USING BTREE,
  CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado_asistencia` (`id_estado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asistencia
-- ----------------------------

-- ----------------------------
-- Table structure for curso
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso`  (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_profesor` int NOT NULL,
  PRIMARY KEY (`id_curso`) USING BTREE,
  INDEX `id_profesor`(`id_profesor` ASC) USING BTREE,
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES (1, 'mate', 1);
INSERT INTO `curso` VALUES (2, 'Matemáticas', 1);
INSERT INTO `curso` VALUES (3, 'Historia', 1);
INSERT INTO `curso` VALUES (4, 'Física', 1);
INSERT INTO `curso` VALUES (5, 'Química', 1);
INSERT INTO `curso` VALUES (6, 'Biología', 1);
INSERT INTO `curso` VALUES (7, 'Lengua y Literatura', 1);
INSERT INTO `curso` VALUES (8, 'Geografía', 1);
INSERT INTO `curso` VALUES (9, 'Inglés', 1);
INSERT INTO `curso` VALUES (10, 'Educación Física', 1);
INSERT INTO `curso` VALUES (11, 'Arte', 1);
INSERT INTO `curso` VALUES (12, 'Música', 1);
INSERT INTO `curso` VALUES (13, 'Programación', 1);
INSERT INTO `curso` VALUES (14, 'Robótica', 1);
INSERT INTO `curso` VALUES (15, 'Economía', 1);
INSERT INTO `curso` VALUES (16, 'Psicología', 1);

-- ----------------------------
-- Table structure for entrega
-- ----------------------------
DROP TABLE IF EXISTS `entrega`;
CREATE TABLE `entrega`  (
  `id_entrega` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `id_evaluacion` int NOT NULL,
  `fecha_entrega` date NOT NULL,
  `calificacion` decimal(5, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_entrega`) USING BTREE,
  INDEX `id_alumno`(`id_alumno` ASC) USING BTREE,
  INDEX `id_evaluacion`(`id_evaluacion` ASC) USING BTREE,
  CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `entrega_chk_1` CHECK ((`calificacion` >= 0) and (`calificacion` <= 100))
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of entrega
-- ----------------------------

-- ----------------------------
-- Table structure for estado_asistencia
-- ----------------------------
DROP TABLE IF EXISTS `estado_asistencia`;
CREATE TABLE `estado_asistencia`  (
  `id_estado` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_estado`) USING BTREE,
  UNIQUE INDEX `descripcion`(`descripcion` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estado_asistencia
-- ----------------------------
INSERT INTO `estado_asistencia` VALUES (2, 'Ausente');
INSERT INTO `estado_asistencia` VALUES (3, 'Justificado');
INSERT INTO `estado_asistencia` VALUES (1, 'Presente');

-- ----------------------------
-- Table structure for evaluacion
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion`  (
  `id_evaluacion` int NOT NULL AUTO_INCREMENT,
  `id_curso` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_tipo` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_evaluacion`) USING BTREE,
  INDEX `id_curso`(`id_curso` ASC) USING BTREE,
  INDEX `id_tipo`(`id_tipo` ASC) USING BTREE,
  CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_evaluacion` (`id_tipo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------

-- ----------------------------
-- Table structure for participacion
-- ----------------------------
DROP TABLE IF EXISTS `participacion`;
CREATE TABLE `participacion`  (
  `id_participacion` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `fecha` date NOT NULL,
  `puntos` int NOT NULL,
  PRIMARY KEY (`id_participacion`) USING BTREE,
  INDEX `id_alumno`(`id_alumno` ASC) USING BTREE,
  CONSTRAINT `participacion_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `participacion_chk_1` CHECK (`puntos` >= 0)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of participacion
-- ----------------------------

-- ----------------------------
-- Table structure for profesor
-- ----------------------------
DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor`  (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contraseña` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_profesor`) USING BTREE,
  UNIQUE INDEX `correo`(`correo` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profesor
-- ----------------------------
INSERT INTO `profesor` VALUES (1, 'jose', 'Areche', 'dff@gmail.com', 'jose');

-- ----------------------------
-- Table structure for tipo_evaluacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_evaluacion`;
CREATE TABLE `tipo_evaluacion`  (
  `id_tipo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_tipo`) USING BTREE,
  UNIQUE INDEX `descripcion`(`descripcion` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_evaluacion
-- ----------------------------
INSERT INTO `tipo_evaluacion` VALUES (1, 'Examen');
INSERT INTO `tipo_evaluacion` VALUES (2, 'Proyecto');
INSERT INTO `tipo_evaluacion` VALUES (3, 'Tarea');

SET FOREIGN_KEY_CHECKS = 1;
