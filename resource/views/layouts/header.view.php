<header>
    <nav>
        <span class="">
            返回
            <a href="http://dd.com.cn/" title="查看旧版本" class="btn">旧版</a>|
            <a href="http://2018.m/" title="查看旧版本" class="btn">新版</a>
        </span>

        <span class="<?= (get_uri() == ''|| get_uri() == '/') ? 'active':''  ?>">
            <a href="<?= route('home') ?>" title="首页">首页</a>
        </span>

        <span class="<?= (get_uri() == '/php' || strpos(get_uri(), 'php') !== false ) ? 'active':'' ?>">
            <a href="<?= route('php') ?>" title="查看PHP相关内容" target="_blank">PHP相关</a>
        </span>

        <span class="<?= get_uri() == '/mysql' ? 'active':'' ?>">
            <a href="<?= route('mysqlinfo') ?>" title="查看MySQL版本" target="_blank">MYSQL版本</a>
        </span>

        <span class="<?= get_uri() == '/http' ? 'active':'' ?>">
            <a href="<?= route('httpdinfo') ?>" title="查看HTTP版本" target="_blank">HTTP版本</a>
        </span>

        <span class="<?= get_uri() == '/host' ? 'active':'' ?>">
            <a href="<?= route('hostinfo') ?>" title="查看本地hosts域名配置" target="_blank">HOSTS</a>
        </span>


        <span class="<?= get_uri() == '/golang' ? 'active':'' ?>">
            <a href="<?= 'http://golang.org' ?>" title="Golang" target="_blank">Golang</a>
        </span>

        <span class="">
            <a href="">DEBUG</a>
        </span>

        <span class="<?= (get_uri() == '/other'|| strpos(get_uri(), 'refer')) ? 'active':'' ?>">
            <a href="<?= route('otherinfo') ?>" target="_blank">其他</a>
        </span>

        <span >
            <a href="https://cs.laravel-china.org/" target="_blank">laravel 速查</a>
        </span>

        <span >
            <a href="https://leetcode-cn.com/" target="_blank">领扣</a>
        </span>

        <span >
            <a href="http://gitlab.psf-dev.com/" target="_blank">git-lab</a>
        </span>

        <span >
            <a href="http://zentao.psf-dev.com" target="_blank">禅道</a>
        </span>

        <span class="<?= get_uri() == '/about' ? 'active':'' ?>">
            <a href="<?= route('about.index') ?>" title="关于本站的特别说明" target="_blank">关于</a>
        </span>

        <span>
            <a href="http://jim.oa.com" target="_blank">OA管理系统</a>
        </span>

        <span>
            <a href="#" class="change-bg">换个背景?</a>&nbsp;
            <a href="#" onclick="getBg(this)" target="_blank">查看背景</a>
        </span>

        <span>
            <a href="<?= route('clock') ?>" onclick="" target="_blank">查看时间</a>
        </span>
    </nav>
</header>
