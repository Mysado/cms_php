<?php
use App\Core\Company;
use App\Core\User;
use App\Core\Question;
use App\Core\QuestionCategory;
use App\Core\Answer;
class QueryBuilder
{
    protected $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $fetchClass = stdClass::class)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $fetchClass);
    }
    public function lastId()
    {
        $statement = $this->pdo->prepare("select LAST_INSERT_ID()");
        $statement->execute();
        return $statement->fetch();
    }
    public function selectWhere($table, $columnToSelect, $where, $columnWhere, $fetchClass = stdClass::class)
    {
        $statement = $this->pdo->prepare("select {$columnToSelect} from {$table} where {$columnWhere} =" . "'" . "{$where}" . "'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $fetchClass);

    }
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters)));
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function update($table,$columnWhere,$where,$set)
    {
        $sql = "UPDATE {$table} SET ";
        foreach ($set as $key => $value) {
            $sql = $sql.$key."="."'".$value."',";
        }
        $sql = rtrim($sql,", ");
        $sql = $sql." WHERE {$columnWhere} = {$where}";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function delete($table, $columnWhere, $where)
    {
        $sql =  "delete from {$table} WHERE {$columnWhere} = '{$where}'";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}