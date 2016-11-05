# Laravel CSV Export

Export a Large CSV Files with Laravel.

*Current version: [v1.0.0]*


## Installation

Via Composer

``` bash
$ composer require clivern/lce
```

Then add the ServiceProvider to the providers array in `config/app.php`

```php
Clivern\Lce\LceServiceProvider::class,
```

You can use the facade for shorter code. Add this to your aliases:

```php
'Lce' => Clivern\Lce\Facades\Lce::class,
```

The class is bound to the ioC as `excel`

```php
$lce = App::make('lce');
```

## Usage

First configure uploader class.
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
Version 1.0.0
> Initial Release
```

## Security

If you discover any security related issues, please email hello@clivern.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.