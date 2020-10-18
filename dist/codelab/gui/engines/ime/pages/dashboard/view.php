<?php
    engine::asset(
        array(
            // Plugins
            '/assets/plugins/Chart.js/Chart.min.js',
            // Widgets
            '/assets/styles/widgets/char-visitors-log-dashboard.css',
            '/assets/styles/widgets/release.css',
            '/assets/styles/widgets/your-customer-support.css',
            '/assets/styles/widgets/notifications-little.css',
            '/assets/styles/widgets/news-display.css'
        )
    );

?>
<!-- char-visitors-log-dashboard -->
<div class="g">
    <div class="g310">
        <div class="widget char-visitors-log-dashboard s">
            <div class="char">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="badge hoverHide">Scoope Logs<span class="subtext"><?php echo lang::text('last 24 hours', 'l'); ?></span></div>
            <div class="values g">
                <div class="g13"><span>43 204</span><?php echo lang::text('Pages Views', 'uf'); ?></div>
                <div class="g13"><span>374</span><?php echo lang::text('visitors', 'uf'); ?></div>
                <div class="g13"><span>6.23</span><?php echo lang::text('Views by user', 'uf'); ?></div>
            </div>
        </div>
    </div>
    <div class="g310">
        <div class="widget char-visitors-log-dashboard s">
            <div class="char">
                <canvas id="myChart2"></canvas>
            </div>
            <div class="badge hoverHide">Scoope Logs<span class="subtext"><?php echo lang::text('last 12 months', 'l'); ?></span></div>
            <div class="values g">
                <div class="g13"><span>443 204 895</span><?php echo lang::text('Pages Views', 'uf'); ?></div>
                <div class="g13"><span>373444</span><?php echo lang::text('visitors', 'uf'); ?></div>
                <div class="g13"><span>1.23</span><?php echo lang::text('Views by user', 'uf'); ?></div>
            </div>
        </div>
    </div>
    <div class="g410">
        <div class="widget release s">
            <div class="inner">
                <div class="name">
                    SPF Tool
                </div>
                <div class="badge red">
                    <a href="">
                    <i class="fas fa-exclamation-circle"></i> Update to <span>Launcher 2.1.3</span>
                    </a>
                </div>
                <div class="build">
                    <div class="codename">
                        <?php echo clCodename; ?>
                    </div>
                    <div class="version">
                        <?php echo clVersion; ?>
                    </div>
                </div>
                <div class="more">
                    <a href="">Release notes</a> <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- char-visitors-log-dashboard -->
<div class="g">
    <div class="dashboardWidgets g510">
        <div class="widget char-visitors-log-dashboard">
            <h1>Your notifications</h1>
            <div class="values g">
                <div class="g13"><span>43 204</span><?php echo lang::text('Pages Views', 'uf'); ?></div>
                <div class="g13"><span>374</span><?php echo lang::text('visitors', 'uf'); ?></div>
                <div class="g13"><span>6.23</span><?php echo lang::text('Views by user', 'uf'); ?></div>
            </div>
        </div>
    </div>


    <div class="g310">






        <?php if (registry::get('dashboard.news.display', 1) != 0): ?>
        <div class="widget news-display">
            <h1>SPF News</h1>

            <?php
            $loadedCount = 0;
            $ctx = stream_context_create(array('http'=>
                array(
                    'timeout' => 3,
                )
            ));
            $source = @file_get_contents(registry::get('dashboard.news.source', 'https://api.g3ck.com/codelab/news'), false, $ctx);
            $sourceArray = json_decode(utf8_decode($source));
            $sourceArray = get_object_vars($sourceArray);

            if ($source AND is_array($sourceArray)):
            ?>
            <ul>
                <?php
                foreach ($sourceArray as $key => $value):
                    $values = get_object_vars($sourceArray[$key]);
                    if (isset($values['url']) AND isset($values['title']) AND isset($values['date']) AND isset($values['author'])):
                        $loadedCount++;
                        ?>
                    <li>
                        <a target="blank" href="<?php echo $values['url']; ?>">
                        <?php if (isset($values['image'])): ?>
                            <div class="image">
                                <img src="<?php echo $values['image']; ?>" />
                            </div>
                        <?php endif; ?>
                        <h3><?php echo $values['title']; ?></h3>
                        </a>
                        <div class="details">
                            <?php echo $values['date']; ?> by <span><?php echo $values['author']; ?></span>
                        </div>
                        <?php if (isset($values['intro'])): ?>
                            <div class="intro">
                                <?php echo $values['intro']; ?>
                            </div>
                        <?php endif; ?>
                    </li>
                    <?php
                    endif;
                endforeach;

                ?>
                <?php if ($loadedCount == 0): ?>
                    <li class="none">
                        <?php echo lang::text('There are no messages to display'); ?>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

        </div>
        <?php endif; ?>
        a
    </div>
    <div class="g210">



        <div class="widget your-customer-support">
            <h1><?php  echo engine::translation('Your customer support', 'uf'); ?></h1>
                <div class="inner">
                <div class="logo">
                    <?php if (registry::get('support.image')): ?>
                        <img src="<?php echo registry::get('support.image'); ?>" alt="Your support service logo"/>
                    <?php else: ?>
                        <img src="<?php echo engine::url(); ?>/assets/images/logo.svg" alt="Your support service logo"/>
                    <?php endif; ?>
                </div>
                <div class="icons">
                    <?php if (registry::get('support.url')): ?>
                    <div class="single">
                        <a target="_blank" href="<?php echo registry::get('support.url'); ?>">
                            <div class="icon">
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                            <div class="name">
                                <?php echo registry::get('support.url'); ?>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if (registry::get('support.email')): ?>
                    <div class="single">
                        <a href="mailto:<?php echo registry::get('support.email'); ?>">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="name">
                                <?php echo registry::get('support.email'); ?>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if (registry::get('support.phone')): ?>
                    <div class="single">
                        <a href="tel:<?php echo registry::get('support.phone'); ?>">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="name">
                                <?php echo registry::get('support.phone'); ?>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
</div>
