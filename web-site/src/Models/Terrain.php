<?php
require_once 'BaseModel';
class Terrain extends BaseModel
{
    /**
     * Primary key 
     * 
     * @var integer | null 
     */
    public ?int $id = null;

    /**
     * name field 
     * @var string|null 
     */
    public ?string $nom = null;

    /**
     * Superficie field 
     * @var float|null 
     */
    public ?float $superficie = null;

    /**
     * constructible field 
     * @var bool|null 
     */
    public ?bool $constructible = null;

    /**
     * bien_id field 
     * @var integer|null 
     */
    public ?int $bien_id = null;

    public static function fetchById(int $id): Terrain|false
    {
        $statement = self::prepareStatement("select * from terrain where id = :id");

        if (self::executeStatement($statement, [":id" => $id])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}