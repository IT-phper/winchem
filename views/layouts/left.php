<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Winchem Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '主页',
                        'icon' => 'map',
                        'url' => '#',
                        'items' => [
                            ['label' => '轮播图', 'icon' => 'cloud', 'url' => ['/sowing'],],
                            ['label' => '关于我们', 'icon' => 'maxcdn', 'url' => ['/company/about'],],
                        ],
                    ],
                    [
                        'label' => '公司简介',
                        'icon' => 'map',
                        'url' => '#',
                        'items' => [
                            ['label' => '公司简介', 'icon' => 'cloud', 'url' => ['/company/index'],],
                            ['label' => '发展史', 'icon' => 'cloud', 'url' => ['/company/phylogeny'],],
                            ['label' => '公司文化', 'icon' => 'maxcdn', 'url' => ['/company/cultrue'],],
                            ['label' => '公司荣誉', 'icon' => 'hand-o-right', 'url' => ['/picture'],],
                            ['label' => '经营理念', 'icon' => 'exclamation', 'url' => ['/company/ideal'],],
                        ],
                    ],
                    ['label' => '新闻动态', 'icon' => 'cloud', 'url' => ['/articles'],],
                    [
                        'label' => '产品系列',
                        'icon' => 'map',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => '产品种类',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => '清洁剂产品', 'icon' => 'cloud', 'url' => ['/classes'],],
                                    ['label' => '设备产品', 'icon' => 'cloud', 'url' => ['/classes2'],],
                                ],
                            ],
                            ['label' => '产品信息', 'icon' => 'cloud', 'url' => ['/product'],],
                        ],
                    ],
                    ['label' => '业务模式', 'icon' => 'cloud', 'url' => ['/company/pattern'],],
                    ['label' => '项目案例', 'icon' => 'cloud', 'url' => ['/project'],],
                    ['label' => '联系我们', 'icon' => 'cloud', 'url' => ['/contact'],],
                ],
            ]
        ) ?>

    </section>

</aside>
