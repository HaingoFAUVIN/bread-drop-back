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

### {"message":"Error thrown while running command "'d:f:l'". Message: "Property App\Entity\Order::$users does not exist"","context":{"exception":{"class":"ReflectionException","message":"Property App\Entity\Order::$users does not exist","code":0,"file":"/var/www/html/projet-07-bread-drop-back/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimeReflectionProperty.php:28"},"command":"'d:f:l'","message":"Property App\Entity\Order::$users does not exist"},"level":500,"level_name":"CRITICAL","channel":"console","datetime":"2023-05-17T09:27:41.476113+02:00","extra":{}}
09:27:41 CRITICAL  [console] Error thrown while running command "'d:f:l'". Message: "Property App\Entity\Order::$users does not exist" ["exception" => ReflectionException { …},"command" => "'d:f:l'","message" => "Property App\Entity\Order::$users does not exist"]
{"message":"Command "'d:f:l'" exited with code "1"","context":{"command":"'d:f:l'","code":1},"level":100,"level_name":"DEBUG","channel":"console","datetime":"2023-05-17T09:27:41.486802+02:00","extra":{}}

On a corrigé la relation entre Order et User en dev. Tout fonctionne sauf en prod

La solution :
https://stackoverflow.com/questions/26187097/doctrine-reflectionexception-property-does-not-exist
bin/console clear:cache

### Cannot autowire argument $doctrine of "App\Controller\Back\OrderController::index()": it references class "Symfony\Bridge\Doctrine\ManagerRegistry" but no such service exists. Try changing the type-hint to "Doctrine\Persistence\ManagerRegistry" instead.

L'erreur propose d'utiliser "Doctrine\Persistence\ManagerRegistry"

### [Syntax Error] line 0, col 166: Error: Expected Doctrine\ORM\Query\Lexer::T_ALIASED_NAME, got '`'