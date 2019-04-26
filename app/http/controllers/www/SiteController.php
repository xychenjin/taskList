<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/5
 * Time: 10:30
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;
use Service\Input;
use \stdClass;

class SiteController extends Controller
{
    public function index()
    {
        $hosts = config('host');
        $input = new Input();
        $keywords = trim($input::get('index'));

        $plattenHosts = [];


        //搜索链接
        $searchUrls = [];
        //搜索名称
        $searchNames = [];
        //历史记录
        $historyRecorders = [];

        //搜索其他
        $searchCollections = [];
        array_map(function ($arrays) use(& $plattenHosts){
            foreach ($arrays as $key=>$value) {
                $plattenHosts[$key] = $value;
            }
        }, $hosts);

        if (isset($_COOKIE['searchKey'])) {
            $historyRecorders = json_decode(base64_decode($_COOKIE['searchKey']), true);
            arsort($historyRecorders);
        }

        if ($keywords = trim($keywords)) {
            $historyRecorders = [];

            foreach ($plattenHosts as $hostlink => $hostname) {
                if (strpos($hostlink, $keywords) !== false) {
                    $searchUrls[$hostlink] = $hostname;
                }
                if (strpos($hostname, $keywords) !== false) {
                    $searchNames[$hostlink] = $hostname;
                }
            }

            $historyRecorders[$keywords] = $storeSearchKeys[$keywords] = 1;

            if (isset($_COOKIE['searchKey'])) {
                $storeSearchKeys = json_decode(base64_decode($_COOKIE['searchKey']), true);
                arsort($storeSearchKeys);

                foreach ($storeSearchKeys as $key => $value) {
                    $historyRecorders[$key] = $key == $keywords ? $value + 1 : $value;
                }
                $storeSearchKeys[$keywords] = isset($storeSearchKeys[$keywords]) ? $storeSearchKeys[$keywords] + 1 : 1;
            }

            $searchKeysSerial = base64_encode(json_encode($storeSearchKeys));
            setcookie('searchKey', $searchKeysSerial, time() + 30 * 86400);
        }

        return view('index', compact('hosts', 'keywords', 'searchUrls', 'searchNames', 'searchCollections', 'historyRecorders'));
    }

    public function countClick()
    {
        $input = new Input();
        $name = $input::get('name');

        $file = @file_get_contents($filename = storage_path().'/json/'. md5("url_click_count"));

        $arrs = json_decode($file, true);

        $arrs[$name] = isset($arrs[$name]) ? ($arrs[$name] + 1) : 1;

        file_put_contents($filename, json_encode($arrs));

        echo json_encode(['msg' => 'ok', 'code' => 0, 'data' => ['times' => $arrs[$name]] ]);
    }

    public function deleteCookie()
    {
        $input = new Input();
        $k = $input::get('k');

        if (isset($_COOKIE['searchKey']) ) {
            $cookie = $_COOKIE['searchKey'];

            $storeCookie = json_decode(base64_decode($cookie));

            if (isset($storeCookie[$k]))
                unset($storeCookie[$k]);

            if (! $storeCookie) {
                setcookie('searchKey', '', 0);
            } else {
                setcookie('searchKey', base64_encode(json_encode($storeCookie)), time() + 30 * 86400);
            }

        }

        echo json_encode(['msg' => 'ok', 'code' => 0, 'data' => null]);
    }
}