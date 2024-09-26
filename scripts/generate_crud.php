<?php

function generateCrud($moduleName, $moduleNamespace, $fields)
{
    // Definir las plantillas que necesitas generar
    $files = ['controller', 'model', 'repository', 'migration', 'service', 'routes'];

    // Ruta base de las plantillas
    $templatePath = __DIR__ . '/../templates/';
    // Ruta donde se guardarán los archivos generados
    $outputPath = __DIR__ . '/../output/';

    // Generar cada tipo de archivo
    foreach ($files as $fileType) {
        $templateFile = $templatePath . $fileType . '.stub';
        if (!file_exists($templateFile)) {
            echo "La plantilla $fileType no existe.\n";
            continue;
        }

        // Cargar la plantilla
        $template = file_get_contents($templateFile);

        // Reemplazar los placeholders
        $content = str_replace(
            ['{{module_name}}', '{{module_namespace}}', '{{module_variable}}', '{{fields}}'],
            [$moduleName, $moduleNamespace, strtolower($moduleName), $fields],
            $template
        );

        // Definir el nombre del archivo de salida
        $outputFile = $outputPath . $fileType . '_' . strtolower($moduleName) . '.php';

        // Guardar el archivo
        file_put_contents($outputFile, $content);

        echo ucfirst($fileType) . " generado: $outputFile\n";
    }
}

// Obtener los argumentos del CLI
$moduleName = $argv[1]; // Nombre del módulo, por ejemplo: 'RawMaterial'
$moduleNamespace = $argv[2]; // Namespace del módulo, por ejemplo: 'Inventory'
$fields = isset($argv[3]) ? $argv[3] : '[]'; // Campos en formato de array, ejemplo: '["name", "email", "password"]'

// Ejecutar la función para generar el CRUD
generateCrud($moduleName, $moduleNamespace, $fields);
