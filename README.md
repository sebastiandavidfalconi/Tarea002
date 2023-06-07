# Sistema de Login con PHP y Sesiones

Este repositorio contiene la solución al trabajo de implementación de un sistema de login utilizando PHP y sesiones para autenticar a los usuarios en una aplicación web. El sistema fue diseñado por Emilio Ñacato y Sebastian Falconi como parte de la materia de Desarrollo Web.

## Objetivo

El objetivo de este trabajo es desarrollar un sistema de login que permita proteger y controlar el acceso a una aplicación web. Se debe implementar un formulario de inicio de sesión que solicite al usuario su nombre de usuario y contraseña. Al recibir los datos, se verificará si corresponden a un usuario válido almacenado en la base de datos. Si la autenticación es exitosa, se iniciará una sesión y se redirigirá al usuario a una página de inicio. En caso de que la autenticación falle, se mostrará un mensaje de error adecuado al usuario.

## Entregables

El repositorio contiene los siguientes archivos:

1. `login.php`: Archivo PHP que contiene el formulario de inicio de sesión y la lógica de autenticación. En este archivo se realiza la validación de los datos ingresados por el usuario y se verifica si corresponden a un usuario válido en la base de datos.

2. `session.php`: Archivo PHP que maneja la creación y gestión de sesiones. Este archivo se encarga de iniciar la sesión cuando la autenticación es exitosa y redirigir al usuario a la página de inicio.

3. `inicio.php`: Archivo PHP que muestra la página de inicio después de la autenticación exitosa. En este archivo se muestra un mensaje de bienvenida al usuario.

## Funcionamiento del sistema de login

El sistema de login implementado utiliza PHP y sesiones para autenticar a los usuarios en una aplicación web. El proceso de autenticación consta de los siguientes pasos:

1. El usuario accede al formulario de inicio de sesión, donde debe ingresar su nombre de usuario y contraseña.

2. Al enviar el formulario, se realiza la validación de los datos ingresados. Se verifica si el usuario y la contraseña corresponden a un usuario válido almacenado en la base de datos.

3. Si la autenticación es exitosa, se inicia una sesión para el usuario y se redirige a la página de inicio. En la página de inicio se muestra un mensaje de bienvenida con el nombre de usuario.

4. En caso de que la autenticación falle, se muestra un mensaje de error indicando que los datos ingresados son incorrectos.

Es importante destacar que se han seguido buenas prácticas de seguridad, como validar y filtrar los datos ingresados por el usuario, así como utilizar consultas preparadas para prevenir ataques de inyección SQL.


# Repositorio de CRUD de Contactos

Este repositorio contiene una aplicación web desarrollada en PHP y MySQL que implementa las funcionalidades básicas de un CRUD (Crear, Leer, Actualizar y Eliminar) para una lista de contactos.

## Descripción

El desarrollo de aplicaciones web con funcionalidad CRUD es una tarea común en el desarrollo de software. En este proyecto, se ha creado un sistema CRUD para gestionar una lista de contactos. El sistema permite agregar nuevos contactos, ver la lista completa de contactos, actualizar la información de un contacto existente y eliminar contactos de la lista.

El proyecto consta de los siguientes componentes:

1. **Base de datos:** Se ha diseñado una base de datos en MySQL que almacena la información de los contactos, incluyendo campos como nombre, apellido, dirección, correo electrónico y número de teléfono.

2. **Script de creación de la tabla:** Se proporciona un archivo SQL que contiene el script necesario para crear la tabla "contactos" en la base de datos. Este archivo se denomina `crear_tabla.sql` y se encuentra en la raíz del repositorio.

3. **Lógica CRUD en PHP:** Se ha implementado un archivo PHP llamado `crud.php` que contiene la lógica necesaria para realizar las operaciones CRUD en la base de datos. Este archivo se encarga de crear nuevos contactos, leer la lista de contactos, actualizar la información de un contacto existente y eliminar contactos de la lista.

4. **Interfaz de usuario en PHP:** Se ha creado un archivo PHP llamado `index.php` que muestra la lista de contactos y permite interactuar con ella. En esta interfaz, se pueden agregar nuevos contactos, editar la información de contactos existentes y eliminar contactos de la lista.

## Entregables

El repositorio incluye los siguientes archivos:

1. `crear_tabla.sql`: Archivo SQL que contiene el script de creación de la tabla "contactos" en la base de datos. Puedes importar este archivo en tu servidor de MySQL para crear la tabla.

2. `crud.php`: Archivo PHP que contiene la lógica para realizar las operaciones CRUD en la base de datos. Puedes incluir este archivo en tu proyecto para utilizar las funciones CRUD.

3. `index.php`: Archivo PHP que muestra la lista de contactos y permite interactuar con ella. Este archivo utiliza el archivo `crud.php` para realizar las operaciones CRUD en la base de datos.

4. `README.md`: Documentación breve que explica el funcionamiento del sistema CRUD implementado. Estás leyendo este archivo en este momento.

## Buenas prácticas de seguridad

Es importante seguir las buenas prácticas de seguridad al trabajar con aplicaciones web. En este proyecto se han tenido en cuenta las siguientes consideraciones:

- Validación y filtrado de datos: Se implementa validación y filtrado de los datos ingresados por el usuario para prevenir posibles ataques.

- Consultas preparadas: Se utilizan consultas preparadas para prevenir ataques de inyección SQL. Esto garantiza que los datos ingresados por el usuario se traten como datos y no como parte de la consulta SQL.

Se recomienda revisar y entender el código fuente proporcionado para comprender cómo se implementan estas medidas de seguridad.

## Contribución

Si deseas contribuir a este proyecto, puedes hacerlo de las siguientes maneras:

- Reportando problemas: Si encuentras algún error o tienes alguna sugerencia de mejora, puedes abrir un nuevo issue en el repositorio.



- Enviando pull requests: Si deseas agregar nuevas características o corregir problemas existentes, puedes enviar un pull request. Será revisado y considerado para su inclusión en el proyecto.

¡Gracias por tu interés en este proyecto! Esperamos que sea de utilidad para tus necesidades de desarrollo web con funcionalidad CRUD.
Emilio Ñacato y Sebastian Falconi
