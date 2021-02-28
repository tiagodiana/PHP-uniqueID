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
$id = $unique->uniqueId();
echo $id;
// $id output d3f5-3d2E-1C2d-5r4e 
?>
```
