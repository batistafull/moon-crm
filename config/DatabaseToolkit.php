<?php

class DatabaseToolkit
{
    protected $connection;

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

    public function query($sql, $params = [])
    {
        $stmt = mysqli_prepare($this->connection, $sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . mysqli_error($this->connection));
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_stmt_close($stmt);

        return $rows;
    }

    public function execute($sql, $params = [])
    {
        $stmt = mysqli_prepare($this->connection, $sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . mysqli_error($this->connection));
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        $success = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $success;
    }

    public function lastInsertId()
    {
        return mysqli_insert_id($this->connection);
    }

    public function beginTransaction()
    {
        return mysqli_begin_transaction($this->connection);
    }

    public function commit()
    {
        return mysqli_commit($this->connection);
    }

    public function rollBack()
    {
        return mysqli_rollback($this->connection);
    }

    public function close()
    {
        mysqli_close($this->connection);
    }
}