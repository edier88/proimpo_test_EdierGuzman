
# Prueba aptitudes técnicas Proimpo

## Descripción:
El presente proyecto es una prueba técnica presentada a la empresa Proimpo.
Este proyecto se hizo con PHP 7.3, JavaScript y MySQL 8. Aunque el código y el SQL puede ser compatible con versiones anteriores.
La web se basa en una página de logueo de usuarios, otra de registro de usuarios y otra página principal donde el usuario puede cambiar sus datos personales.
A continuación se dictan los pasos para poder correr el proyecto en su computador:

### Pre-requisitos 📋

_Es necesario contar con PHP versión 5 o superior en el computador Host, un servidor Mysql es también necesario. El aplicativo correrá en cualquier explorador moderno hasta la fecha._

_El acceso a la base de datos se hizo con mysqli, no se usó PDO por facilidad de uso en cualquier computador, algunos podrían no tener el módulo PDO para PHP instalado_


### Instalación y configuración 🔧

**1.** Clone el siguiente repositorio en la carpeta raíz de su servidor web

2. Una vez se cree la carpeta, dentro de esta encontrará el archivo ***queries.sql***, copie y pegue las sentencias SQL que contiene a su Administrador de base de datos preferido, esto creará la base de datos ***proimpo_test_DB***, la tabla ***usuarios***, y un usuario de prueba, cuyo nombre de usuario es _prueba_ y su contraseña es _rasmuslerdorf_

3. En el archivo PHP ***model/dbModel.php***, en las líneas 12, 13 y 14, se encuentran los datos de la dirección IP del servidor MySQL, el nombre de usuario y el password de dicho servidor respectivamente. Cambie por favor esta información dependiendo de la configuración de su servidor MySQL

4. Una vez clonado el repositorio y creada la base de datos y su tabala, desde cualquier explorador puede acceder al aplicativo con la siguiente URL:
```
http://localhost/proimpo_test_EdierGuzman
```
Por favor, cambie _localhost_ por la dirección IP de su servidor web, si este no se encuentra en su misma máquina.

5. El aplicativo web es intuitivo, dentro de él podrá registrar nuevos usuarios y loguearse para cambiar su información personal



*NOTA: Se siguió el patrón Modelo Vista Controlador en PHP.*

*:warning: :warning: :warning: Cualquier duda porfavor contactar al desarrollador del aplicativo vía Github o por correo o celular. De seguro atenderá cualquier corrección o sugerencia con prontitud y agrado.* :warning: :warning: :warning:

*Muchas gracias!*  :blush:  :blush:  :blush:

