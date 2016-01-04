# ArrayWrap
OOP wrap for php arrays

[![Build Status](https://travis-ci.org/Ivan988/array-wrap.svg?branch=master)](https://travis-ci.org/Ivan988/array-wrap)


### Usage
```php
$someArray = [  
    'name' => 'John',   
    'surname' => 'Doe',  
];

$wrappedArray = new ArrayWrap($someArray);

// get element from from array with index "name"
$name = $wrappedArray->get('name'); 

// get element from array with index "email", throw Exception if it is not set
$email = $wrappedArray->getOrFail('email'); 

// update array element
$wrappedArray->set('name', 'Jane');
$wrappedArray->set('email', 'jane.doe@example.com'
````

### Running tests
````
vendor/bin/phpunit -c phpunit.xml
````

PHP 5.6 or higher required for running tests