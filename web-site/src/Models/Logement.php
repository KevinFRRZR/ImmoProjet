<?php
require_once 'BaseModel';
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

    public static function fetchById(int $id): Logement|false
    {
        $statement = self::prepareStatement("select * from logement where id = :id");

        if (self::executeStatement($statement, [":id" => $id])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}
