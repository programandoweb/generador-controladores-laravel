# Generador de Controladores, Modelos y Servicios para Laravel

Este proyecto es un generador de archivos basados en plantillas (stubs) para la estructura de un proyecto en Laravel. El generador te permite crear archivos como controladores, modelos, repositorios, servicios y migraciones de manera rápida, basados en plantillas que puedes personalizar.

## Estructura del Proyecto

El proyecto tiene la siguiente estructura:

```bash
/generador-controladores-laravel
│
├── output/                  # Directorio donde se generan los archivos de salida
│   ├── controller_prueba.php
│   ├── migration_prueba.php
│   ├── model_prueba.php
│   ├── repository_prueba.php
│   └── service_prueba.php
│
├── scripts/
│   └── generate_crud.php     # Script principal que genera los archivos
│
├── templates/                # Directorio de plantillas (stubs)
│   ├── contract.stub
│   ├── controller.stub
│   ├── migration.stub
│   ├── model.stub
│   ├── repository.stub
│   ├── route.stub
│   └── service.stub
│
└── README.md                 # Este archivo explicativo


<h1>Requisitos</h1>
PHP 7.4 o superior
Composer (opcional, si necesitas instalar dependencias adicionales)
Laravel (para la integración con el proyecto)


<h1>Instalación</h1>
Clona este repositorio en tu máquina local.
<pre>
git clone https://github.com/tu_usuario/generador-controladores-laravel.git
cd generador-controladores-laravel
</pre>

Asegúrate de tener PHP correctamente configurado en tu sistema.

Uso
Paso 1: Personalizar las Plantillas (Opcional)
En el directorio templates/ encontrarás varios archivos .stub que son las plantillas para generar los archivos. Estos archivos contienen la estructura básica de los controladores, modelos, migraciones, servicios, etc. Puedes personalizar estas plantillas según las necesidades de tu proyecto.

Cada plantilla utiliza marcadores de posición ({{nombre_controlador}}, {{nombre_modelo}}, etc.) que serán reemplazados automáticamente por los valores que indiques al ejecutar el generador.

Paso 2: Ejecutar el Generador
Modifica el script scripts/generate_crud.php para incluir los valores dinámicos que desees (nombre del controlador, modelo, etc.).

Por ejemplo:

php
Copiar código
$reemplazos = [
    'nombre_controlador' => 'UsuarioController',
    'nombre_modelo' => 'Usuario',
    // otros valores según tu plantilla
];

generarArchivoDesdeStub($stubPath, $outputPath, $reemplazos);
Ejecuta el script en la línea de comandos:

bash
Copiar código
php scripts/generate_crud.php
Esto generará los archivos correspondientes en la carpeta output/.

Ejemplo de Uso
Imaginemos que deseas crear un controlador llamado UsuarioController. Al ejecutar el script con los parámetros adecuados, el archivo generado será algo como esto:

Archivo generado (output/UsuarioController.php):