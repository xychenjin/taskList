<header>
    <nav>
        <span class="<?= (get_uri() == ''|| get_uri() == '/') ? 'active':''  ?>">
            <a href="http://dd.com.cn/" title="查看旧版本">返回旧版</a>
        </span>

        <span class="<?= get_uri() == '/php' ? 'active':'' ?>">
            <a href="<?= route('php') ?>" title="查看PHP相关内容">PHP相关</a>
        </span>

        <span class="<?= get_uri() == '/mysql' ? 'active':'' ?>">
            <a href="<?= route('mysqlinfo') ?>" title="查看MySQL版本">MYSQL版本</a>
        </span>

        <span class="<?= get_uri() == '/http' ? 'active':'' ?>">
            <a href="<?= route('httpdinfo') ?>" title="查看HTTP版本">HTTP版本</a>
        </span>

        <span class="<?= get_uri() == '/host' ? 'active':'' ?>">
            <a href="<?= route('hostinfo') ?>" title="查看本地hosts域名配置">HOSTS</a>
        </span>

        <span class="">
            <a href="">DEBUG</a>
        </span>

        <span class="<?= (get_uri() == '/other'|| strpos(get_uri(), 'refer')) ? 'active':'' ?>">
            <a href="<?= route('otherinfo') ?>">其他</a>
        </span>

        <span class="<?= get_uri() == '/about' ? 'active':'' ?>">
            <a href="<?= route('about.index') ?>" title="关于本站的特别说明">关于</a>
        </span>
    </nav>
</header>
