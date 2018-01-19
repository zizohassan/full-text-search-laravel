# full-text-search-laravel

## Description
Full text search in laravel on single or multiple fields

## Installation
```
  composer require 5dmatwebsearch/advancesearch:dev-master
```
## Add service provider (in config/app.php -> 'providers')
```
   AdvanceSearch\AdvanceSearchProvider\AdvanceSearchProvider::class,
```

## Add aliases (in config/app.php -> 'aliases')
```
   'Search' => AdvanceSearch\AdvanceSearchProvider\Facades\SearchFacades::class,
```

## Add index
Add index to fields
```
  php artisan index:table table fields
```
table = the table name <br>
fields = the fields you can add. One or more fields can be added like this: title,description,tags

Example
```
  php artisan index:table films title,description
```

## Search
You can now use the search function 
```php
  Search::search(modelName , fields, searchText  ,select , order , pagination , limit)

```
modelName = The table name <br>
fields = The fields you can add title,description,tags <br>
searchText = The text you're looking for <br>
select = The fields you want a return from. You can return with one field like this: title. Or more than one like ['title' , 'description']<br>
order = You can pass a single order field like this: id. Or you can pass the field and the way like this ['id' , 'desc'] <br>
pagination = True if you want pagination to be enabled, false if not. The package will paginate by default <br>
limit = The amount of results you want returned. (10 by default)<br>

First example with pagination
```php
Search::search(
      "Films" ,
      ['title' , 'description'] ,
      "Drama Outback GOLDFINGER"  ,
      ['modelName' , 'title', 'description'],
      ['film_id'  , 'asc'] ,
      true ,
      30
)
```
Second example with pagination
```php
Search::search(
      "Films" ,
      ['title' , 'description'] ,
      "Drama Outback GOLDFINGER"  ,
      ['id' , 'title', 'description'],
     'film_id'  
)
```
Example without pagination

```php
Search::search(
      "Films" ,
      ['title' , 'description'] ,
      "Drama Outback GOLDFINGER"  ,
      ['film_id' , 'title', 'description'],
      'film_id',
      false
)->where('film_id' , 10)->get()
```

