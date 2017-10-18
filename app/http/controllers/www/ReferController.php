<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 10:51
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;
use Service\Input;

class ReferController extends Controller
{
    public function phpInfo()
    {
        return view('refer.phpinfo');
    }

    public function php()
    {
        return view('refer.php');
    }

    public function mysqlInfo()
    {
        return view('refer.mysql');
    }

    public function httpdInfo()
    {
        return view('refer.httpd');
    }

    public function hostInfo()
    {
        return view('refer.host');
    }

    public function otherInfo()
    {
        return view('refer.other');
    }

    public function reference()
    {
        return view('refer.index', []);
    }

    public function proc()
    {
        return view('refer.proc', []);
    }

    public function test()
    {
        return view('refer.test');
    }

    public function jsAnimate()
    {
        return view('refer.js.animate');
    }

    public function server()
    {
        $eco = '';
        foreach ($_SERVER as $key => $item) {
            $eco .= "<b style='color: red'>$key</b> => $item <br/>";
        }
        return view('refer.server', ['eco' => $eco]);
    }

    public function paramDetail()
    {
        $server = isset(func_get_args()[0]['q']) ? func_get_args()[0]['q'] : '';

        if (empty($server)) {
            $servers = [
                '_SERVER' => $_SERVER,
                '_SESSION' => isset($_SESSION) ? $_SESSION : [],
                '_GET' => $_GET,
                '_POST' => $_POST,
                '_REQUEST' => $_REQUEST,
                'GLOBALS' => $GLOBALS,
                '_FILES' => $_FILES,
                '_COOKIE' => $_COOKIE,
                '_ENV' => $_ENV,
            ];
            $eco = '';
            foreach ($servers as $key => $item) {
                $eco .= <<<EOT
    <h1>\$$key</h1>            
EOT;

                $eco .= (new static())->dispatch($item);
            }
            ;
            isset($servers['_FILES']) && ! empty($servers['_FILES']) && ! empty($servers['_FILES']['image']) && ! empty($servers['_FILES']['image']['name']) && move_uploaded_file($servers['_FILES']['image']['tmp_name'],  upload_path() . '/'. $filename = md5( date('Ymd').'/'. $servers['_FILES']['image']['name']) . $ext = '.'. pathinfo($servers['_FILES']['image']['name'], PATHINFO_EXTENSION));

            ! isset($filename) ? : $eco .=  "<img src='". getRequestName(). '/upload/'. $filename . "' />";
        } else {
            switch (strtoupper($server)) {
                case '_SERVER':
                    $server = $_SERVER;
                    break;
                case '_SESSION':
                    $server = isset($_SESSION) ? $_SESSION : [];
                    break;
                case '_GET':
                    $server = $_GET;
                    break;
                case '_POST':
                    $server = $_POST;
                    break;
                case '_REQUEST':
                    $server = $_REQUEST;
                    break;
                case 'GLOBALS':
                    $server = $GLOBALS;
                    break;
                case '_FILES':
                    $server = $_FILES;
                    break;
                case '_COOKIE':
                    $server = $_COOKIE;
                    break;
                case '_ENV':
                    $server = $_ENV;
                    break;
            }

            $eco = (new static())->dispatch($server);

        }

        return view('refer.server', ['eco' => $eco]);
    }

    private function dispatch($server)
    {
        $eco = '';
        if (is_string($server)) {
            $eco .= "<b style='color: green'>$server</b><br/>";
        }

        if (is_array($server)) {
            foreach ($server as $key => $item) {
                if (is_array($item)) {
                    $temp = '';

                    foreach ($item as $kk => $value) {
                        $temp .= '<br/>'.str_repeat('&nbsp;', 20 ). $kk . ' => '. json_encode($value);
                    }

                    $eco .= "<b style='color: green'>$key</b> => $temp <br/>";
                } else {
                    $eco .= "<b style='color: green'>$key</b> => ". json_encode($item)." <br/>";
                }
            }

        }
        return $eco;
    }

    public function param()
    {
        return view('refer.param');
    }

    public function jsTest()
    {
        // add line.
        ;


            

        die(1);
        foreach (fgets($stdin) as $key => $val) {
            var_dump($val);
        }

        fclose($stdin);
        die(1);

        return view('refer.jsTest');
    }
    
}