<?php
require_once 'BaseModel';
class Favoris extends BaseModel
{
    /**
     * Primary key 
     * 
     * @var integer | null 
     */
    public ?int $id = null;

    /**
     * id of user
     * 
     * @var integer | null 
     */
    public ?int $utilisateur_id = null;

    /**
     * id of bien
     * 
     * @var integer | null 
     */
    public ?int $bien_id = null;


    /**
     * Insert a new spectacle
     * @return bool
     */
    public function insertFavoris(): bool
    {
        $statement = self::prepareStatement("INSERT INTO spectacle.spectacle (utilisateur_id, bien_id) 
        VALUES ( :utilisateur_id, :bien_id)");
        return self::executeStatement($statement, [':utilisateur_id' => $this->utilisateur_id, ':bien_id' => $this->bien_id]);
    }

    /**
     * 
     * Try to fetch a favoris of user by its id_user 
     * @param integer $id
     * @return array|false 
     */
    public static function fetchByIdUser(int $id): array|false
    {
        $statement = self::prepareStatement("select * from users where utilisateur_id = :utilisateur_id");
        if (self::executeStatement($statement, [":utilisateur_id" => $id])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }
}
