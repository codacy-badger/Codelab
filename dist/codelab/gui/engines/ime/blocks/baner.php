
    <section class="baner">
        <div class="container">
            <div class="panel">

                <div class="account">

                    <div class="username">

                        <span>@</span><?php echo team::data()['username']; ?>
                    </div>
                    <div class="image">
                        <img src="http://img.g3ck.com/320x346/jpg/000000/fff/test" />
                        <!--
                        <div class="initial">
                            G
                        </div>
                    -->
                    </div>
                    <div class="userPanel">

                        <ul>
                            <li>
                                <a href="<?php echo clUrl; ?>/cl/team/profile">
                                    My profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo clUrl; ?>/cl/team/profile">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo clUrl; ?>/cl/team/profile">
                                    Security
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo clUrl; ?>/cl/logout">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text">
                <?php if (count(clQuery) != 1): ?>
                    <h1><?php echo lang::text(clQuery[1], 'uf'); ?></h1>
                    <div class="breadcrumbs">
                        <ul>
                            <?php
                            foreach (clQuery as $key => $value):
                                ?>
                                    <li><?php echo $value ?></li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <h1><?php echo lang::text('dashboard', 'uf'); ?></h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li>cl</a></li>
                            <li><?php echo lang::text('dashboard', 'l'); ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
