# Query on Excel

**Query on Excel** allows you to perform queries on Excel.

## NOTE
* <b>Supported Extensions: Please use `.xls` or `.xlsx`. </b>
* <b>Please ensure Excel data is well-formatted. Follow `example.xls`, and `example.xlsx`</b>

## Use Cases

This package is suitable for you if you need to perform some queries on:

* Perform SELECT query
* Perform where query (where, orWhere, whereIn, whereNotIn e.t.c)
* Perform Sorting
* Perform Limit, Offset
* Perform Aggregate Query (count, sum, avg, max, min)

## Installation

To install the package, you can use [Composer](https://getcomposer.org/):

```bash
composer require ruhulfbr/EXLQ
```

## Basic Usage

To instantiate the EXLQ do the following:

```php
require_once 'vendor/autoload.php';
use Ruhul\EXLQuery\EXLQ;

try {
    $result = EXLQ::from("example.xls")
        ->select('id', 'name')
        ->get();

} catch (\Exception $e) {
    $result = $e->getMessage();
}

pr($result);

```

## Querying, sorting and get results

You can perform queries on your Excel:

```php

$result = EXLQ::from("example.xls")
        ->select('id', 'name')
        //->select(['id', 'name'])
        ->where('id', 2)
        //->where('id', '>' ,2)
        ->orWhere('id', 3)
        //->orWhere('id', '>=', 3)
        ->whereLike('name', 'ruhul')
        //->whereLike('name', 'ruhul', 'start')
        //->whereLike('name', 'ruhul', 'end')
        ->whereIn('age', [22,23,25,26])
        ->whereNotIn('age', [11,12,13])
        
        ->orderBy('id')
        //->orderBy('id', 'desc')
        //->orderBy('id', 'asc')
        //->latest('id')  // Default Id
        //->oldest('id')  // Default Id
        ->get();

```

### More Example

```php

// To Get All Result
$result = EXLQ::from("example.xls")->all();

// To Get All Sorted Result
$result = EXLQ::from("example.xls")->orderBy('id', 'desc')->all();

// To Get Specific Row
$result = EXLQ::from("example.xls")->where('id', 1)->row();

// To Get First Result
$result = EXLQ::from("example.xls")->where('id', 1)->first();

// To Get Last Result
$result = EXLQ::from("example.xls")->where('id', 1)->last();

// To Get nth row
$result = EXLQ::from("example.xls")->getNth(2); // [0-n]

// Check Is row exist
$result = EXLQ::from("example.xls")->where('id', 1)->hasData(); // boolean
$result = EXLQ::from("example.xls")->where('id', 1)->doesExist(); // boolean

// To Get All Sorted Result
$result = EXLQ::from("example.xls")->orderBy('id', 'desc')->all();

```

### Available where operators

* `=` (default operator, can be omitted)
* `>`
* `<`
* `<=`
* `>=`
* `!=`

### Available sorting operators

* `ASC`
* `DESC` (default operator, can be omitted)
* `asc`
* `desc`

## Limit and Offset

You can add criteria and specify limit and offset for your query results:

```php

$result = EXLQ::from("example.xls")
        ->select('*')
        ->orderBy('id')
        ->limit(10)
        //->limit(10, 2)    
        ->get();

```

## Aggregator Query

You can add criteria and specify limit and offset for your query results:

```php

// To Get Count
$result = EXLQ::from("example.xls")->count();

// To Get Sum
$result = EXLQ::from("example.xls")->sum('age');

// To Get Average
$result = EXLQ::from("example.xls")->avg('age');

// To Get row with minimum column value
$result = EXLQ::from("example.xls")->min('age');

// To Get row with maximum column value
$result = EXLQ::from("example.xls")->max('age');

```

## Support

If you found an issue or had an idea please refer [to this section](https://github.com/ruhulfbr/excelq/issues).

## Authors

* **Md Ruhul Amin** - [Github](https://github.com/ruhulfbr)
