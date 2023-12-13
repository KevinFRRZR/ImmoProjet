<?php
require_once '/src/Models/Bien.php';
require_once '../Models/Logement.php';
require_once '../Models/Terrain.php';

class IndexController
{
    public function getBien(): array
    {
        return Bien::fetchAll();
    }

    public function getLogementById(int $id): Logement
    {
        return Logement::fetchById($id);
    }

    public function getTerrainById(int $id): Terrain
    {
        return Terrain::fetchById($id);
    }
}
