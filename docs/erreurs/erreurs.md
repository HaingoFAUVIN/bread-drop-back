### The "u" filter is part of the StringExtension, which is not installed/enabled

Lorsque je teste l'url : http://localhost:8000/back/order/

L'erreur me dit d'installer : composer require twig/string-extra


### Argument 1 passed to Twig\Extra\String\StringExtension::createUnicodeString() must be of the type string or null, object given, called in /var/www/html/Photon/APO/projet-07-bread-drop-back/var/cache/dev/twig/1a/1ab95697d276f9dcdb9d2bcca7a0866a073f418ae7bceb6f6e84ce5de103b170.php on line 118

Lorsque je teste l'url : http://localhost:8000/back/order/

Something in one of your Twig templates is calling the asset() function with a null value, which the PHP code is rejecting because of an incorrect type. You should have an error page pointing out where the bad call is being made to help you fix this issue.
https://github.com/symfony/symfony/discussions/45443

### The "format_datetime" filter is part of the IntlExtension, which is not installed/enabled; try running "composer require twig/intl-extra" in "back/order/index.html.twig".

J'essaie de formatter la date de livraison pour afficher en format date et heure.
https://twig.symfony.com/doc/2.x/filters/format_datetime.html

L'erreur me dit d'installer : composer require twig/intl-extra" in "back/order/index.html.twig