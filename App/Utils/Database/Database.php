<?php

namespace Utils\Database;


use PDO;
use PDOException;

class PdoDb
{
    private static $connect;

    public PDO $dbh;

    private function __construct()
    {
        global $conf;
        try {
            $this->dbh = new PDO('mysql:host=' . $conf['db']['host'] . ';dbname=' . $conf['db']['database'], $conf['db']['user'], $conf['db']['password'], [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ]);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
    }

    // Fonction de selection dans la base de donnée

    public static function getInstance(): ?PdoDb
    {
        if (is_null(self::$connect)) {
            self::$connect = new PdoDb();
        }
        return self::$connect;
    }

    public function select($sql, $fetchMethod = 'fetchAll')
    {
        try {
            $result = $this->dbh->query($sql, PDO::FETCH_ASSOC)->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }

    public function insert($table, $data): bool
    {
        // On convertit l'objet en tableau
        $dataTab = $data->getArray();

        // On hash le mot de passe
        if (isset ($dataTab['password'])) {
            $dataTab['password'] = password_hash($dataTab['password'], PASSWORD_DEFAULT);
        }
        // On récupère les nom de champs dans les clés du tableau
        $fields = array_keys($dataTab);
        // On récupère les valeurs
        $values = array_values($dataTab);

        // On compte le nombre de champ
        $values_count = count($values);

        // On construit la chaine des paramètres ':p0,:p1,:p2,...'
        $params = [];
        foreach ($values as $key => $value) {
            $params[] = ':p' . $key;
        }
        $params_str = implode(',', $params);

        // On prépare la requête
        $reqInsert = 'INSERT INTO ' . $table . '(' . implode(',', $fields) . ')';
        $reqInsert .= ' VALUES(' . $params_str . ')';

        $prepared = $this->dbh->prepare($reqInsert);

        // On injecte dans la requête les données avec leur type.
        for ($i = 0; $i < $values_count; $i++) {
            $type = match (gettype($values[$i])) {
                'NULL' => PDO::PARAM_NULL,
                'integer' => PDO::PARAM_INT,
                'boolean' => PDO::PARAM_BOOL,
                default => PDO::PARAM_STR,
            };
            // On lie une valeur au paramètre :pX
            $prepared->bindParam(':p' . $i, $values[$i], $type);
        }
        // On exécute la requête.
        // Retourne TRUE en cas de succès ou FALSE en cas d'échec.
        return $prepared->execute();
    }

    public function delete(string $tableName, int $id)
    {
        $stmt = $this->dbh->prepare("DELETE FROM " . $tableName . " WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function updateData($table, $data, $where)
    {
        $updateValues = array();
        foreach ($data as $field => $value) {
            $updateValues[] = "$field = :$field";
        }

        $updateString = implode(", ", $updateValues);
        $whereValues = array();
        foreach ($where as $field => $value) {
            $whereValues[] = "$field = :$field";
        }
        $whereString = implode(" AND ", $whereValues);

        $stmt = $this->dbh->prepare("UPDATE $table SET $updateString WHERE $whereString");

        foreach ($data as $field => &$value) {
            $stmt->bindParam(":$field", $value);
            $value = $data[$field];
        }
        foreach ($where as $field => &$value) {
            $stmt->bindParam(":$field", $value);
            $value = $where[$field];
        }
        $stmt->execute();
    }

    public function lastInsert(): bool|string
    {
        return $this->dbh->lastInsertId();
    }
}
