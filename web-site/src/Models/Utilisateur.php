<?php

declare(strict_types=1);

require_once 'BaseModel';
require_once 'Favoris';

class Utilisateur extends BaseModel
{

    /**
     * Primary key 
     * 
     * @var integer | null 
     */
    public ?int $id = null;


    /**
     * firstname field 
     * @var string|null 
     */
    public ?string $nom = null;

    /**
     * lastname field 
     * @var string|null 
     */
    public ?string $prenom = null;

    /** 
     * email field 
     * @var string|null 
     */
    public ?string $email = null;

    /** 
     * password field 
     * @var string|null 
     */
    public ?string $motDePasse = null;

    /**
     * Favoris field 
     * @var Favoris|null
     */
    public ?Favoris $favoris_id = null;

    /** 
     * Fetch all users
     * @return array 
     **/
    public static function fetchAll(): array
    {

        $statement = self::prepareStatement("select * from utilisateur");
        if (self::executeStatement($statement)) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetchAll();
            }
        }
    }

    /**
     * 
     * Try to fetch a users by its email 
     * @param string $email 
     * @return Utilisateur|false 
     */
    public static function fetchByEmail(string $email): Utilisateur|false
    {
        $statement = self::prepareStatement("select * from users where email = :email");

        if (self::executeStatement($statement, [":email" => $email])) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetch();
            }
        }
    }

    /**
     * Get the current  user
     * 
     * @return Utilisateur|null
     */
    public static function current(): Utilisateur|null
    {
        static $current = null;
        if (!$current) {
            $email = $_SESSION['user'] ?? null;

            if ($email !== null) {
                $current = $email ? static::fetchByEmail($email) : new static;
            }
        }
        return $current;
    }

    public function modifyPassword(string $Newpassword): bool
    {
        $statement = self::prepareStatement("update user set password = :password WHERE email = :email");
        return self::executeStatement($statement, [":password" => $Newpassword, ":email" => $this->email]);
    }
}
