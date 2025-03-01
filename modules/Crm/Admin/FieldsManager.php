<?php

class FieldsManager
{
    private $connection;

    // Constructor: Establece la conexión a la base de datos usando mysqli
    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $port = $_ENV['DB_PORT'];

        $this->connection = mysqli_connect($host, $user, $password, $dbname, $port);

        if (!$this->connection) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        mysqli_set_charset($this->connection, "utf8");
    }

    // Crear una tabla basada en la definición de campos
    public function createTable($tableName, $fields)
    {
        $sql = "CREATE TABLE $tableName (";
        $columns = [];

        foreach ($fields as $fieldName => $fieldDef) {
            $type = strtoupper($fieldDef['type']);
            $size = isset($fieldDef['size']) ? "({$fieldDef['size']})" : "";
            $nullable = $fieldDef['nullable'] ? "NULL" : "NOT NULL";
            $default = isset($fieldDef['default']) ? "DEFAULT '{$fieldDef['default']}'" : "";
            $autoIncrement = isset($fieldDef['autoincrement']) && $fieldDef['autoincrement'] ? "AUTO_INCREMENT" : "";

            $columnDef = "$fieldName $type$size $nullable $default $autoIncrement";
            if (isset($fieldDef['indices']) && in_array('PRIMARY', $fieldDef['indices'])) {
                $columnDef .= " PRIMARY KEY";
            }
            $columns[] = $columnDef;
        }

        $sql .= implode(", ", $columns) . ")";

        if (mysqli_query($this->connection, $sql)) {
            echo "Tabla $tableName creada correctamente.\n";
        } else {
            echo "Error al crear la tabla: " . mysqli_error($this->connection) . "\n";
        }
    }

    // Modificar una tabla existente para agregar o modificar columnas
    public function modifyTable($tableName, $fields)
    {
        foreach ($fields as $fieldName => $fieldDef) {
            $type = strtoupper($fieldDef['type']);
            $size = isset($fieldDef['size']) ? "({$fieldDef['size']})" : "";
            $nullable = $fieldDef['nullable'] ? "NULL" : "NOT NULL";
            $default = isset($fieldDef['default']) ? "DEFAULT '{$fieldDef['default']}'" : "";

            // Verificar si la columna ya existe
            $result = mysqli_query($this->connection, "SHOW COLUMNS FROM $tableName LIKE '$fieldName'");
            $columnExists = mysqli_fetch_assoc($result);

            if ($columnExists) {
                // Modificar columna existente
                $sql = "ALTER TABLE $tableName MODIFY $fieldName $type$size $nullable $default";
            } else {
                // Agregar nueva columna
                $sql = "ALTER TABLE $tableName ADD $fieldName $type$size $nullable $default";
            }

            if (mysqli_query($this->connection, $sql)) {
                echo "Campo $fieldName modificado/agregado en la tabla $tableName.\n";
            } else {
                echo "Error al modificar/agregar el campo $fieldName: " . mysqli_error($this->connection) . "\n";
            }
        }
    }

    // Reparar una tabla
    public function repairTable($tableName)
    {
        $sql = "REPAIR TABLE $tableName";
        if (mysqli_query($this->connection, $sql)) {
            echo "Tabla $tableName reparada.\n";
        } else {
            echo "Error al reparar la tabla: " . mysqli_error($this->connection) . "\n";
        }
    }

    // Sincronizar la estructura de la tabla con la definición de campos
    public function syncTable($tableName, $fields)
    {
        // Verificar si la tabla existe
        $result = mysqli_query($this->connection, "SHOW TABLES LIKE '$tableName'");
        $tableExists = mysqli_fetch_assoc($result);

        if (!$tableExists) {
            // Crear la tabla si no existe
            $this->createTable($tableName, $fields);
        } else {
            // Modificar la tabla si ya existe
            $this->modifyTable($tableName, $fields);
        }
        echo "Tabla $tableName sincronizada correctamente.\n";
    }

    // Destructor: Cierra la conexión a la base de datos
    public function __destruct()
    {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }
}