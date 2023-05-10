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
        ['Nom'=>'Pain au lait',
        'Photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Pain_au_lait.jpg/220px-Pain_au_lait.jpg'],
        ['Nom'=>'Pain traditionnel français',
        'Photo' => 'https://th.bing.com/th/id/OIP.Gwt5RnHxf5AzmXboXBZ8PwHaF7?pid=ImgDet&rs=1'],
        ['Nom'=>'Pain au levain',
        'Photo' => 'https://th.bing.com/th/id/R.2ad16c287eb3fdad0c997dcbf88cecc6?rik=4%2bgoPmiN%2f5x1fw&pid=ImgRaw&r=0'],
        ['Nom'=>'Pain bis',
        'Photo' => 'https://th.bing.com/th/id/OIP.eZI_5clkEfCgYLlVIIoKDwHaE8?pid=ImgDet&rs=1'],
        ['Nom'=>'Pain de campagne',
        'Photo' => 'https://th.bing.com/th/id/OIP.FoF9zwmup7_A-IH2XGKIPgHaJ4?pid=ImgDet&rs=1'],
        ['Nom'=>'Pain bio',
        'Photo' => 'https://s.locavor.fr/data/produits/5/121312/pain-bio-farine-de-bles-anciens-121312-1595693461-1.jpg'],
        ['Nom'=>'Pain blanc',
        'Photo' => 'https://th.bing.com/th/id/OIP.bwzcfzZxV7f4ApaX_D6tawHaFj?pid=ImgDet&rs=1'],
        ['Nom'=>'Pain de seigle',
        'Photo' => 'https://bing.com/th?id=OSK.fac6b9688b615c636b8039ff51d72d80'],
        ['Nom'=>'Pain au son',
        'Photo' => 'https://th.bing.com/th/id/OIP._o2RhZAPP-EIOpFziMIQIQHaFi?pid=ImgDet&rs=1'],
    ];

    // Liste de viennoiserie
    private $pastries = [
        ['Nom'=>'Croissant',
        'Photo' => 'https://imgx.toplitic.com/itemu/y6z1fpwb.webp?w=683&h=683&x=171&y=0&res=150'],
        ['Nom'=>'Pain au chocolat',
        'Photo' => 'https://imgx.toplitic.com/itemu/62al84yo.webp?w=1600&h=1600&x=400&y=0&res=150'],
        ['Nom'=>'Madeleine',
        'Photo' => 'https://imgx.toplitic.com/itemu/v16ue7zt.webp?w=567&h=567&x=142&y=0&res=150'],
        ['Nom'=>'Brioche tressée de Metz',
        'Photo' => 'https://imgx.toplitic.com/itemu/m4bly1n7.webp?w=1920&h=1920&x=0&y=320&res=150'],
        ['Nom'=>'Suisse',
        'Photo' => 'https://imgx.toplitic.com/itemu/9hqk08ti.webp?w=1600&h=1600&x=0&y=0&res=150'],
        ['Nom'=>'Craquelin',
        'Photo' => 'https://imgx.toplitic.com/itemu/fr8tkxe1.webp?w=797&h=797&x=171&y=0&res=150'],
        ['Nom'=>'Macatia',
        'Photo' => 'https://imgx.toplitic.com/itemu/k29aqxpo.webp?w=3109&h=3109&x=1038&y=0&res=150'],
        ['Nom'=>'Sacristain',
        'Photo' => 'https://imgx.toplitic.com/itemu/9abfcynl.webp?w=1200&h=1200&x=0&y=200&res=150'],
        ['Nom'=>'Tortillon',
        'Photo' => 'https://imgx.toplitic.com/itemu/184ryvwd.webp?w=1074&h=1074&x=3&y=0&res=150'],
        ['Nom'=>'Chouquette',
        'Photo' => 'https://imgx.toplitic.com/itemu/wxgs938r.webp?w=630&h=630&x=285&y=0&res=150'],
        ['Nom'=>'Brioche',
        'Photo' => 'https://imgx.toplitic.com/itemu/p94jw13k.webp?w=819&h=819&x=0&y=0&res=150'],
        ['Nom'=>'Pain viennois',
        'Photo' => 'https://imgx.toplitic.com/itemu/7cati9yf.webp?w=1000&h=1000&x=0&y=250&res=150'],
    ];

    // Liste de patisserie
    private $pastry = [
        ['Nom'=>'Crêpe',
        'Photo' => 'https://imgx.toplitic.com/itemu/xdot8ge7.webp?w=720&h=720&x=322&y=0&res=150'],
        ['Nom'=>'Éclair au chocolat',
        'Photo' => 'https://imgx.toplitic.com/itemu/ce4kyuon.webp?w=1200&h=1200&x=0&y=71&res=150'],
        ['Nom'=>'Chou à la crème',
        'Photo' => 'https://imgx.toplitic.com/itemu/hx5lboye.webp?w=1200&h=1200&x=0&y=0&res=150'],
        ['Nom'=>'Profiterole',
        'Photo' => 'https://imgx.toplitic.com/itemu/o1t4avlr.webp?w=1220&h=1220&x=790&y=0&res=150'],
        ['Nom'=>'Tarte au citron meringuée',
        'Photo' => 'https://imgx.toplitic.com/itemu/h1ok0lrv.webp?w=800&h=800&x=243&y=0&res=150'],
        ['Nom'=>'Mille-feuille',
        'Photo' => 'https://imgx.toplitic.com/itemu/jrepf10n.webp?w=976&h=976&x=152&y=0&res=150'],
        ['Nom'=>'Macaron',
        'Photo' => 'https://imgx.toplitic.com/itemu/uhiqpm70.webp?w=360&h=360&x=190&y=0&res=150'],
        ['Nom'=>'Religieuse',
        'Photo' => 'https://imgx.toplitic.com/itemu/qky9mf2g.webp?w=938&h=938&x=351&y=153&res=150'],
        ['Nom'=>'Paris-brest',
        'Photo' => 'https://imgx.toplitic.com/itemu/cf1g7eln.webp?w=848&h=848&x=321&y=0&res=150'],
        ['Nom'=>'Tarte Tatin',
        'Photo' => 'https://imgx.toplitic.com/itemu/bm2qhk53.webp?w=800&h=800&x=0&y=200&res=150'],
    ];

    // Liste de sandwitch
    private $sandwitch = [
        ['Nom'=>'Croque-monsieur',
        'Photo' => 'https://4.bp.blogspot.com/-uaIMeuRHDBI/VQw4-O2RmvI/AAAAAAAABmY/L-rR6ScC8Lg/s1600/croque-monsieur.jpg'],
        ['Nom'=>'Pan Bagnat',
        'Photo' => 'https://th.bing.com/th/id/OIP.RGOQwehgNJGfkSUl9Mh-fQHaE8?pid=ImgDet&rs=1'],
        ['Nom'=>'Sandwich au thon',
        'Photo' => 'https://assets.afcdn.com/recipe/20160928/21224_w1024h768c1cx2128cy1416.jpg'],
        ['Nom'=>'Sandwich Jambon-Beurre',
        'Photo' => 'https://img.plusdebonsplans.com/2017/03/prix-moyen-sandwich-jambon-beurre.jpg'],
        ['Nom'=>'',
        'Photo' => ''],
        ['Nom'=>'',
        'Photo' => ''],
        ['Nom'=>'',
        'Photo' => ''],
        ['Nom'=>'',
        'Photo' => ''],
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
