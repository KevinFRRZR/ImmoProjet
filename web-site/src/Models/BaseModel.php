<?php

declare(strict_types=1);

require_once 'Database.php';

class BaseModel
{

    /**
     * 
     *Try to prepare a statement 
     * @param string $query 
     * @return PDOStatement
     */
    protected static function prepareStatement(string $query): PDOStatement
    {
        return $statement = Database::connection()
            ->prepare($query);
    }

    /**
     * 
     *Try to execute a statement 
     * @param PDOStatement $statement
     * @param array $parms  
     * @return bool
     */
    protected static function executeStatement(PDOStatement $statement, array $parms = []): bool
    {
        return $statement->execute($parms);
    }

    /**
     * 
     *Try to setFetchMode a statement 
     * @param PDOStatement $statement 
     * @return bool
     */
    protected static function setFetchModeStatement(PDOStatement $statement): bool
    {
        return $statement->setFetchMode(
            \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
            static::class
        );
    }
}
