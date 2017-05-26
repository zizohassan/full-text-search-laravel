# full-text-search-laravel
full text search in laravel with more than one field

# install
```
  composer require 5dmatwebsearch/advancesearch:dev-master
```
# add service provider
```
   AdvanceSearch\AdvanceSearchProvider\AdvanceSearchProvider::class,
```

# add aliases
```
   'Search' => AdvanceSearch\AdvanceSearchProvider\Facades\SearchFacades::class,
```

# add index
add index to fields
```
  php artisan index:table table fields
```
table = the table name <br>
fileds = the fileds you can add one field or more than one like this title,description,tags

example
```
  php artisan index:table films title,description
```

# search
now you can use the search function 
```php
  Search::search(modelName , feilds, searchText  ,select , order , pagination , limit)

```
modelName = the table name <br>
fileds = the fileds you can add one field like title or more than one like this ['title' , 'description']<br>
searchText = the text you look for<br>
select = the fields you want to return with you can return with one field like this title or more then one like ['title' , 'description']<br>
order = you can pass only the order field like this id or you can pass the field and the way like this ['id' , 'desc']<br>
pagination = true if you want false if not if you not pass this , pakage will paginate by default<br>
limit = how many result you want 10 by default<br>

example with pagination
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
other example with pagination
```php
Search::search(
      "Films" ,
      ['title' , 'description'] ,
      "Drama Outback GOLDFINGER"  ,
      ['id' , 'title', 'description'],
     'film_id'  
)
```
example without pagination

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

