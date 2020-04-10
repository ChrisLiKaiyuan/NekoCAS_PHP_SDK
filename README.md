# NekoCAS_PHP_SDK
NekoCAS SDK for PHP

## Installation
```
composer require nekowheel/nekocas
```

## Begin to use
```php
// Input the NekoCAS URL and the service secret.
NekoCAS::init("https://cas.n3ko.co", "vNOZpKdqnUYcztBjUhvvPLpeYCIIBVev");

// Validate the ticket.
$validate = NekoCAS::validate("ST-oadwZVbq5lUy151InUCC6UHDLI2l586k");
if ($validate->isSuccess()) {
    echo $validate->getName();
    echo $validate->getEmail();
    echo $validate->getToken();
    echo $validate->getMessage();
}
```