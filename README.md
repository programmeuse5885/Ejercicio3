# 📚 Proyecto Laravel — Plantilla, Vistas y Controlador

Este proyecto tiene como objetivo es practicar el uso de plantillas Blade en Laravel, vistas basadas en una plantilla, y el enrutamiento mediante un controlador.

---

## ⚙️ Requisitos

- PHP >= 8.1
- Laravel 10.x
- Composer  
- MySQL
- Blade (Motor de plantillas)
- Bootstrap

---

## 🏗️ Estructura del proyecto

```text
ejercicio-3/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── SchoolController.php    # Controlador para escuela
│   │       ├── StudentController.php   # Controlador para estudiante
│   │       └── TeacherController.php   # Controlador para maestro
│   └── Models/
│       ├── School.php                  # Modelo para escuela
│       ├── Teacher.php                 # Modelo para maestro
│       └── Student.php                 # Modelo para estudiante
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Plantilla base
│       ├── schools/
│       │   ├── create.blade.php        # Vista para crear escuela
│       │   ├── edit.blade.php          # Vista para editar escuela
│       │   └── index.blade.php         # Vista general de escuelas
│       ├── students/
│       │   ├── create.blade.php        # Vista para crear estudiante
│       │   ├── edit.blade.php          # Vista para editar estudiante
│       │   └── index.blade.php         # Vista general de estudiantes
│       ├── teachers/
│       │   ├── create.blade.php        # Vista para crear maestro
│       │   ├── edit.blade.php          # Vista para editar maestro
│       │   └── index.blade.php         # Vista general de maestros
│       └── index.blade.php             # Dashboard principal
└── routes/
    └── web.php                         # Rutas web del sistema

```
---


## 📝 Licencia

Este proyecto es de código abierto y está disponible bajo la Licencia MIT.

---

## 👤 Autor

Rocío Carolina Chávez Servín

GitHub: @programmeuse5885

---

## 📧 Contacto

Si tienes preguntas o sugerencias, no dudes en abrir un issue en el repositorio.

---

⭐️ Si este proyecto te fue útil, considera darle una estrella en GitHub
