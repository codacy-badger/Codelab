<?php

    ### logout handler
    if (@clQuery[1] == 'logout'):
        // In ##################################################################
        engine::noty('success', 'Bye @' . team::data()['username']);
        auth::destroy();
        header("Location: " . clUrl . '/cl');
    endif;

    //  Global engine assets
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
            '/assets/styles/theme.css',
            '/assets/styles/widgets.css',
            '/assets/styles/plugins.css',
            // jQuery
            '/assets/plugins/jquery/jquery-3.5.1.min.js',
            // Main Scripts
            '/assets/scripts/main.js',
            '/assets/scripts/subpanel.js',
            '/assets/scripts/sessionTimer.js',
        )
    );
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Codelab</title>
        <meta name="description" content="Codelab">
        <meta name="author" content="G3ck.com - dev@g3ck.com">
        <meta name="copyright" content="© <?php echo date('Y'); ?> G3ck.com | All Rights Reserved">
        <meta name="robots" content="noindex, nofollow">
        <meta name="distribution" content="IU">
        <link rel="stylesheet" href="<?php echo engine::url(); ?>/assets/styles/loader.css">
    </head>
    <body class="">
        <div class="clGUILayer" id="clGUILayer"></div>
        <?php engine::block('loader'); ?>
        <?php engine::block('sessionTimer'); ?>
        <?php engine::block('header'); ?>
        <?php engine::block('baner'); ?>
        <main>
            <div class="container">
                <?php engine::page(); ?>
                <?php engine::block('footer'); ?>
            </div>
        </main>

        <script>
            var engineURL = '<?php echo engine::url(); ?>';
        </script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
        <?php engine::assets(); ?>
    </body>
</html>
