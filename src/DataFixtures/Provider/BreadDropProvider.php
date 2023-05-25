<?php

namespace App\DataFixtures\Provider;

class BreadDropProvider
{
    // Taleaux disponibles pour les Fixtures

    // Liste des boulangeries
    private $addressBakeries = [
        '62 Rue Jeean Miguet 01110 HAUTEVILLE LOMPNES',
        '2 Rue Joseph Marion 01200 VALSERHONE',
        '38 Route de Marboz 01340 BRESSE VALLONS',
        '36 Grande Rue 01340 MONTREVEL EN BRESSE',
        '342 rue centrale 01370 ST ETIENNE DU BOIS',
        '421 avenue de Lyon 01960 Péronnas',
        '24 RUE ARSENE HOUSSAYE 02000 LAON',
        '56 Rur J.F. KENNEDY 02100 ST QUENTIN',
        '8 Rue de la Buerie 02200 SOISSONS',
        '3 Rue de la Bannière 02200 SOISSONS',
        '1 AVENUE DE WERTHEIM - CC VERT BOCAGE 13300 SALON DE PROVENCE',
        '40-42 AVENUE JEAN JAURES 13530 TRETS',
        '45 ROUTE DE ST REMY 13640 MOLLEGES',
        '60 avenue Georges Clémenceau 14000 CAEN',
        '104 rue Emile Zola 14120 Mondeville',
        '72 avenue de la Mer 14150 OUISTREHAM',
        '4-7 avenue de Garbsen 14200 HEROUVILLE ST CLAIR',
        '15-16 rue Emile Demagny 14230 ISIGNY SUR MER',
        '75 rue St Jean 14400 BAYEUX',
        '1 place de Martilly - Commune de ST MARTIN DE TALLEVENDE 14500 VIRE',
        '77 Avenue Jean GASTON 17000 LA ROCHELLE',
        '14 avenue du champs de mars 17000 La Rochelle',
        '11 Rue du Maréchal Leclerc 17100 SAINTES',
        '1 rue Armand Trousseau 17100 SAINTES',
        '41 avenue des oiseaux de mer 17140 LAGORD',
        '6 PLACE DELAS 24570 LE LARDIN SAINT-LAZARE',
        '13 rue de la Grette 25000 BESANCON',
        '14 route de Gray 25000 BESANCON',
        '93 rue de Dole 25000 BESANCON',
        '4 rue Sainte Ursanne 25190 SAINT HIPPOLYTE',
        '10 rue Général Leclerc 25200 MONTBELIARD',
        '8 Grande Rue 25260 COLOMBIER FONTAINE',
        '31 Grande Rue 25260 LONGEVELLE SUR DOUBS',
        '68 rue de Beaulieu 25350 MANDEURE',
        '7 rue de Voujeaucourt 25420 COURCELLES LES MONTBELIARD',
        'Rue du Neuf Septembre 25480 MISEREY SALINES',
        '19 Grande Rue 25500 MORTEAU',
        '2 rue Sous la Roche 25550 PRESENTEVILLERS',
        '10 Grande Rue 25660 SAONE',
        '39 route de Belchamp 25700 VALENTIGNEY',
        '1 rue de la Gare 25800 VALDAHON',
        '28 rue Jean Moulin 25870 VENISE',
        '385 avenue Victor Hugo 26000 VALENCE',
        '64 PLACE JEAN JAURES 26100 ROMANS SUR ISERE',
        '86 Grande Rue Jean Jaurès 26300 BOURG DE PEAGE',
        '9 rue de la République 26400 CREST',
        '6 rue de la Harpe 27000 EVREUX',
        '32 rue du Gal de Gaulle 27300 BERNAY',
        '38, rue du Maréchal Foch 27400 LOUVIERS',
        '2 A rue Abbé Seyer 27620 BOIS JEROME SAINT-OUEN',
        '54 rue Marcel Lefèvre 27700 LES ANDELYS',
        '17 rue Saint Denis 27800 BRIONNE',
        '1 bis rue des Chaumes 27950 SAINT-MARCEL',
        '15 bis Avenue Léon Blum 30200 BAGNOLS SUR CEZE',
        '168 Avenue du Général de Gaulle 30380 Saint Christol lès Alès',
        '48 RUE DU LEVANT 30420 CALVISSON',
        'Route Nationale 113 30600 VESTRIC et CANDIAD',
        '27 rue du commerce 31120 Portet sur Garonne',
        '18 AVENUE DE SAINT EXUPERY 31400 TOULOUSE',
        '4 rue Jean Monnet 31470 Fonsorbes',
        '67 rue du Faubourg Bonnefoy 31500 TOULOUSE',
        '1 avenue Germaine Tillion 31520 Ramonville Saint Agne',
        '2 esplanade de Verdun 31620 Bouloc',
        '19 Avenue Andromède 31700 Blagnac',
        '11 RUE DU CHEMIN NEUF 32130 SAMATAN',
        'ROUTE DE TARBES - ZA DU POUNTET 32300 MIRANDE',
        '40 AVENUE DE SAINT EXUPERY 33530 BASSENS',
        '26 BOULEVARD VICTOR 33670 CREON',
        '3 RUE VALENTIN BERNARD 33710 BOURG SUR GIRONDE',
        '23 RUE FRANCOIS PENGAM 29800 LANDERNEAU',
        '205 RUE DU FOREZ 30000 NIMES',
        '31 Rue André Boulle 30100 ALES',
        '1361 chemin des Dupînes 30100 ALES',
        '27 Avenue des Maladreries 30100 ALES',
        '9 rue Fernand Crémieux 30200 BAGNOLS SUR CEZE',
        '15 bis Avenue Léon Blum 30200 BAGNOLS SUR CEZE',
        '168 Avenue du Général de Gaulle 30380 Saint Christol lès Alès',
        '48 RUE DU LEVANT 30420 CALVISSON',
        '1 place du pont Trinquat 34920 LE CRES',
        '2 Avenue Wiston Churchill 35000 Rennes',
        '17 RUE HOCHE 35000 RENNES',
        '103 bis Rue de Vern 35200 Rennes',
        'Z.A. La Bretonnière Rue des Ateliers 35260 CANCALE',
        '8 RUE DES ESTUAIRES 35470 BAIN DE BRETAGNE',
        '1 Rue des Entons 35580 SAINT SENOUX',
        '58 RUE DE COTARD 35600 REDON',
        '30 CHEMIN DES MERSANS 36200 SAINT MARCEL',
        '97 rue de la Fuye 37000 TOURS',
        '130 boulevard Tonnelé 37000 Tours',
        '91 rue de la République 37100 TOURS',
        '126 rue de la République 37110 CHÂTEAU RENAULT',
        '3 rue Gambetta 37130 LANGEAIS',
        '11 rue de Rigny Ussé 37130 LIGNIERES DE TOURNAINE',
        '6 allée de la Canopée 37140 BOURGUEIL',
        '66 avenue de la République 37170 CHAMBRAY LES TOURS',
        '1 place des Petits Près 37230 PERNAY',
        '8 place André Delaunay 37250 MONTBAZON',
        '20 place du Maréchal Leclerc 37250 VEIGNE',
        '4 rue Abraham Courtemanche 37270 MONTLOUIS SUR LOIRE',
        '19 rue de Tours 37270 SAINT MARTIN LE BEAU',
        '16 Boulevard de Chinon 37300 JOUE LES TOURS',
        '9 rue des Artisans 37300 JOUE LES TOURS',
        'Route de Monts - la Borde 37300 JOUE LES TOURS',
        '114 blvd Jean Jaurès 37300 JOUE LES TOURS',
        '80 rue Nationale 37380 MONNAIE',
        '45 rue Nationale 37390 LA MEMBROLLE SUR CHOISILLE',
        '12 rue Nationale 37390 LA MEMBROLLE SUR CHOISILLE',
        '40 Quai Charles de Gaulle 37400 AMBOISE',
        '13 place 11 novembre 37510 BALLAN MIRE',
        '5-7 Boulevard Tonnelé 37520 LA RICHE',
        '67 avenue de la République 37540 SAINT CYR SUR LOIRE',
        '30 AV du Général de Gaulle 37550 SAINT AVERTIN',
        '10 rue de cormery 37550 SAINT AVERTIN',
        '8 rue Agnès Sorel 37600 LOCHES',
        '4 rue Picois 37600 LOCHES',
        '4 rue Picois 37600 LOCHES',
        '88 av de la République 37700 SAINT PIERRE DES CORPS',
        '10 rue Ethel et Julius Rosenberg 37700 SAINT PIERRE DES CORPS',
        '8 RUE DE LA GARE 38120 ST EGREVE',
        '24 B AVENUE DE LA HOUILLE BLANCHE 38170 SEYSSINET PARISET',
        '9 RUE HENRI BARBUSSE 38560 CHAMP-SUR-DRAC',
        '31 AVENUE ARISTIDE BRIAND 38600 FONTAINE',
        '111 place de la Mairie 38660 LA TERRASSE',
        '1 rue Claude Lombard 39100 DOLE',
        '2 rue de la Garde 39130 CLAIRVAUX LES LACS',
        '830 Bis rue des Trois Lacs 39130 DOUCIER',
        '11 rue du crêt du bief 39170 Lanvans les St claude',
        '10 BD AMIRAL COURBET 44000 NANTES',
        '16 RUE DE VERDUN 44000 NANTES',
        '2 rue du Général Buat 44000 NANTES',
        '4 allée Duquesne 44000 NANTES',
        '2 RUE LAMORICIERE 44100 NANTES',
        '52 BD SAINT AIGNAN 44100 NANTES',
        '53 BD boulay Paty 44100 NANTES',
        '7 RUE DE NANTES 44130 BLAIN',
        '60 QUATER AVENUE DE NANTES 44140 AIGREFEUILLE SUR MAINE',
        '24 RUE ST MAURICE 51100 REIMS',
        '30 PLACE VAUBAN 51100 REIMS',
        '111 RUE DE MAGNEUX 51100 REIMS',
        '114 RUE GAMBETTA 51100 REIMS',
        '7 PLACE LUTON 51100 REIMS',
        '78 RUE DE CERNAY 51100 REIMS',
        '22 RUE JEAN JAURES 51110 BAZANCOURT',
        '5 RUE DES CENSES 51110 WARMERIVILLE',
        '2 RUE BOUVIOT SASSOT 51120 SEZANNE',
        '5 PLACE DU GENERAL DE GAULLE 51150 TOURS SUR MARNE',
        '1 route de Bouzy 51150 TOURS SUR MARNE',
        '6 RUE RENE LETILLY 51170 FISMES',
        '35 RUE PASTEUR 51190 AVIZE',
        '31 RUE PORTE LUCAS 51200 EPERNAY',
        '3 RUE THIERCELIN PARRICHAULT 51200 EPERNAY',
        '15 GRANDE RUE 51240 MAIRY SUR MARNE',
        '4 place Louis de Hercé 53100 Mayenne',
        '4 Rue St Sauveur 53110 LASSAY LES CHATEAUX',
        '1 RUE DE LA GARE 53150 MONTSURS',
        '29 Avenue de St Fort 53200 Saint Fort',
        '22 Rue de la perception 53230 COSSE LE VIVIEN',
        '14 rue des 3 marchands 53230 Cosse le Vivien',
        '2 Rue de Bretagne 53360 QUELAINES ST GAULT',
        '16 rue des Fossés Saint Jacques 75005 PARIS',
        '85 rue St Dominique 75007 PARIS',
        '21 rue Raimond Poincaré 76680 Saint Saëns',
        '6 RUE DE L EGLISE 77169 BOISSY LE CHATEL',
        '14 Rue de lattre de tassigny 85150 LA MOTHE ACHARD',
        '51 RUE MAURICE RAIMBAUD 85150 SAINTE FOY',
        '15 Place charles de Gaulle 85220 COEX',
        '2 Rue de la République 85220 COMMEQUIERS',
        '27 rue de Nantes 85230 Beauvoir Sur Mer',
        '8 RUE GUITTENY 85230 BOUIN',
        '10 12 rue de la boulaye 852320 MAREUILSUR LAY',
        '2 Rue du Commerce 85700 MONTOURNAIS',
        '11 Place du Relais - St Michel Mont Mercure 85700 SEVREMONT',
        'Rue du Général de Gaulle 87170 ISLE',
        '13 rue Géneral Leclerc 88000 EPINAL',
        '33 rue Notre Dame de Lorette 88000 EPINAL',
        '16 rue de la concorde 88100 st DIE',
        '34 avenue de fontenelle 88190 Golbey',
        '21 rue du general leclerc 88200 Remiremont',
        '5A rue Paul Claudel 88250 La bresse',
        '7 QUAI DE LA PARELLE 88360 RUPT SUR MOSELLE',
        '38 avenue general de Gaulle 88420 MOYENMOUTIER',
        '3 av des fusillés 88430 Corcieux',
        '20 rue du centre 88500 Mattaincourt',
        '14 RUE DU GENERAL LECLERC 88500 Mirecourt',
        '13 RUE DE LA GARE 91800 BRUNOY',
        '67 rue Maurice Thorez 92000 NANTERRE',
        '36 Route de la Reine 92100 BOULOGNE BILLANCOURT',
        '48 bis av Victor Hugo 92100 BOULOGNE-BILLANCOURT',
        '66 boulevard Jean Jaures 92110 CLICHY',
        '51 Bd Général Leclerc 92110 CLICHY',
        '22 rue Edgar Guinet 92120 MONTROUGE',
        '70 Avenue Jean Jaurès 92140 CLAMART',
        '176 av Victor Hugo 92140 CLAMART',
        '7 avenue Aristide Briand 92160 ANTONY',
        '22 avenue de la division Leclerc 92160 ANTONY',
        '81 RUE MIRABEAU 92160 ANTONY',
        '29 Marcel Allegot 92190 MEUDON',
        '29 Rue de chezy 92200 NEUILLY SUR SEINE',
        '14 bis Avenue de Madrid 92200 Neuilly sur Seine',
        '28 bd de Stalingrad 92240 MALAKOFF',
        '68 rue Paul Vaillant Couturier 92240 MALAKOFF',
        '92 rue Jean Longuet 92290 CHATENAY MALABRY',
        '184bis av. de Paris 92320 Chatillon',
        '110 rue Pierre Brossolette 92320 CHATILLON',
        '1520 av Roger Salengro 92370 CHAVILLE',
        '45 av Pasteur 92400 COURBEVOIE',
        '10 av de la Liberté 92400 COURBEVOIE',
        '85 av. de Colmar 92500 RUEIL MALMAISON',
        '294 av Napoléon Bonaparte 92500 RUEIL -MALMAISON',
        '1 RUE THIEBAULT 95690 NESLES-LA-VALLEE',
        '21 Rue du General de Gaulle 95880 Enghien les Bains',
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
     * Retourne une liste d'adresse de boulangerie
     */
    public function addressBakeriesList()
    {
        return $this->addressBakeries;
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
