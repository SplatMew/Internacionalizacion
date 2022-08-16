# internacionalizacion

Link sistema hosteado: http://lcc.ens.uabc.mx/~al357963/login.php (username: admin passwd: admin)

Requisitos para correrlo localmente: un servidor apache (XAMPP) y una base de datos (MySQL)

Instrucciones: Descargar el código fuente de github y poner el folder "internacionalizacion" en el directorio "C:\xampp\htdocs". Extraer los folders public y vendor de zipped.rar a la raíz del folder internacionalizacion. Abrir XAMPP y darle Start al servidor apache. En la ventana de XAMPP darle clic a Services y checar que MySQL este activo. Crear todas las tablas corriendo los scripts en el folder db en MySQL. Abrir el archivo connect.php dentro del folder php-partials y cambiar las definiciones acorde a tu base de datos. Abrir el archivo create_user.php dentro del folder php-partials y asignar datos a las variables, luego correr el archivo abriendo chrome e ir a "localhost/internacionalizacion/php-partials/create_user.php". Después de esto podrás ingresar al sistema con el usuario que creaste.

Tipos de permisos: 
Estudiante visitante => 6
Estudiante de la uabc => 7
Académico visittante => 8
Academico de la UABC => 9

super usuario => 5
Administrador general => 4
Administrador unidad Mexicali => 1
Administrador unidad Tijuana => 2
Administrador unidad Ensenada => 3

