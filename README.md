# 🛍️ FakeStore API – Prueba Técnica Backend PHP (Laravel)

## 🚀 Descripción
API RESTful desarrollada con **Laravel 12** que simula la API de [FakeStore](https://fakestoreapi.com/docs).  
Permite gestionar usuarios, categorías, productos y carritos de compra.

---

## ⚙️ Tecnologías usadas
- PHP 8.2
- Laravel 12
- MariaDB
- Composer

---

## 🧩 Estructura del Proyecto
app/
├─ Http/
│ └─ Controllers/
│ ├─ Api/
│ │ ├─ CartController.php
│ │ ├─ CategoryController.php
│ │ ├─ ProductController.php
│ │ └─ CartController.php
│ └─ Controller.php
├─ Models/
config/
routes/
├─ api.php
└─ web.php
database/
├─ migrations/
└─ seeders/


## 🧰 Instalación y configuración

1. Clona el repositorio
   git clone https://github.com/tuusuario/fakestore-api.git
   cd fakestore-api

2. Instala dependencias:
   composer install

3. Configura la base de datos en .env:
    Descarga archivo .env(sino lo tienes): https://drive.google.com/file/d/1bGsDwLfS1ao6RVHOqbn5ZC6Jeldhhe1g/view?usp=sharing 

4. Ejecuta migraciones y seeders:
    php artisan migrate --seed
   
   
                                🔐 Endpoints principales
👤 Usuarios
Método	Endpoint	Descripción	Ejemplo 
POST	/api/register	Registrar usuario	{ "username": "Pedro", "email": "pedro@mail.com", "password": "123456" }

POST	/api/login	Iniciar sesión	{ "email": "pedro@mail.com", "password": "123456" }


🏷️ Categorías
Método	Endpoint	Descripción	Ejemplo
GET	/api/categories	Listar categorías	—

POST	/api/categories	Crear categoría	
{
  "id": 1,
  "name": "Electrónica"
}

PUT	/api/categories/{id}	Actualizar categoría
{
  "id": 1,
  "name": "Ropa"
}

DELETE	/api/categories/{id}	Eliminar categoría	—
{
  "id": 1,
  "name": "Ropa"
}

📦 Productos
Método	Endpoint	Descripción	Ejemplo
GET	/api/products	Listar todos los productos	—

GET	/api/products?category_id=1&order=asc	Filtrar por categoría y orden	—

POST	/api/products	Crear producto
{
    "title": "Laptop Dell Inspiron",
    "description": "Laptop 15.6\" i7, 16GB RAM, 512GB SSD",
    "price": "1200.99",
    "category_id": "1",
    "updated_at": "2025-11-14T12:42:07.000000Z",
    "created_at": "2025-11-14T12:42:07.000000Z",
    "id": 9
}

{
    "title": "Mouse Logitech G203",
    "description": "Mouse gamer con RGB y sensor de alta precisión",
    "price": "25.5",
    "category_id": "1",
    "updated_at": "2025-11-14T12:43:14.000000Z",
    "created_at": "2025-11-14T12:43:14.000000Z",
    "id": 10
}

PUT	/api/products/{id}	Actualizar producto	{ "precio": 1400 }

DELETE	/api/products/{id}	Eliminar producto	—



🛒 Carrito
Método	Endpoint	Descripción	Ejemplo

POST	/api/cart/add	Añadir producto	{ "user_id": 1, "product_id": 2, "cantidad": 3 }

GET	/api/cart/{userId}	Ver carrito del usuario	—

DELETE	/api/cart/{id}	Eliminar producto del carrito	—

🧑‍💻 Autor

Pedro Luis
Desarrollador Full Stack
📧 pedroluisperez33@mail.com

💻 Prueba técnica - VIXICOM