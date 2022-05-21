# PHP router

 For application routing

## Usage
То есть схема такая:

`http://[domain]/[controller]/[method]`

Например:

http://my-site.loc/page/view

В этом случае контроллер - page, метод - view.

Класс контроллера определять по схеме [неймспейс] + [название контроллера с большой буквы].

Нейспейс для классов контроллеров получать в конструкторе.

Например, конструктор получает строку типа 'Vendor\Package\App\Controllers'. Тогда полное имя класса контроллера будет определяться как Vendor\Package\App\Controllers\Page

```
$factory = new RouterFactory(['controllersNamespace' => 'IvanDanylenko\\Router']);
$router = $factory->createComponent();
$callable = $router->route('/test/hello');
$callable();
```