<?php
require_once 'src/Models/BaseModel.php';
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

    public static function fetchById(int $bien_id): Terrain|false
    {
        $statement = self::prepareStatement("select * from terrain where bien_id = :bien_id");

        if (self::executeStatement($statement, [":bien_id" => $bien_id])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}
