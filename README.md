<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 example of data filtering and searching</h1>
    <br>
</p>

## Features of project
- It is demo app for use Yii2 data presentation
- data filtering by fields
- searching
- downloading search results to CSV file
- multilanguage (En/Ru)

## Used technologies
- Yii2 (basic);  
- MySQL 8.0  
- PHP 7.4  


### Installation
- git clone THIS_REPO
- `composer install`
- change DB params in yii config to actual
- `yii migrate`
- The app can output text in a different language, English by default to switch to Russian specify in 
the app configuration:
```
return [
    'id' => 'applicationID',
    'basePath' => dirname(__DIR__),
    // ...
    'language' => 'ru-RU', // <- there!
    // ...
]
```

## How to use

- Open this site in browser
- You can search anything order by typing text into the field "Search orders" and press button "Search"
- Download CSV search result by press button "Save result"
- Good luck!