<?php
require_once 'BaseModel';

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
}
