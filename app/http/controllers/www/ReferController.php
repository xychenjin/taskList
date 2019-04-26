<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 10:51
 */

namespace App\Http\Controllers\Www;


use App\Http\Controllers\Controller;

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

//      echo  intval(0.58*100);

        $array = [];

        $getFunc = function($name, $sex){
            return ['sss'=> false];
        };

        $res = $getFunc('李四', '男');
        if ($res['sss']) {
            echo "sure";
        } else {
            echo "unsure";
        }

        die(1);
        $str = <<<EOT
<!--<div class="RichContent-inner"><span class="RichText CopyrightRichText-richText" itemprop="text">泻 <span><span data-reactroot="" class="UserLink"><div class="Popover"><div id="Popover-76200-30319-toggle" aria-haspopup="true" aria-expanded="false" aria-owns="Popover-76200-30319-content"><a class="UserLink-link" data-za-detail-view-element_name="User" target="_blank" href="/people/b321d2de2e483f0cd500da3ede834373">&lt;!&ndash; react-text: 5 &ndash;&gt;@&lt;!&ndash; /react-text &ndash;&gt;&lt;!&ndash; react-text: 6 &ndash;&gt;左撇子&lt;!&ndash; /react-text &ndash;&gt;</a></div>&lt;!&ndash; react-empty: 7 &ndash;&gt;</div></span></span> 药。另外我很欣赏你的签名，棒棒哒！<br>严谨回答的话，我们首先得定义安全感。从这个角度上来说，<a href="https://www.zhihu.com/people/zhang-an-21-58" class="internal">张小姐</a>的回答思路正确，但是分类过于笼统。<br><blockquote>广义上的安全感，说到底也就是<b>女性长期择偶策略</b>里的最重要的几项偏好是否满足。</blockquote><p><b>一 对资源占有/获取的偏好</b><br>这一偏好是女性长择策略里<b>最重要最根本</b>的，说得直白点，<b>就是拜金</b>——我说的不是拜金主义——拜金主义说白了是只看眼前不计未来，并且把最重要当成了唯一重要。很愚蠢。所以：<br>1.如果男生很穷，没有安全感。<br>2.如果男生很穷而且看不到富起来的潜力，没有安全感。<br>3.如果男生花钱大手大脚无计划，没有安全感。</p><p><b>二 对愿意为自己/子女投资的偏好</b><br>这一偏好的含义在，对于繁衍成本极低的男性来说，脱裤子嘿嘿嘿提裤子走掉这种事做出来其实是非常简单的。但是繁衍成本极高的女性必须尽可能避免这种情况的发生。同时，对子女的态度决定了男性是否愿意亲代投资。所以：<br>1.如果男生不可靠（花心），没有安全感。<br>2.如果男生始终不愿意给出承诺（结婚），没有安全感。<br>3.如果男生不喜欢小孩，不愿意与小孩互动，没有安全感。</p><p><b>三 对有能力保护自己/后代的偏好</b><br>这一偏好体现了<b>在很长时间内女性跟男性的身体素质都有巨大差距（女权主义来撕！），</b>就算是没差距吧，在怀胎十月哺育期一年以及养育期六年（暂定）里，基本上女性都是没办法自保的。所以：<br>1.如果男生体格（身高）瘦小，没有安全感。<br>2.如果男生没有力量，没有安全感。<br>3.如果男生缺乏勇气，没有安全感。<br>4.如果男生没有一项以上体育运动爱好，没有安全感。</p><p><b>四 对可相互适应的偏好</b><br>这一偏好就显得“人性”一些了，这或许也是人和动物的区别。动物不用考虑两口子过日子和谐不和谐什么的。但是人得考虑，所以：<br>1.双方价值观差距太大，没有安全感。<br>2.男方年龄较小（女性普遍愿意找比自己大三岁左右的配偶），没有安全感。<br>3.男生情绪不稳定易怒易冲动，没有安全感。</p><p><b>基本上这个分类就囊括了上面绝大多数的回答。上面的所有回答在这里都能找到答案。</b></p><br><blockquote>狭义上的安全感，说到底就是女性<b>个人安全的保障</b>，对于<b>感情的承诺</b>。</blockquote>这两点可以对应上面广义的一些分类， 我就不拆分说了。我需要强调的是，以上广义的长择偏好选择，是携带在我们基因里的适应性问题。但是，<b>我们的基因毕竟已经2.5万年没有大的变异了。</b>所以，题主的问题，结合这一理论之后， 切合现代社会实际的回答应该是以下：<br>1.你连稍好的生活水平（潜力）都没有，你怎么给姑娘安全感？<br>2.你连愿意为她付出的心思都没有，你怎么给姑娘安全感？<br>3.你连一副健康的身体都没有，你怎么给姑娘安全感？<br>4.你连直面意外的勇气和应对方法都没有，你怎么给姑娘安全感？<br>5.你连基本的教养礼貌、控制情绪的能力都没有，你怎么给姑娘安全感？<br>以上你不特指题主，特指<b>各种型号的loser</b>。包括看起来<b>像是贵乎大V的各种loser</b>、直男癌患者。</span>&lt;!&ndash; react-empty: 15085 &ndash;&gt;</div>-->

<div class="ContentItem AnswerItem" data-za-index="3" data-zop="{&quot;authorName&quot;:&quot;喵星星&quot;,&quot;itemId&quot;:75029692,&quot;title&quot;:&quot;男性什么样的行为应该称为直男癌？&quot;,&quot;type&quot;:&quot;answer&quot;}" name="75029692" itemprop="suggestedAnswer" itemtype="http://schema.org/Answer" itemscope="" data-za-module="AnswerItem" data-za-module-info="{&quot;card&quot;:{&quot;has_image&quot;:false,&quot;has_video&quot;:false,&quot;content&quot;:{&quot;type&quot;:&quot;Answer&quot;,&quot;token&quot;:&quot;75029692&quot;,&quot;upvote_num&quot;:2116,&quot;comment_num&quot;:721,&quot;publish_timestamp&quot;:null,&quot;parent_token&quot;:&quot;38123408&quot;,&quot;author_member_hash_id&quot;:&quot;e8785ee9d9aa73616df88beb945e33ec&quot;}}}"><div class="ContentItem-meta"><div class="AnswerItem-meta AnswerItem-meta--related"><div class="AuthorInfo" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><meta itemprop="name" content="喵星星"><meta itemprop="image" content="https://pic1.zhimg.com/50/2fdeb3a22cc22d2e8d8171766893f250_hd.jpg"><meta itemprop="url" content="https://www.zhihu.com/people/miao-xing-xing-93"><meta itemprop="zhihu:followerCount" content="2061"><span class="UserLink AuthorInfo-avatarWrapper"><div class="Popover"><div id="Popover-23069-68737-toggle" aria-haspopup="true" aria-expanded="false" aria-owns="Popover-23069-68737-content"><a class="UserLink-link" data-za-detail-view-element_name="User" href="/people/miao-xing-xing-93"><img class="Avatar AuthorInfo-avatar" width="38" height="38" src="https://pic1.zhimg.com/50/2fdeb3a22cc22d2e8d8171766893f250_xs.jpg" srcset="https://pic1.zhimg.com/50/2fdeb3a22cc22d2e8d8171766893f250_l.jpg 2x" alt="喵星星"></a></div><!-- react-empty: 1009 --></div></span><div class="AuthorInfo-content"><div class="AuthorInfo-head"><span class="UserLink AuthorInfo-name"><div class="Popover"><div id="Popover-23069-47772-toggle" aria-haspopup="true" aria-expanded="false" aria-owns="Popover-23069-47772-content"><a class="UserLink-link" data-za-detail-view-element_name="User" href="/people/miao-xing-xing-93">喵星星</a></div><!-- react-empty: 1016 --></div></span></div><div class="AuthorInfo-detail"><div class="AuthorInfo-badge"><div class="RichText AuthorInfo-badgeText">我的脖子雪白 接得一碗好热血</div></div></div></div></div><div class="AnswerItem-extraInfo"><span class="Voters"><button class="Button Button--plain" type="button">2116 人赞同了该回答</button><!-- react-empty: 1023 --></span></div></div></div><meta itemprop="image" content=""><meta itemprop="upvoteCount" content="2116"><meta itemprop="url" content="https://www.zhihu.com/question/38123408/answer/75029692"><meta itemprop="dateCreated" content="2015-12-03T02:53:31.000Z"><meta itemprop="dateModified" content="2017-03-14T03:54:01.000Z"><meta itemprop="commentCount" content="721"><div class="RichContent RichContent--unescapable"><div class="RichContent-inner"><span class="RichText CopyrightRichText-richText" itemprop="text"><p>几年前相亲过一让人很不舒服的男人 大概就是你们口中的直男癌了:</p><p>1 你赶紧的啊都30了挑毛啊挑，明天搬过来同居年底我们能有娃（身高165体重170穿衣土成渣比我大很多，初次见面还不准我考虑？）</p><p>2 你会做饭吧？搬过来给我做饭呗！上班才几个钱，以后我公司运作起来赚的都是你的（满口的大数据专利垄断资本运作住个深圳郊区农民房）</p><p>3 你住罗湖？罗湖那边都是做鸡的你马上搬家别给我和那些女人学的好吃懒做我这都是为你好！</p><p>4 你符合我对女人的所有幻想。前天相了个矮冬瓜，说是医学研究生，把学历亮出来甩她几条街 哼！（他是华中科技大学，要不是看在他学历还好，不然根本不会去赴约）</p><p>5 啥？你出过国？交往过外国人？那你废了已经！</p><p>6 你那套假洋鬼子理念根本不可能实现，你所说的自由和平等都是假象，真是好的不学，坏的打包！</p><p>7  30还未婚已经是穷途末路了，赶紧跟我同居好好改造！对我没感觉是吧？重视性生活吗，让你性生活满意了，你就离不开我了！（强调很多遍我现年29，并且是宁缺勿滥 ）</p><p>8 啥意思？就是嫌我没买房呗！过渡一下怎么了？事业型的男人家里要什么讲究？你给我打理一下不就有家的感觉了？都这样说了还不满意，你很喜欢踩在人头上是吧？(为了不折人面子，第二天和介绍人一起去了他居所，在我切菜时说厨房太破败放不平砧板的时候)</p><p>这是我在(麦当劳)一次相亲的奇遇。总共见了两次面，结果当然是我微笑着发了好人卡结束了，因为我觉得他完全没有接受纠正的必要。</p><p>补充 : 过去不久后，有天他忽然发我微信，“看你朋友圈有个女的挺不错，是你朋友吗？介绍给我撒 ” <br>当场被我彻底拉黑(ಥ_ಥ)</p>接受大家的批评和意见，也是我相的太少没经验，配合的太认真，犯了“客气病”， 现在改了很多了，有时候简单粗暴才痛快嘛！我已经自由恋爱结婚了，谢谢大家！</span><!-- react-empty: 2666 --></div><div><div class="ContentItem-time"><a target="_blank" href="/question/38123408/answer/75029692"><span data-tooltip="发布于 2015-12-03"><!-- react-text: 1038 -->编辑于 <!-- /react-text --><!-- react-text: 1039 -->2017-03-14<!-- /react-text --></span></a></div><div class="AnswerReward"><!-- react-empty: 3010 --><!-- react-empty: 1042 --></div></div><div class="ContentItem-actions"><span><button class="Button VoteButton VoteButton--up" aria-label="赞同" type="button"><svg viewBox="0 0 20 18" class="Icon VoteButton-upIcon Icon--triangle" width="9" height="16" aria-hidden="true" style="height: 16px; width: 9px;"><title></title><g><path d="M0 15.243c0-.326.088-.533.236-.896l7.98-13.204C8.57.57 9.086 0 10 0s1.43.57 1.784 1.143l7.98 13.204c.15.363.236.57.236.896 0 1.386-.875 1.9-1.955 1.9H1.955c-1.08 0-1.955-.517-1.955-1.9z"></path></g></svg><!-- react-text: 2673 -->2.1K<!-- /react-text --></button><button class="Button VoteButton VoteButton--down" aria-label="反对" type="button"><svg viewBox="0 0 20 18" class="Icon VoteButton-downIcon Icon--triangle" width="9" height="16" aria-hidden="true" style="height: 16px; width: 9px;"><title></title><g><path d="M0 15.243c0-.326.088-.533.236-.896l7.98-13.204C8.57.57 9.086 0 10 0s1.43.57 1.784 1.143l7.98 13.204c.15.363.236.57.236.896 0 1.386-.875 1.9-1.955 1.9H1.955c-1.08 0-1.955-.517-1.955-1.9z"></path></g></svg></button></span><button class="Button ContentItem-action Button--plain" type="button"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" class="Icon Icon--comment Icon--left" width="12" height="16" aria-hidden="true" style="height: 16px; width: 12px;"><title></title><g><path d="M7.24 16.313c-.272-.047-.553.026-.77.2-1.106.813-2.406 1.324-3.77 1.482-.16.017-.313-.06-.394-.197-.082-.136-.077-.308.012-.44.528-.656.906-1.42 1.11-2.237.04-.222-.046-.45-.226-.588C1.212 13.052.027 10.73 0 8.25 0 3.7 4.03 0 9 0s9 3.7 9 8.25-4.373 9.108-10.76 8.063z"></path></g></svg><!-- react-text: 2682 -->721 条评论<!-- /react-text --></button><div class="Popover ShareMenu ContentItem-action"><div class="" id="Popover-23866-17019-toggle" aria-haspopup="true" aria-expanded="false" aria-owns="Popover-23866-17019-content"><button class="Button Button--plain" type="button"><svg viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg" class="Icon Icon--share Icon--left" width="13" height="16" aria-hidden="true" style="height: 16px; width: 13px;"><title></title><g><path d="M.93 3.89C-.135 4.13-.343 5.56.614 6.098L5.89 9.005l8.168-4.776c.25-.128.477.197.273.388L7.05 10.66l.926 5.953c.18 1.084 1.593 1.376 2.182.456l9.644-15.243c.584-.892-.212-2.03-1.234-1.796L.93 3.89z"></path></g></svg><!-- react-text: 2689 -->分享<!-- /react-text --></button></div><!-- react-empty: 2690 --></div><button class="Button ContentItem-action Button--plain" type="button"><svg viewBox="0 0 20 20" class="Icon Icon--star Icon--left" width="13" height="16" aria-hidden="true" style="height: 16px; width: 13px;"><title></title><g><path d="M3.515 17.64l.918-5.355-3.89-3.792c-.926-.902-.64-1.784.64-1.97L6.56 5.74 8.964.87c.572-1.16 1.5-1.16 2.072 0l2.404 4.87 5.377.783c1.28.186 1.566 1.068.64 1.97l-3.89 3.793.918 5.354c.22 1.274-.532 1.82-1.676 1.218L10 16.33l-4.808 2.528c-1.145.602-1.896.056-1.677-1.218z"></path></g></svg><!-- react-text: 2695 -->收藏<!-- /react-text --></button><button class="Button ContentItem-action Button--plain" type="button"><svg width="14" height="16" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg" class="Icon Icon--thank Icon--left" aria-hidden="true" style="height: 16px; width: 14px;"><title></title><g><path d="M0 5.437C0 2.505 2.294.094 5.207 0 7.243 0 9.092 1.19 10 3c.823-1.758 2.65-3 4.65-3C17.546 0 20 2.507 20 5.432 20 13.24 11.842 18 10 18 8.158 18 0 13.24 0 5.437z" fill-rule="evenodd"></path></g></svg><!-- react-text: 2700 -->感谢<!-- /react-text --></button><div class="Popover ContentItem-action"><button class="Button Button--plain" type="button" id="Popover-23866-38835-toggle" aria-haspopup="true" aria-expanded="false" aria-owns="Popover-23866-38835-content" style="padding: 0px 1px;"><svg viewBox="0 0 18 4" class="Icon Icon--dots" width="14" height="16" aria-hidden="true" style="height: 16px; width: 14px;"><title></title><g><g><circle cx="2" cy="2" r="2"></circle><circle cx="9" cy="2" r="2"></circle><circle cx="16" cy="2" r="2"></circle></g></g></svg></button><!-- react-empty: 2706 --></div></div></div><!-- react-empty: 1088 --><!-- react-empty: 3011 --><!-- react-empty: 1090 --><!-- react-empty: 1091 --><!-- react-empty: 3012 --><!-- react-empty: 1093 --></div>
EOT;


        echo $str;




        die(1);


        echo "开始时间： ". ($strtime = microtime(time())) ." <br/>";

        $arrays = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $count = 1;

        $array_count = [];

        while ($count <= 1000000) {
//            echo "第 $count 次：" . ($val = array_rand($arrays));
//            echo "\n";
            $val = array_rand($arrays);
            $count ++;
            $array_count[$val] = isset($array_count[$val]) ? $array_count[$val] + 1 : 1;
        }

        ksort($array_count);
        foreach ($array_count as $key => $value) {
            echo "$key 出现了：$value 次 <br/>";
        }

        echo array_sum($array_count);
        echo "结束时间： ". ($endtime = microtime(time())) ."，耗时：". ($endtime - $strtime )."ms <br/>";
        exit(1);
        return view('refer.jsTest');
    }

    public function brother()
    {
        try {
            $i = rand(1, 100);

            echo "随机数：$i <br/><br/>";

            if ($i%12 == 0 ) {
                throw new \InvalidArgumentException('非法参数类异常, 12的倍数');
            }

            if ($i%13 == 0) {
                throw new \RuntimeException('运行时触发类异常, 13的倍数');
            }

            if ($i%8 == 0) {
                throw new \Exception('普通异常，8的倍数');
            }

            if ($i%5 == 0) {
                throw new \LogicException('逻辑异常，5的倍数');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function jd()
    {
//        $start = \DateTime::createFromFormat('m-d-Y', '01-01-2012');
//
//        echo $start->format('Y-m-d');
//
//        $end = clone $start;
//
//        $end->add(new \DateInterval('P1M6D'));
//
//        $diff = $end->diff($start);
//        echo 'Difference: ' . $diff->format('%m month, %d days (total: %a days)') . "\n";

//
//        echo "九九乘法表 <br/>";
//
//        echo "<div style='display: inline-block'>";
//        for ($v = 1 ; $v < 10; $v++) {
//            echo "<span style='width: 120px;height: 40px;text-align: center;line-height: 40px;display: block;float: left'>" . $v . "</span>";
//        }
//        echo "</div>";
//
//        echo "<br/>";
//
//
//        echo "<div style='display: inline-block'>";
//        for($i = 1; $i< 10;$i++){
//            $str = '<span style="height: 40px;text-align: center;line-height: 40px;display: block;float: left">'. $i ."</span>";
//
//            for ($j = 1; $j< 10; $j++) {
//                $s = $i . " * ". $j ." = ". ($i * $j);
//
//                if ($i == $j ) {
//                    $str .= "<span style='width: 120px;height: 40px;text-align: center;line-height: 40px;display: block;float: left;color:red'>" . $s ."</span>";
//                } else {
//                    $str .= "<span style='width: 120px;height: 40px;text-align: center;line-height: 40px;display: block;float: left'>" . $s ."</span>";
//                }
//            }
//
//            echo $str . "<br/>";
//        }
//
//        echo "</div>";
        $i = 0;
        while ($i < 1000) {
            echo "1392088" . sprintf("%04d", $i+1). "<br/>";
            $i ++;
        }

    }

}