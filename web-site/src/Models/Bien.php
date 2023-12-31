<?php
require_once 'src/Models/BaseModel.php';

class Bien extends BaseModel
{
    /**
     * Primary key 
     * 
     * @var integer | null 
     */
    public ?int $id = null;

    /**
     * price field 
     * 
     * @var integer | null 
     */
    public ?int $prix = null;

    /**
     * Primary key 
     * 
     * @var string | null 
     */
    public ?string $description = null;

    /**
     * favoris_id field 
     * 
     * @var integer | null 
     */
    public ?int $favoris_id = null;

    /**
     * terrain_id field 
     * 
     * @var integer | null 
     */
    public ?int $terrain_id = null;

    /**
     * logement_id field 
     * 
     * @var integer | null 
     */
    public ?int $logement_id = null;

    /**
     * agence_id field 
     * 
     * @var integer | null 
     */
    public ?int $agence_id = null;

    public static function fetchAll(): array
    {
        $statement = self::prepareStatement("select * from bien");
        if (self::executeStatement($statement)) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetchAll();
            }
        }
    }
    public static function fetchById(): Bien
    {
        $statement = self::prepareStatement("select * from bien where id = :idbien");
        if (self::executeStatement($statement)) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}
