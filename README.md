# ArrayWrap
OOP wrap for php arrays


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
