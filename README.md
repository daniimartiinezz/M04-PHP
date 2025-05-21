# 📁 M04 - PHP

Este proyecto es una práctica del módulo **M04** (Lenguajes de marcas y sistemas de gestión de información), que consiste en un sitio web desarrollado en **HTML**, **CSS** y **PHP**, desplegado en un servidor **Apache**. El sitio ejecuta comandos del sistema con `shell_exec` y se conecta a una base de datos para mostrar o gestionar información.

---

## 🚀 Funcionalidades del Sitio Web

- Página de inicio con diseño en HTML y CSS.
- Scripts PHP que:
  - Ejecutan comandos del sistema operativo mediante `shell_exec`.
  - Se conectan a una base de datos (MariaDB/MySQL).
- Interfaz sencilla para la visualización de datos y ejecución de operaciones.
- Muestra del estado del sistema o resultados de comandos.

---

## 📁 Estructura del Proyecto

El proyecto contiene los siguientes archivos y carpetas:

### Archivos HTML

- `index.html`: Página principal del sitio web con enlaces a distintas funcionalidades.
- `index.html.old`: Versión anterior o copia de seguridad del `index.html`.
- `add.html`: Formulario para añadir nuevos datos a la base de datos.
- `delete.html`: Interfaz para eliminar registros de la base de datos.
- `search.html`: Formulario para buscar registros por correo electrónico.
- `shutdown.html`: Página para apagar el sistema (vincula con `shutdown.php`).
- `terminal.html`: Interfaz para ejecutar comandos del sistema desde la web.
- `bbdd.html`: Página dedicada a mostrar el estado o los datos de la base de datos.

### Carpeta `includes/` (Scripts PHP del servidor)

- `add.php`: Inserta nuevos datos en la base de datos desde `add.html`.
- `delete.php`: Elimina registros de la base de datos.
- `search.php`: Busca información en la base de datos por correo electrónico.
- `show.php`: Muestra contenido de la base de datos.
- `shutdown.php`: Ejecuta un apagado del sistema desde la interfaz web usando `shell_exec`.
- `status.php`: Ejecuta comandos para mostrar el estado del sistema (como `uptime`, `df -h`, etc.).

### Otros archivos

- `css/style.css`: Hoja de estilos para el diseño visual del sitio web.
- `img/php.ico`: Icono utilizado por el sitio, probablemente en el `favicon` del navegador.

---

Cada uno de estos archivos cumple una función dentro del flujo del sitio. El usuario interactúa principalmente con las páginas HTML, que a su vez llaman a los scripts PHP de la carpeta `includes/` para interactuar con el sistema y la base de datos.

## 🖥️ Requisitos del Sistema

- ☁️ Máquina virtual con **Ubuntu Server 24.04 LTS** (en Azure).
- 🌐 Servidor web **Apache 2**.
- 🐘 **PHP 8.x** y módulos necesarios.
- 🛢️ **MariaDB** o **MySQL** como sistema gestor de base de datos.
- 🔐 Permisos adecuados para ejecutar comandos mediante `shell_exec`.

---

## ⚙️ Instalación y Despliegue en Ubuntu Server 24.04

### 1. Actualiza el sistema

```bash
sudo apt update && sudo apt upgrade -y
```

### 2. Instala Apache, PHP y MariaDB

```bash
sudo apt install apache2 php libapache2-mod-php php-mysql mariadb-server unzip -y
```

### 3. (Opcional) Instala módulos PHP adicionales

```bash
sudo apt install php-cli php-curl php-mbstring php-xml php-zip -y
```

### 4. Habilita Apache y PHP

```bash
sudo systemctl enable apache2
sudo systemctl start apache2
```

---

## 🗂️ Subida y Configuración del Proyecto

### 1. Copia los archivos al servidor web

Asumiendo que el archivo ZIP del proyecto está en `~/html.zip`:

```bash
cd ~
unzip html.zip
sudo cp -r html/* /var/www/html/
```

### 2. Asigna los permisos adecuados

```bash
sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/
```

### 3. Reinicia Apache

```bash
sudo systemctl restart apache2
```

---

## 🛠️ Configuración de la Base de Datos (MariaDB)

### 1. Accede a MariaDB

```bash
sudo mariadb
```

### 2. Crea la base de datos y el usuario

```sql
CREATE DATABASE m04db;
CREATE USER 'm04user'@'localhost' IDENTIFIED BY 'tu_contraseña_segura';
GRANT ALL PRIVILEGES ON m04db.* TO 'm04user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

> Asegúrate de actualizar las credenciales en los scripts PHP que hacen la conexión a la base de datos.

---

## 📸 Capturas de Pantalla (Opcional)

Puedes añadir capturas de pantalla de las distintas páginas del sitio web para mostrar su funcionamiento.

---

## 🔐 Consideraciones de Seguridad

- `shell_exec` puede ser peligroso si no se valida la entrada del usuario. Asegúrate de controlar estrictamente qué comandos se permiten ejecutar.
- Nunca ejecutes este tipo de scripts con privilegios elevados.
- Configura correctamente permisos de archivos y evita exposiciones innecesarias del servidor.

---

## 📄 Licencia

Este proyecto se distribuye con fines educativos bajo la Licencia MIT.
