### Purpose of this application
Build a CLI system in PHP that can be used for a till receipt to calculate and display all products with a subtotal and a grand total.

## Requirements
php >= 5.3

composer >= 1.0

## Installation

``` php composer install ```

``` phpunit ```

## Usage

To print all available commands
```` $ php run.php ````

To print receipt summary with input provided
````
$ php run.php receipt '[{"item" : "Expensive Baked Beans", "price" : "123.32", "discount" : "5"},{"item" : "Rubber Gloves", "price" : "1.50"}]'
````

## Credits

Thank you!

@copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.