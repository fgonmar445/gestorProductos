# Gestor de Productos (Laravel)

Aplicación sencilla en Laravel para gestionar productos: crear, listar, editar y eliminar.  
Incluye validación, vistas con Blade y un CRUD completo.

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

## 📁 Estructura del CRUD

Controlador
app/Http/Controllers/ProductoController.php

Incluye métodos:

- index
- create
- store
- edit
- update
- destroy

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