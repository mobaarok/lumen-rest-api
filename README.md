# Lumen RestAPI 
## A CRUD Opeartion without Facades and Eloquent


## sample lumen route
```
$router->post('todo', [ 'uses' => 'TodoController@create']);
```

## insert data using raw sql
```
app('db')->insert(
            'insert into todos (todos, is_complete) values (?, ?)',
            [$todo, $is_complete]
        );
```