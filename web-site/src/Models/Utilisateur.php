<?php

declare(strict_types=1);

require_once 'BaseModel';

class Utilisateur extends BaseModel
{

    /**
     * Primary key 
     * 
     * @var integer | null 
     */
    public ?int $ID_Utilisateur = null;


    /**
     * firstname field 
     * @var string|null 
     */
    public ?string $firstname = null;

    /**
     * lastname field 
     * @var string|null 
     */
    public ?string $lastname = null;

    /** 
     * email field 
     * @var string|null 
     */
    public ?string $email = null;

    /** 
     * password field 
     * @var string|null 
     */
    public ?string $password = null;

    /**
     * current user role 
     * 
     * @param string $email
     * @return Favoris|null
     */
    protected ?Favoris $favoris = null;

    /** 
     * Fetch all userss
     * 
     * @return array 
     **/
    public static function fetchAll(): array
    {

        $statement = self::prepareStatement("select * from users");
        if (self::executeStatement($statement)) {
            if (self::setFetchModeStatement($statement)) {
                return $statement->fetchAll();
            }
        }
    }

    /**
     * 
     *Try to fetch a users by its email 
     * @param string $email 
     * @return User|false 
     */
    public static function fetchByEmail(string $email): User|false
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
     * @return User|null
     */
    public static function current(): User|null
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

    /**
     * Get user role
     *
     * @return Role|null
     */
    public function getRole(): Role|null
    {
        if (!$this->role) {
            $this->role = $this->roleId ? Role::fetchById($this->roleId) : null;
        }

        return $this->role;
    }

    public function modifyPassword(string $Newpassword): bool
    {
        $statement = self::prepareStatement("update user set password = :password WHERE email = :email");
        return self::executeStatement($statement, [":password" => $Newpassword, ":email" => $this->email]);
    }
}
