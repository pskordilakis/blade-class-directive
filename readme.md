# Blade Class Directive

Inspired by [classnames](https://github.com/JedWatson/classnames) for react.

## Installation

``` bash
composer require pskordilakis/blade-directive-class
```

## Usage

@class directive accepts a variable number of arguments that can be of type string or array and returns(prints) a class attribute for an HTML element. Any string argument will be added as part of the value of the class attribute. For the array arguments, the entries will be filtered based on the value (truthy/falsy) and the key will be added to the class value


### String arguments
``` blade
@class('btn btn-primary')
```

### Array Arguments

``` blade
@class([ 'btn' => true, 'btn-primary' => true, 'disabled' => $isDisabled ])
```

### Mixed Arguments

``` blade
@class('btn btn-primary', [ 'disabled' => $isDisabled ])
```

### On HTML elements

``` blade
<li @class('page-item', [ 'disabled' => $pagination->onFirstPage() ])></li>
```
