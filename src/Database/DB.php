<?php
namespace  Errasoft311\Mvc\Database;
use Errasoft311\Mvc\Contracts\Database\DatabaseInterface;
use Errasoft311\Mvc\Env\EnvDash;

class DB implements DatabaseInterface {
    private object $connection;
    private string $sql;
    private static $table;

    function __construct()
    {

        $this->connection=mysqli_connect(EnvDash::env("DB_HOST"),EnvDash::env("DB_USER"),EnvDash::env("DB_PASSWORD"),EnvDash::env("DB_NAME"));
    }
    public static function table($table){
        self::$table=$table;
   return new static;
    }
    public function select(string $columns = '*'): object
    {
        $table=self::$table;
        $this->sql="SELECT $columns FROM `$table` ";
        return $this;
    }

    public function delete(): object
    {
        $table=self::$table;
        $this->sql="DELETE FROM `$table` ";
        return $this;
    }

    public function insert(array $data): object
    {
        $table=self::$table;

        $columns="";$values="";
        foreach ($data as $key=>$value){
            $columns .="$key ,";
            $values .="$value ,";
        }
        $columns=rtrim($columns,",");
        $values=rtrim($values,",");
        $this->sql="INSERT INTO $table($columns) VALUES('$values')";
        return $this;
    }

    public function update(array $data): object
    {
        $table=self::$table;
        $row="";
        foreach ($data as $key=>$value){
            $row .="`$key`= '$value', ";
        }

        $row=rtrim($row,",");
        $this->sql="UPDATE `$table` SET $row ";
        return $this;
    }




    public function where(string $column, string $operator, string $value): object
    {
        $this->sql .=" WHERE `$column` $operator '$value'";
        return $this;
    }

    public function excute(): bool
    {
        $query=mysqli_query($this->connection,$this->sql);
        return mysqli_affected_rows($query);
    }

    public function all(): array
    {
        $query=mysqli_query($this->connection,$this->sql);
        return mysqli_fetch_all($query,1);
    }

    public function first(): array
    {
        $query=mysqli_query($this->connection,$this->sql);
        return mysqli_fetch_assoc($query);
    }
}