<?php
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
////echo ROOT . "<br>";
////echo APP . "<br>";
////echo dirname(__DIR__);
//// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
//// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

    define('URL_PUBLIC_FOLDER', 'public');
    define('URL_PROTOCOL', '//');
    define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
    define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
    define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
//use Jenssegers\Blade\Blade;
//
//$blade = new Blade(ROOT.'application/view/', ROOT.'application/cache');
//
////$blade->view('home/test');
//echo $blade->make('home/test', ['name' => 'John Doe']);


//$dispatcher = new Illuminate\Events\Dispatcher;
//$router = new Illuminate\Routing\Router($dispatcher);
//
////$r = new Route();
//
//$url = '/';
//$action = '\App\controller\Home@index';
//$router->get($url, $action);
////$router->get('/', '\App\controller\Home@index');
//$router->get('home/exampleone', '\App\controller\Home@exampleOne');
//$router->get('home/exampletwo', '\App\controller\Home@exampleTwo');
//$router->get('songs', '\App\controller\Songs@index');


//function routing($method, $url, $controller){
//
//}
//
//routing();

//$request = Illuminate\Http\Request::createFromGlobals();
//$response = $router->dispatch($request);
//$response->send();

//if(true)
//    redirect('songs/editsong');
//echo "hello";
$validator = new JeffOchoa\ValidatorFactory();
//$v = $validator->translationsRootPath(APP . 'src/')->make($data = ['bar'='something'], $rules = ['foo' => 'required']);
//
$data = ['bar'=>'', 'foo' => ''];
$rules = ['foo' => 'required', 'bar'=>'required'];

$res = $validator->make($data, $rules);
print_r($res->errors()->toArray());


// use Illluminate\Http\Request
// $request = Request::



/* Sacuvano iz songs/index.blade.php
{{URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8')}}

            @foreach($songs as $song)
                <tr>
                    <td>@if(isset($song->id)) {{htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8')}} @endif</td>
                    <td>@if(isset($song->artist)) {{htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8')}} @endif</td>
                    <td>@if(isset($song->track)) {{htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8')}} @endif</td>
                    <td>
                        @if (isset($song->link))
                            <a href="{{htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8')}}">{{ htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8') }}</a>
                        @endif
                    </td>
                   <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    ?>
                    @if($status=='admin')
                    <td><a onclick='deleteSong({{$song->id}});return false' href="">delete</a></td>
                    <td><a href="{{URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8')}}">edit</a></td>
                        <td><a onclick='get();return false' href="">GET</a></td>
                    @endif
                </tr>
            @endforeach
                        {{--var td1 = document.createElement("td");--}}
                        {{--td1.innerHTML = res[i].id;--}}
                        {{--var td2 = document.createElement("td");--}}
                        {{--td2.innerHTML = res[i].artist;--}}
                        {{--var td3 = document.createElement("td");--}}
                        {{--td3.innerHTML = res[i].track;--}}
                        {{--var td4 = document.createElement("td");--}}
                        {{--td4.innerHTML = res[i].link;--}}
                        {{--var td5 = document.createElement("td");--}}
                        {{--td5.innerHTML = "<a onclick='deleteSong(" + res[i].id + ")' href='#'>delete</a>";--}}
                        {{--var td6 = document.createElement("td");--}}
                        {{--td6.innerHTML = "<a href='/songs/editsong/"+ res[i].id +"'>edit</a>";--}}

                        {{--tr.appendChild(td1);--}}
                        {{--tr.appendChild(td2);--}}
                        {{--tr.appendChild(td3);--}}
                        {{--tr.appendChild(td4);--}}
                        {{--@if($status=='admin')--}}
                        {{--tr.appendChild(td5);--}}
                        {{--tr.appendChild(td6);--}}
                        {{--@endif--}}
                        {{--tbody.appendChild(tr);--}}


*/
