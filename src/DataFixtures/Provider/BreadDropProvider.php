<?php

namespace App\DataFixtures\Provider;

class BreadDropProvider
{
    // Taleaux disponibles pour les Fixtures

    // Liste deS boulangeries 
    private $bakeries = [
        ['name'=>'oulangerie Manu',
        'address'=>'62 Rue Jeean Miguet 01110 HAUTEVILLE LOMPNES',
        'picture' => ''],
    ];

    // Jours de la semaine
    private $daysList = [
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
        'Dimanche',
    ];

    // Liste de catégorie en dur
    private $categories = [
        'Pain',
        'Viennoiserie',
        'Pâtisserie',
        'Sandwitch',
    ];

    private $breadList = [
        1 => ['name'=>'Pain au lait',
        'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Pain_au_lait.jpg/220px-Pain_au_lait.jpg'],
        2 => ['name'=>'Pain traditionnel français',
        'picture' => 'https://th.bing.com/th/id/OIP.Gwt5RnHxf5AzmXboXBZ8PwHaF7?pid=ImgDet&rs=1'],
        3 => ['name'=>'Pain au levain',
        'picture' => 'https://th.bing.com/th/id/R.2ad16c287eb3fdad0c997dcbf88cecc6?rik=4%2bgoPmiN%2f5x1fw&pid=ImgRaw&r=0'],
        4 => ['name'=>'Pain bis',
        'picture' => 'https://th.bing.com/th/id/OIP.eZI_5clkEfCgYLlVIIoKDwHaE8?pid=ImgDet&rs=1'],
        5 => ['name'=>'Pain de campagne',
        'picture' => 'https://th.bing.com/th/id/OIP.FoF9zwmup7_A-IH2XGKIPgHaJ4?pid=ImgDet&rs=1'],
        6 => ['name'=>'Pain bio',
        'picture' => 'https://s.locavor.fr/data/produits/5/121312/pain-bio-farine-de-bles-anciens-121312-1595693461-1.jpg'],
        7 => ['name'=>'Pain blanc',
        'picture' => 'https://th.bing.com/th/id/OIP.bwzcfzZxV7f4ApaX_D6tawHaFj?pid=ImgDet&rs=1'],
        8 => ['name'=>'Pain de seigle',
        'picture' => 'https://bing.com/th?id=OSK.fac6b9688b615c636b8039ff51d72d80'],
        9 => ['name'=>'Pain au son',
        'picture' => 'https://th.bing.com/th/id/OIP._o2RhZAPP-EIOpFziMIQIQHaFi?pid=ImgDet&rs=1'],
    ];

    private $breadName = [
        'Pain au lait',
        'Pain traditionnel français',
        'Pain au levain',
        'Pain bis',
        'Pain de campagne',
        'Pain bio',
        'Pain blanc',
        'Pain de seigle',
        'Pain au son',
    ];

    // Liste de viennoiserie
    private $pastriesList = [
        ['name'=>'Croissant',
        'picture' => 'https://imgx.toplitic.com/itemu/y6z1fpwb.webp?w=683&h=683&x=171&y=0&res=150'],
        ['name'=>'Pain au chocolat',
        'picture' => 'https://imgx.toplitic.com/itemu/62al84yo.webp?w=1600&h=1600&x=400&y=0&res=150'],
        ['name'=>'Madeleine',
        'picture' => 'https://imgx.toplitic.com/itemu/v16ue7zt.webp?w=567&h=567&x=142&y=0&res=150'],
        ['name'=>'Brioche tressée de Metz',
        'picture' => 'https://imgx.toplitic.com/itemu/m4bly1n7.webp?w=1920&h=1920&x=0&y=320&res=150'],
        ['name'=>'Suisse',
        'picture' => 'https://imgx.toplitic.com/itemu/9hqk08ti.webp?w=1600&h=1600&x=0&y=0&res=150'],
        ['name'=>'Craquelin',
        'picture' => 'https://imgx.toplitic.com/itemu/fr8tkxe1.webp?w=797&h=797&x=171&y=0&res=150'],
        ['name'=>'Macatia',
        'picture' => 'https://imgx.toplitic.com/itemu/k29aqxpo.webp?w=3109&h=3109&x=1038&y=0&res=150'],
        ['name'=>'Sacristain',
        'picture' => 'https://imgx.toplitic.com/itemu/9abfcynl.webp?w=1200&h=1200&x=0&y=200&res=150'],
        ['name'=>'Tortillon',
        'picture' => 'https://imgx.toplitic.com/itemu/184ryvwd.webp?w=1074&h=1074&x=3&y=0&res=150'],
        ['name'=>'Chouquette',
        'picture' => 'https://imgx.toplitic.com/itemu/wxgs938r.webp?w=630&h=630&x=285&y=0&res=150'],
        ['name'=>'Brioche',
        'picture' => 'https://imgx.toplitic.com/itemu/p94jw13k.webp?w=819&h=819&x=0&y=0&res=150'],
        ['name'=>'Pain viennois',
        'picture' => 'https://imgx.toplitic.com/itemu/7cati9yf.webp?w=1000&h=1000&x=0&y=250&res=150'],
    ];

    // Liste de viennoiserie
    private $pastriesName = [
        'Croissant',
        'Pain au chocolat',
        'Madeleine',
        'Brioche tressée de Metz',
        'Suisse',
        'Craquelin',
        'Macatia',
        'Sacristain',
        'Tortillon',
        'Chouquette',
        'Brioche',
        'Pain viennois',
    ];

    // Liste de patisserie
    private $pastryList = [
        ['name'=>'Crêpe',
        'picture' => 'https://imgx.toplitic.com/itemu/xdot8ge7.webp?w=720&h=720&x=322&y=0&res=150'],
        ['name'=>'Éclair au chocolat',
        'picture' => 'https://imgx.toplitic.com/itemu/ce4kyuon.webp?w=1200&h=1200&x=0&y=71&res=150'],
        ['name'=>'Chou à la crème',
        'picture' => 'https://imgx.toplitic.com/itemu/hx5lboye.webp?w=1200&h=1200&x=0&y=0&res=150'],
        ['name'=>'Profiterole',
        'picture' => 'https://imgx.toplitic.com/itemu/o1t4avlr.webp?w=1220&h=1220&x=790&y=0&res=150'],
        ['name'=>'Tarte au citron meringuée',
        'picture' => 'https://imgx.toplitic.com/itemu/h1ok0lrv.webp?w=800&h=800&x=243&y=0&res=150'],
        ['name'=>'Mille-feuille',
        'picture' => 'https://imgx.toplitic.com/itemu/jrepf10n.webp?w=976&h=976&x=152&y=0&res=150'],
        ['name'=>'Macaron',
        'picture' => 'https://imgx.toplitic.com/itemu/uhiqpm70.webp?w=360&h=360&x=190&y=0&res=150'],
        ['name'=>'Religieuse',
        'picture' => 'https://imgx.toplitic.com/itemu/qky9mf2g.webp?w=938&h=938&x=351&y=153&res=150'],
        ['name'=>'Paris-brest',
        'picture' => 'https://imgx.toplitic.com/itemu/cf1g7eln.webp?w=848&h=848&x=321&y=0&res=150'],
        ['name'=>'Tarte Tatin',
        'picture' => 'https://imgx.toplitic.com/itemu/bm2qhk53.webp?w=800&h=800&x=0&y=200&res=150'],
    ];

    // Liste de patisserie
    private $pastryName = [
        'Crêpe',
        'Éclair au chocolat',
        'Chou à la crème',
        'Profiterole',
        'Tarte au citron meringuée',
        'Mille-feuille',
        'Macaron',
        'Religieuse',
        'Paris-brest',
        'Tarte Tatin',
    ];

    // Liste de sandwitch
    private $sandwitchList = [
        ['name'=>'Croque-monsieur',
        'picture' => 'https://4.bp.blogspot.com/-uaIMeuRHDBI/VQw4-O2RmvI/AAAAAAAABmY/L-rR6ScC8Lg/s1600/croque-monsieur.jpg'],
        ['name'=>'Pan Bagnat',
        'picture' => 'https://th.bing.com/th/id/OIP.RGOQwehgNJGfkSUl9Mh-fQHaE8?pid=ImgDet&rs=1'],
        ['name'=>'Sandwich au thon',
        'picture' => 'https://assets.afcdn.com/recipe/20160928/21224_w1024h768c1cx2128cy1416.jpg'],
        ['name'=>'Sandwich Jambon-Beurre',
        'picture' => 'https://img.plusdebonsplans.com/2017/03/prix-moyen-sandwich-jambon-beurre.jpg'],
        ['name'=>'Sandwich baguette au prosciutto et brie',
        'picture' => 'https://bing.com/th?id=AMMS_235fa95c5e599f1c1ce20eba10e81b2c'],
        ['name'=>'Sandwich français à la brique pressée',
        'picture' => 'https://th.bing.com/th/id/R.8922558fd29920fb7f3ef7433b29970d?rik=HswYPDPD7ORjqw&pid=ImgRaw&r=0'],
        ['name'=>'Sandwich à la trempette française',
        'picture' => 'https://bing.com/th?id=AMMS_c0b962bd6a67c0329f204ff9363959fc'],
        ['name'=>'Croissants au Gruyère',
        'picture' => 'https://bing.com/th?id=OSK.0c6c48218a8df5ac42842c91ed63f052'],
    ];

    // Liste de sandwitch
    private $sandwitchName = [
        'Croque-monsieur',
        'Pan Bagnat',
        'Sandwich au thon',
        'Sandwich Jambon-Beurre',
        'Sandwich baguette au prosciutto et brie',
        'Sandwich français à la brique pressée',
        'Sandwich à la trempette française',
        'Croissants au Gruyère',
    ];

    /**
     * Retourne la liste de jours de la semaine
     */
    public function daysList()
    {
        return $this->daysList;
    }

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
    public function breadProductName()
    {
        return $this->breadName[array_rand($this->breadName)];
    }

    /**
     * Retourne une viennoiserie au hasard
     */
    public function pastriesProductName()
    {
        return $this->pastriesName[array_rand($this->pastriesName)];
    }

    /**
     * Retourne une patisserie au hasard
     */
    public function pastryProductName()
    {
        return $this->pastryName[array_rand($this->pastryName)];
    }

    /**
     * Retourne un sandwitch au hasard
     */
    public function sandwitchProductName()
    {
        return $this->sandwitchName[array_rand($this->sandwitchName)];
    }

}
