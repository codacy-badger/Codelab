<header id="clSection_<?php echo $clSection['id']; ?>" class="clSection header">
    <div class="container">
    <a href="/">
        <div class="logo">
            <div class="logo-text">
                <?php echo $clSection['meta']['logoText']; ?>
            </div>
        </div>
    </a>
    <div class="panel">
        <nav class="mainMenu">
            <ul>
                <?php
                foreach ($clSection['meta']['navigation'] as $key => $value):
                    ?>
                    <li>
                        <a href="<?php echo clApp::link(); ?><?php echo clApp::lang($value['link']); ?>">
                            <?php echo clApp::lang($value['name']); ?>
                        </a>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </nav>
        <div class="account">
            <a href="<?php echo clApp::link(); ?>/cl">
                <div class="image">
                    <img src="http://img.g3ck.com/320x346/jpg/000000/fff/g3ck" />
                </div>
                <div class="username">
                    <?php echo clApp::lang('login'); ?>
                </div>
            </a>
        </div>
    </div>
</header>
