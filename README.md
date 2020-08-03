# MissingNumericRangePHP
Is a function in php which return missing ranges, when is send by parameter: the actualy ranges, the minimun and maximun range.

# Examples How to use
First of all you need t know the minimun range, the maximun and the actualy range already setup.

To start, setup an array with the actual ranges.
In this case minimun: 1, maximun: 20, actual range: [1-7]

```php
$min_range = 1;
$max_range = 20;
$actualy_ranges = array(
    array(
        "id" => 0,
        "min" => 1,
        "max" => 7
    )
);
```
Then you just have to call the function
```php
$array_missing = MissingNumericRange($actualy_ranges, $min_range, $max_range);
```
You are ready now to show up the returned array.
```php
echo json_encode($array_missing);
```
Output

```json
[{"id":0,"min":8,"max":20}]
```
# Another Practical Examples
minimun: 1, maximun: 200, actual range: [1-75], [94-120]
```php
$min_range = 1;
$max_range = 200;
$actualy_ranges = array(
    array(
        "id"=>0,
        "min"=>1,
        "max"=>75
    ),
    array(
        "id"=>1,
        "min"=>94,
        "max"=>120
    )
);
$array_missing = MissingNumericRange($actualy_ranges, $min_range, $max_range);
echo json_encode($array_missing);
```
Output
```json
[{"id":0,"min":76,"max":93},{"id":0,"min":121,"max":200}]
```


minimun: 1, maximun: 200, actual range: none
```php
$min_range = 1;
$max_range = 200;
$actualy_ranges = array();
$array_missing = MissingNumericRange($actualy_ranges, $min_range, $max_range);
echo json_encode($array_missing);
```
Output
```json
[{"id":0,"min":1,"max":200}]
```


minimun: 1, maximun: 200, actual range: [200-200]
```php
$min_range = 1;
$max_range = 200;
$actualy_ranges = array(
    array(
        "id"=>0,
        "min"=>200,
        "max"=>200
    )
);
$array_missing = MissingNumericRange($actualy_ranges, $min_range, $max_range);
echo json_encode($array_missing);
```
Output
```json
[{"id":0,"min":1,"max":199}]
```

minimun: 1, maximun: 200, actual range: [60-75], [81-98], [99-103], [170-194]
```php
$min_range = 1;
$max_range = 200;
$actualy_ranges = array(
    array(
        "id"=>0,
        "min"=>60,
        "max"=>75
    ),
    array(
        "id"=>1,
        "min"=>81,
        "max"=>98
    ),
    array(
        "id"=>2,
        "min"=>99,
        "max"=>103
    ),
    array(
        "id"=>3,
        "min"=>170,
        "max"=>194
    )
);
$array_missing = MissingNumericRange($actualy_ranges, $min_range, $max_range);
echo json_encode($array_missing);
```
Output
```json
[{"id":0,"min":1,"max":59},{"id":0,"min":76,"max":80},{"id":0,"min":104,"max":169},{"id":0,"min":195,"max":200}]
```

# License
Missing Numeric Range is licensed under MIT.
