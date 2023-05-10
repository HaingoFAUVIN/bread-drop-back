<?php

namespace App\DataFixtures\Provider;

class BreadDropProvider
{
    // Taleaux disponibles pour les Fixtures

    // Liste de catégorie en dur
    private $categories = [
        'Pain',
        'Viennoiserie',
        'Pâtisserie',
        'Sandwitch',
    ];

    private $bread = [
        'Baguette',
        'Tradition',
        'Pain complet',
    ];

    // Liste de viennoiserie
    private $pastries = [
        'Pain au chocolat',
        'Croissant',
    ];

    // Liste de patisserie
    private $pastry = [
        'Fraisier',
        'Eclair au chocolat',
    ];

    // Liste de sandwitch
    private $sandwitch = [
        'Jambon beurre',
        'Crudité oeuf',
    ];

    /**
     * Retourne une liste de catégorie
     */
    public function categoriesList()
    {
        return $this->categories;
    }

    /**
     * Retourne un pain au hasard
     */
    public function breadproduct()
    {
        return $this->bread[array_rand($this->bread)];
    }

    /**
     * Retourne une viennoiserie au hasard
     */
    public function pastriesproduct()
    {
        return $this->pastries[array_rand($this->pastries)];
    }

    /**
     * Retourne une patisserie au hasard
     */
    public function pastryproduct()
    {
        return $this->pastry[array_rand($this->pastry)];
    }

    /**
     * Retourne un sandwitch au hasard
     */
    public function sandwitchproduct()
    {
        return $this->sandwitch[array_rand($this->sandwitch)];
    }

}
