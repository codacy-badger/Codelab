 <?php
 /*
     ██████╗ ██████╗ ██████╗ ███████╗██╗      █████╗ ██████╗
    ██╔════╝██╔═══██╗██╔══██╗██╔════╝██║     ██╔══██╗██╔══██╗
    ██║     ██║   ██║██║  ██║█████╗  ██║     ███████║██████╔╝
    ██║     ██║   ██║██║  ██║██╔══╝  ██║     ██╔══██║██╔══██╗
    ╚██████╗╚██████╔╝██████╔╝███████╗███████╗██║  ██║██████╔╝
     ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚═════╝
TODO:f ewfwf
 */

//  ##### APP START

    app::log('App [start]');
    app::hook('app.start');

//  ##### LOAD ROCKET

    app::log('Rocket [load]');


    fontawesome::start();

    // rocket::regenerate(false);
    rocket::start();
    rocket::style(
        array(
            'reset',
            'body',
            'font',
            'font.poppins',
            'container',
            'header',
            'paragraph',
            'box',
            'background',
            'color',
            'button',
        )
    );
    rocket::script(
        array(
            'effect',
            //'button'
        ),
    );

//  ##### LOAD APP ASSETS
    app::asset(
        array(
            // Assets app main
            '/app/assets/styles/main.css',
            '/app/assets/styles/responsive.css',
            // Asset plugins
            //'/app/assets/plugins/jquery/jquery-3.5.1.min.js',
        )
    );


//  ##### LOAD APP CONTROL
    app::hook('control.start');
    app::control();
    app::hook('control.end');


//  ##### APP VIEW
?>
<!doctype html>
<?php app::hook('html.before'); ?>
<html lang="<?php echo app::lang('code'); ?>">
<?php app::hook('head.start'); ?>
    <!-- APP HEAD -->
    <?php app::hook('head.before'); ?>
    <head>
        <?php app::hook('head.start'); ?>
        <?php app::block('head'); ?>
        <?php app::hook('head.end'); ?>
    </head>
    <?php app::hook('head.after'); ?>
    <!-- APP BODY -->
    <?php app::hook('body.before'); ?>
    <body>
        <?php app::hook('body.start'); ?>
        <?php app::hook('page.start'); ?>
        <?php app::page(); ?>
        <?php app::hook('page.end'); ?>



                <?php app::hook('assets.start'); ?>
                <!-- CSS STYLES-->
                <?php app::assets('css'); ?>
                <!-- JS SCRIPTS -->
                <?php app::scriptVars(); ?>
                <?php app::assets('js'); ?>
                <?php app::hook('assets.end'); ?>

        <?php app::hook('body.end'); ?>


























            <section class="clRuntime">


            <h1> $clAppLogs</h1>
            <?php

            echo '<pre>';
                    print_r($clAppLogs);
                    echo '</pre>';
            ?>
<!--
            <h1> $clAppContent</h1>
            <?php

                    echo '<pre>';
                            print_r($clAppContent);
                            echo '</pre>';
            ?>




            <h1> $clRuntime_system</h1>
            <?php


            echo '<pre>';
                    print_r($clRuntime_system);
                    echo '</pre>';
            ?>

            <h1> $clRuntime_global</h1>
            <?php

            echo '<pre>';
                    print_r($clRuntime_global);
                    echo '</pre>';
            ?>



            <h1>$clAppAssets</h1>
            <?php

                echo '<pre>';
                        print_r($clAppAssets);
                        echo '</pre>';
            ?>


    -->

        </section>



    </body>
    <?php app::hook('body.after'); ?>
<?php app::hook('html.end'); ?>
</html>
<?php app::hook('html.after'); ?>
<?php app::hook('app.end'); ?>
<?php app::log('App [end]'); ?>
