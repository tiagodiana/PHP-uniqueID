# PHP-uniqueID
Script for generate unique id in PHP

### Download
Clone the repository:

    git clone https://github.com/tiagodiana/PHP-uniqueID.git

### Usage
Add file UniqueID.php in your project
...
```php
<?php
require UniqueID.php;
$unique = new UniqueID();

$id = $unique->uniqueId4Numeric();
echo $id;
/*4329*/

$id = $unique->uniqueId8Numeric();
echo $id;
/*44005232*/

$id = $unique->uniqueId16Numeric('-');
echo $id;
/*2224-1181-5460-4569*/

$id = $unique->uniqueId16AlphaNumeric('-');
echo $id;
/*g3a0-m2y5-s6a6-y0s2*/

$id = $unique->uniqueId32Numeric('-');
echo $id;
/*0244-4542-1561-3255-0055-0146-9020-2244*/

$id = $unique->uniqueId32AlphaNumeric('-');
echo $id;
/*p0v1-a5Q13-K4a5-v2v4-Q2v3-v0p6-p6K2-Q0Q5*/
?>
```
