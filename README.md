# Gestor de Productos (Laravel)

Aplicación CRUD desarrollada con Laravel, que permite gestionar productos: crear, listar, editar y eliminar.
Incluye validación, vistas con Blade, migraciones, Tailwind CSS y una estructura limpia y escalable.

---

## 🚀 Requisitos

- PHP 8+
- Composer
- MySQL / MariaDB
- Node.js (opcional para estilos)
- Git (opcional)

---

## 📦 Instalación

Clona el repositorio:

```bash
git clone https://github.com/fgonmar445/gestorProductos
cd gestorProductos
```

## 📦 Instalación dependencias

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

## ▶️ Configuración de Base de Datos
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

## 📁 Estructura del CRUD


Controlador
app/Http/Controllers/ProductoController.php

Incluye métodos:

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

## 🎨 Vistas (Blade)
```
resources/views/productos/
```
- index.blade.php

- create.blade.php

- edit.blade.php

- form.blade.php

### Imágenes

- Homepage
<img src="/public/images/homepage.png">

- Inicio
<img src="/public/images/inicio.png">

- Productos
<img src="/public/images/productos.png">


- Editar productos
<img src="/public/images/editar.png">