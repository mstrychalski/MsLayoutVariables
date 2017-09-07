# MsLayoutVariables
Created by Michał Strychalski

## Introduction

MsLayoutVariables is simple Module, that allows you to set layout variables in module configs. Usefull for hiding or rendering particular elements in layout, depends on controller or module.

## Installation using Composer

```bash
$ composer install mstrychalski/ms-layout-variables
```

## Usage

Layout variables can be used in various ways, it can be limited for Action only, Module, Controller or even whole application.

### Whole application

```php
'layout_variables' => [
        'default' => [
            'showMenu' => false,
            'pageTitle' => 'Awesome title',
            'someArray' => [0,1,2,3]
        ]
    ],
```

### Limited to Module

```php
'layout_variables' => [
        'Application' => [
            'showMenu' => false,
            'pageTitle' => 'Awesome title',
            'someArray' => [0,1,2,3]
        ]
    ],
```

### Limited to Controller in local namespace

```php
'layout_variables' => [
        Controller\IndexController::class => [
            'default' => [
                'showMenu' => false,
                'pageTitle' => 'Awesome title',
                'someArray' => [0,1,2,3]
            ]
        ]
    ],
```

### Or somewhere else

```php
'layout_variables' => [
        \Blog\Controller\IndexController::class => [
            'default' => [
                'showMenu' => false,
                'pageTitle' => 'Awesome title',
                'someArray' => [0,1,2,3]
            ]
        ]
    ],
```

### Limited to Action

```php
'layout_variables' => [
        Controller\IndexController::class => [
            'index' => [
                'showMenu' => false,
                'pageTitle' => 'Awesome title',
                'someArray' => [0,1,2,3]
            ]
        ]
    ],
```

### And now you can use it in your layout:

```html
<?php if($this->showMenu !== false) ?>
    <div class="awesomeMenu"></div>
<?php endif; ?>
```

This is all, happy haking
