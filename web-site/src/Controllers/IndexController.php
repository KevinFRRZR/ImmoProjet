<?php
require_once "src/Models/Bien.php";
require_once "src/Models/Logement.php";
require_once "src/Models/Terrain.php";

class IndexController
{
    public function getBien(): array
    {
        return Bien::fetchAll();
    }

    public function getLogementById(int $id): Logement|false
    {
        return Logement::fetchById($id);
    }

    public function getTerrainById(int $id): Terrain|false
    {
        return Terrain::fetchById($id);
    }
}
