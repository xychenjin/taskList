<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 11:23
 */

namespace Service;

use \Exception;

class App
{
    public function handle()
    {
        $this->boot();
    }

    private function boot()
    {
        try {
            ini_set('date.timezone', 'Asia/Shanghai');
            $requestUri = $_SERVER["REQUEST_URI"];
            $requestQueryString = $_SERVER["QUERY_STRING"];

            $controllerNamespace = 'App\Http\Controllers';
            list($requestQueryUri) = explode('?', $requestUri);

//            if (! file_exists($compileFile = compile_file())) {
                _autoCompileRouter();
//            }

            $compiledRouter = file_get_contents(compile_file());
            $compiledRouter = json_decode($compiledRouter, true);

            foreach ($compiledRouter as $key => $router) {
                list($uri, $namespace, $aliasName) = $router;
                if ($requestQueryUri === '/' . ltrim($uri, '/')) {
                    list($class, $method) = explode('@', $namespace);
                    $className = strpos($class,
                        $controllerNamespace) !== false ? $class : $controllerNamespace . '\\' . $class;
                    parse_str($requestQueryString, $params);
                    return call_user_func([$className, $method], $params);
                }
                unset($compiledRouter[$key]);
            }

            throw new Exception('Not Found! ', 404);
        } catch (Exception $e) {
            $this->render($e->getCode());
            $this->log($e->getCode() . ' '.$e->getMessage() . ' '. $e->getFile(). ' '. $e->getLine(). "\n". $e->getTraceAsString());
        }
    }

    private function render($code = 404)
    {
        if (file_exists($file = static_path() . './error/'. $code. '.html')) {
            require $file;
            return ;
        }
    }

    private function log($msg)
    {
        $msg = "\n[". date('Y-m-d H:i:s')."] " . $msg;
        file_put_contents(storage_path(). '/logs/log-'. date('Y-m-d'). '.log', $msg, FILE_APPEND);
    }
}