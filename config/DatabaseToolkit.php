<?php

class DatabaseToolkit
{
    protected $connection;

    public function __construct()
    {
        // Obtén las credenciales de la base de datos desde el entorno
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $port = $_ENV['DB_PORT'];

        // Establece la conexión a la base de datos
        $this->connection = mysqli_connect($host, $user, $password, $dbname, $port);

        // Verifica si la conexión fue exitosa
        if (!$this->connection) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Establece el conjunto de caracteres a UTF-8
        mysqli_set_charset($this->connection, "utf8");
    }

    // Método para ejecutar consultas SELECT
    public function query($sql, $params = [])
    {
        // Prepara la consulta
        $stmt = mysqli_prepare($this->connection, $sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . mysqli_error($this->connection));
        }

        // Si hay parámetros, enlázalos a la consulta
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Asume que todos los parámetros son strings
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        // Ejecuta la consulta
        mysqli_stmt_execute($stmt);

        // Obtén el resultado
        $result = mysqli_stmt_get_result($stmt);

        // Convierte el resultado en un array asociativo
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        // Libera la memoria del resultado
        mysqli_stmt_close($stmt);

        return $rows;
    }

    // Método para ejecutar consultas INSERT, UPDATE, DELETE
    public function execute($sql, $params = [])
    {
        // Prepara la consulta
        $stmt = mysqli_prepare($this->connection, $sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . mysqli_error($this->connection));
        }

        // Si hay parámetros, enlázalos a la consulta
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Asume que todos los parámetros son strings
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        // Ejecuta la consulta
        $success = mysqli_stmt_execute($stmt);

        // Libera la memoria del resultado
        mysqli_stmt_close($stmt);

        return $success;
    }

    // Método para obtener el último ID insertado
    public function lastInsertId()
    {
        return mysqli_insert_id($this->connection);
    }

    // Método para iniciar una transacción
    public function beginTransaction()
    {
        return mysqli_begin_transaction($this->connection);
    }

    // Método para confirmar una transacción
    public function commit()
    {
        return mysqli_commit($this->connection);
    }

    // Método para revertir una transacción
    public function rollBack()
    {
        return mysqli_rollback($this->connection);
    }

    // Método para cerrar la conexión
    public function close()
    {
        mysqli_close($this->connection);
    }
}