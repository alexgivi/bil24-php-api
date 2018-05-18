## Библиотека для работы с билетной системой Bil24
https://kernel.group/bil24/bil24.html

### Установка
* выполнить
```
composer require alexgivi/bil24-php-api "*"
```
* или добавить в composer.json в секцию require
```
"alexgivi/bil24-php-api": "*"
```

### Использование

```php

require 'vendor/autoload.php';


use bil24api\Client;

$client = new Client([
    'fid' => 1111, // ваш frontend id в системе bil24
    'token' => '23dfd343dfdd34dfd', // ваш токен в системе bil24
    // если есть данные пользователя, для использования методов, требующих авторизации
    'userId' => 111,
    'sessionId' => '23dfd343dfdd34dfd',
]);

$moscowId = null;

$cities = $client->getCities();
foreach ($cities->cityList as $city) {
    if ($city->cityName == 'Москва') {
        $moscowId = $city->cityId;
    }
}

$venues = $client->getVenueList($moscowId);

foreach ($venues->venueList as $venue) {
	// ...
}
```