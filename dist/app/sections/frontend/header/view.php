<?php
$fontawesome = array(
    'fa-user'
);
fontawesome::icons($fontawesome);
?>

<header <?php section::create(); ?>>
    <div class="r_c">
        <div class="logo">
            <a href="<?php echo app::link(); ?>">
                <div class="image">
                    <img src="<?php echo clUrl; ?>/app/assets/images/logo.svg"  alt="G3ck.com logo" />
                </div>
                <div class="text">
                    <?php echo content::get('section', 'logoText'); ?>
                </div>
            </a>
        </div>
        <div class="languages">
            <ul>
                <li><a <?php if (app::lang() == 'en_US'): ?>class="active" <?php endif; ?>href="<?php echo clUrl; ?>/en"><img src="<?php echo clUrl; ?>/app/assets/images/flags/en_US.png"  alt=""/></a></li>
                <li><a <?php if (app::lang() == 'pl_PL'): ?>class="active" <?php endif; ?>href="<?php echo clUrl; ?>/pl"><img src="<?php echo clUrl; ?>/app/assets/images/flags/pl_PL.png"  alt=""/></a></li>
            </ul>
        </div>
        <div class="panel">
            <nav >
                <div class="navUserMobile"  itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <div class="navUserMobileClose">
                        <i class="fad fa-times"></i>
                    </div>
                    <div class="mobileJoinMenu">
                        <a href="join" itemprop="url">
                            <div class="icon">
                                <i class="fad fa-user-plus"></i>
                            </div>
                            <strong><span itemprop="name">Register</span></strong>
                            <div class="subText">
                                new user account
                            </div>
                        </a>
                    </div>
                    <div class="mobileJoinMenu">
                        <a href="/login" itemprop="url">
                            <div class="icon">
                                <i class="fad fa-user"></i>
                            </div>
                            <strong><span itemprop="name">Login</span></strong>
                            <div class="subText">
                                into user account
                            </div>
                        </a>
                    </div>

                </div>
                <ul  itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <li class="">
                        <a href="<?php echo clUrl; ?>" itemprop="url">
                            <span itemprop="name"><?php echo content::get('page', 'title', 1); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo clUrl; ?>/features" itemprop="url">
                            <span itemprop="name">Features</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo clUrl; ?>/pricing" itemprop="url">
                            <span itemprop="name">Addons</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo clUrl; ?>/doc" itemprop="url">
                            <span itemprop="name">Pricing</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo clUrl; ?>/api" itemprop="url">
                            <span itemprop="name">Api</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo clUrl; ?>/support" itemprop="url">
                            <span itemprop="name">Support</span>
                        </a>
                    </li>
                    <li class="noHover">
                        <a href="<?php echo clUrl; ?>/login" itemprop="url">
                            <b><i class="fal fa-user"></i> <span itemprop="name">Sign in</span></b>
                        </a>
                    </li>
                </ul>
            </nav>
<!--
            <div class="option account">
                        <div class="status pro">
                            Pro
                        </div>

                        <div class="status free">
                            Free
                        </div>

                    <img src="<?php echo clUrl; ?>/app/assets/images/none/avatar.png" alt="user avatar" />

                    <div class="user-panel">
                        <div class="inner">
                            <h5>@g3ckTeam</h5>
                            <div class="links">
                                <ul class="list">
                                    <li>
                                        <a href="/app"><strong>OPEN APP</strong></a>
                                    </li>
                                    <li>
                                        <a href="/logout">Account settings</a>
                                    </li>
                                    <li>
                                        <a href="/logout">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <i class="fad fa-user"></i>
                    <div class="user-panel">
                        <div class="header">
                            Sign in
                        </div>
                        <form action="/login" method="post">

                            <div class="input">
                                <div class="name">
                                    E-mail
                                </div>
                                <input type="email" name="email"  class="inp" required/>
                            </div>
                            <div class="input">
                                <div class="name">
                                    Password
                                </div>
                                <input type="password" name="password"  class="inp" minlength="6" required/>
                            </div>
                            <div class="button">
                                <button class="btn full" name="signin">Sign In</button>
                            </div>
                            <div class="links">
                                <ul class="list"  itemscope itemtype="http://schema.org/SiteNavigationElement">
                                    <li>
                                        <a href="/join" itemprop="url">
                                            <span itemprop="name">
                                                Do not have an account?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/support/topic/login" itemprop="url">
                                            <span itemprop="name">
                                                Need help with login?
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>

    -->
            </div>



                    <div class="option mobileMenu">
                        <i class="fad fa-bars"></i>
                    </div>
    </div>
</header>

<div class="header-layer"></div>
<!--
<div class="header-holder"></div>
-->
