Estos scrappers los hice a finales del 2011-principios del 2012, sirven para extraer y clasificar la información de la página oficial de los diputables (http://www.diputados.gob.mx/inicio.htm), incluyo el diseño de la base de datos que está en MySQL Workbench, pero al igual incluyo el archivo .sql con los datos de todos los diputados de la legislatura 2009-2012.
La verdad no recuerdo al 100% como funciona, pero es cuestión de hecharle una revisada y lo hechamos a andar, la última vez que lo intenté fué con la legislatura actual y funcionó de maravilla.

* comisiones.php saca las comisiones y las almacena en la tabla comisiones.php se nutre con 
 * //http://sitl.diputados.gob.mx/LXII_leg/listado_de_comisioneslxii.php?tct=1
 * //http://sitl.diputados.gob.mx/LXII_leg/listado_de_comisioneslxii.php?tct=2

* distritos.php saca estados, ciudades por estado, y distritos por ciudad 
 * http://www.ife.org.mx/documentos/DISTRITOS/planos_distritales_seccionales.html
 
* index.php saca los diputados por estado y distrito, 
 * se nutre de http://sitl.diputados.gob.mx/LXII_leg/listado_diputados_gpnp.php?tipot=TOTAL

* iniciativas.php un pequeño ejemplo, fué el script inicial, comparó iniciativas de 30 diputados y 14 las tenían repetidas, de eso derivó la inquietud de hacer los demás scrappers, 
este script 

* integrantes.php saca los integrantes de cada comision y los almacena en bbdd

* iniciativasComision.php este mounstruo es el que saca todas las iniciativas, las clasifica y las almacena, recorre las comisiones que se sacaron con comisiones.php, ahí viene el link

* El proyecto original está en: https://github.com/sigues/diputador