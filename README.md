# Gestor de Productos (Laravel)

Gestor de Productos es una aplicación CRUD construida con Laravel y Tailwind CSS que permite administrar inventario de forma sencilla. Incluye panel de control con estadísticas, validación de formularios, migraciones, componentes Blade y un diseño moderno.

---

## Requisitos

- PHP 8+
- Composer
- MySQL / MariaDB
- Node.js (opcional para estilos)
- Git (opcional)

---

## Instalación

Clona el repositorio:

```bash
git clone https://github.com/fgonmar445/gestorProductos
cd gestorProductos
```

## Instalación dependencias

```bash
composer install
npm install
```

### Copia el archivo de entorno:

```bash
cp .env.example .env
```

### Genera la clave de la app:

```bash
php artisan key:generate
```

---

## Configuración de Base de Datos
- Edita tu archivo .env:
```bash
DB_DATABASE=nombre_de_tu_bd
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```
- Ejecuta migraciones:
```bash
php artisan migrate
```
---

## Estructura del CRUD

```
gestorProductos/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ProductoController.php
│   └── Models/
│       └── Producto.php
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── gestor-productos.sql
│
├── public/
├── resources/
│   └── views/
│       └── productos/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── form.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
├── tests/
│
├── package.json
├── composer.json
├── tailwind.config.js
├── vite.config.js
└── README.md
```

### Controlador

app/Http/Controllers/ProductoController.php


Métodos incluidos:

- index() → Listar productos
- create() → Formulario de creación
- store() → Guardar producto
- edit() → Formulario de edición
- update() → Actualizar producto
- destroy() → Eliminar producto

### Modelo

app/Models/Producto.php

```
protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'stock',
    'categoria',
    'disponible',
];
```
---

## Funcionalidades

- CRUD completo de productos

- Panel de control con estadísticas

- Validación de formularios

- Gestión de stock (incluye alertas de stock bajo)

- Categorías y disponibilidad

- Diseño responsive con Tailwind CSS

- Últimos productos añadidos

- Código organizado siguiendo MVC

--- 

## 🎨 Vistas (Blade)
- Ubicadas en:
```
resources/views/productos/
```
- index.blade.php

- create.blade.php

- edit.blade.php

- form.blade.php

### Capturas de pantalla

- Homepage
<img src="/public/images/homepage.png">

- Inicio
<img src="/public/images/inicio.png">

- Productos
<img src="/public/images/productos.png">


- Editar productos
<img src="/public/images/editar.png">


- Detalles productos
<img src="/public/images/detalle_productos.png">

---
## Cómo ejecutar el proyecto
- Ejecutar el servidor
```
php artisan serve
```
- Compilar estilos
```
npm run dev
```
- Accede a http://127.0.0.1:8000
---
## Mejoras futuras
* Subida de imágenes para productos

- Exportar inventario a PDF/Excel

- Gráficos en el panel (Chart.js)

- Filtros avanzados en el listado

- Autenticación por roles (admin/usuario)