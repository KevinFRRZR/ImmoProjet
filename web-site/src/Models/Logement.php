<?php
require_once 'src/Models/BaseModel.php';
class Logement extends BaseModel
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
     * name field 
     * @var string|null 
     */
    public ?string $description = null;

    /**
     * Surface field 
     * @var float|null 
     */
    public ?float $surface = null;

    /**
     * nomber of piece field 
     * 
     * @var integer | null 
     */
    public ?int $nombreDePiece = null;

    /**
     * bien_id field 
     * @var integer|null 
     */
    public ?int $bien_id = null;

    public static function fetchById(int $bien_id): Logement|false
    {
        $statement = self::prepareStatement("select * from logement where bien_id = :bien_id");

        if (self::executeStatement($statement, [":bien_id" => $bien_id])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}
