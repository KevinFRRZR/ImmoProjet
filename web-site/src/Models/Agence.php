<?php
require_once 'BaseModel';

class Agence extends BaseModel
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
     * numeroDeTelephone field 
     * @var string|null 
     */
    public ?string $numeroDeTelephone = null;

    /**
     * email field 
     * @var string|null 
     */
    public ?string $email = null;

    /**
     * adresse field 
     * @var string|null 
     */
    public ?string $adresse = null;

    /**
     * bien_id field 
     * @var integer|null 
     */
    public ?int $bien_id = null;
}
