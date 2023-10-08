# Pajaeu's Session
Simple PHP library for session handling

## Instalation
```bash
composer require pajaeu/session
```

## How to use

Starting session
```php
Session::start();
```

Sets variable by key
```php
Session::set('key', 'value');
```

Gets session variable by key
```php
$value = Session::get('key');
```

Checks if session variable exists
```php
$check = Session::has('key');
```

Removes session variable if exists
```php
Session::remove('key');
```

Gets session id
```php
$id = Session::id();
```

Regenerates session id
```php
Session::regenerate();
```

Clears whole session
```php
Session::clear();
```

Sets flash message
```php
Flash::set('success', 'message');
```

Returns all flashes and deletes them from Session
```php
$flashes = Flash::get();
```
