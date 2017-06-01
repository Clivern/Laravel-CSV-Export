# Laravel CSV Export

Export a Large Dataset in CSV Format. It is based on Symfony’s StreamedResponse and Laravel’s chunked queries.

*Current version: [v1.0.3]*


## Installation

Via Composer

``` bash
$ composer require clivern/lce
```

Then add the ServiceProvider to the providers array in `config/app.php`

```php
'providers' => [
    // ...
    Clivern\Lce\LceServiceProvider::class,
    // ...
],
```

You can use the facade for shorter code. Add this to your aliases:

```php
'aliases' => [
    // ...
    'Lce' => Clivern\Lce\Facades\Lce::class,
    // ...
],
```

The class is bound to the ioC as `lce`

```php
$lce = App::make('lce');
```

## Usage

For Example Let's use it to export options table.

``` php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option; # Eloquent Model
use Validator;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{

    public function indexRender()
    {

        return \App::make('lce')
            ->file('options')
            ->source(new Option)
            ->chunks(10)
            ->header([["Id","Option Key","Option Value"], ['', '', '']])->callback(function($option){
                return [
                    $option->id,
                    $option->op_key,
                    $option->op_value,
                ];
            })->export();
    }
}
```

## Change log
```
Version 1.0.3:
> New method to get CSV file content.
> New feature to add two rows in single return.

Version 1.0.2:
> Docs Updated.

Version 1.0.1:
> Docs Updated.
> UTF-8 Support Added.

Version 1.0.0:
> Initial Release.
```

## Security

If you discover any security related issues, please email hello@clivern.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.