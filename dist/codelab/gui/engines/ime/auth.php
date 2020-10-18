<?php
    // Asset CSS
    engine::asset(
        array(
            // System Styles
            '/assets/styles/system/reset.css',
            '/assets/styles/system/container.css',
            '/assets/styles/system/grid.css',
            '/assets/styles/system/button.css',
            '/assets/styles/system/input.css',
            // Theme styles
            '/assets/styles/root.css',
            '/assets/styles/auth.css',
            '/assets/styles/noty.css',
            // jQuery
            '/assets/plugins/jquery/jquery-3.5.1.min.js',
            // clTooltip
            '/assets/plugins/clTooltip/clTooltip.css',
            '/assets/plugins/clTooltip/clTooltip.js',
            // Noty plugin
            '/assets/plugins/noty/noty.css',
            '/assets/plugins/noty/noty.min.js',
            // Main Scripts
            '/assets/scripts/auth.js',
        )
    );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Codelab Sign in</title>
    <meta name="description" content="Codelab">
    <meta name="author" content="G3ck.com - dev@g3ck.com">
    <meta name="copyright" content="© <?php echo date('Y'); ?> G3ck.com | All Rights Reserved">
    <meta name="robots" content="noindex, nofollow">
    <meta name="distribution" content="IU">
    <link rel="stylesheet" href="<?php echo engine::url(); ?>/assets/styles/loader.css">
</head>
<body  class="">

    <div id="clGUILoader" class="clGUILoader">
        <div class="clGUILoader-ripple"><div></div><div></div></div>
    </div>

<?php //engine::noty('error', 'e'); ?>
    <div class="box">

        <div class="inner">
            <div class="logo">

                <img alt="logo" src="<?php echo engine::url(); ?>/assets/images/logo.svg">
            </div>
             <form action="" method="post">
                 <div class="input">
                     <input type="text" placeholder="<?php echo engine::translation('username or email','uf'); ?>" id="username">
                 </div>
                 <div class="input">
                     <input type="password" placeholder="<?php echo engine::translation('password','uf'); ?>" id="password">
                 </div>
                 <div class="button">
                     <button id="authUsername" name="signin" type="submit">
                         <?php echo engine::translation('sign in','uf'); ?>
                     </button>
                 </div>
                 <div class="links">
                     <ul>
                         <li><i class="fas fa-unlock"></i> Forgot Password?</li>
                         <li><i class="fas fa-life-ring"></i> Having issues?</li>
                     </ul>
                 </div>
             </form>
             <div class="loader">
                 <i class="fas fa-spinner fa-spin"></i>
             </div>


        </div>
    </div>

    <section class="languages">
        <ul>
            <?php
                $param = array(
                    'table' => 'clTranslations',
                    'columns' => array('id', 'name', 'code', 'active'),
                    'where' => 'active="1"',
            		'order' => 'ordering',
            		'sort' => 'asc'
                );
                $results = sql::get($param);
                foreach ($results as $key => $value):
                    ?>
                        <li>
                            <a href="<?php echo engine::url(); ?>/lang/<?php echo $value['code']; ?>" class="clTooltip">
                                <img src="<?php echo engine::url(); ?>/assets/images/flags/<?php echo strtolower($value['code']); ?>.png" alt="Flag <?php echo $value['code']; ?>"/>
                                <div class="clTooltipContent">
                                    <?php echo $value['name']; ?>
                                </div>

                            </a>
                        </li>
                    <?php
                endforeach;
            ?>
        </ul>
    </section>
    <footer>
        <?php
        //echo '<pre>';
        //        print_r(session::return());
        //        echo '</pre>';
         ?>

        2018-<?php echo date('Y'); ?> &copy; <?php echo engine::translation('All rights reserved','uf'); ?>.
    </footer>
    <script>
        var engineURL = '<?php echo engine::url(); ?>';
        var authTranslation_min4char = '<?php echo engine::translation('Enter at least 4 characters','uf'); ?>';
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <?php engine::assets(); ?>
    <?php engine::notyDisplay(); ?>
</body>
</html>
