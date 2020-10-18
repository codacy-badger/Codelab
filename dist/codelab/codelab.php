<?php
/*
    @package    Codelab
    @author     <dev@g3ck.com>
    @copyright  2020 G3ck.com
    @homepage   g3ck.com/codelab
*/
// ############################################################################
// # System Core
// ############################################################################

$clTimeStart  = microtime(true); // Top of page


// ### Define clPath


    $clPath = dirname(__FILE__);
    $clPath = str_replace('\\', '/', $clPath);
    $clPath = rtrim($clPath, '/codelab');
    DEFINE('clPath',$clPath);
    unset($clPath);

    include(clPath . '/codelab/core/runtime.php');


    runtime::log('Codelab [start]');
    runtime::global('clPath', clPath);


// ### Define clVersion and Codename
    DEFINE('clVersion', '1.0.1');
    runtime::global('clVersion', clVersion);

    DEFINE('clCodename', 'Launcher');
    runtime::global('clCodename', clCodename);
    DEFINE('clDomain', $_SERVER['HTTP_HOST']);
    runtime::global('clDomain', clDomain);
// ### Define clProtocol
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        DEFINE('clProtocol','https');
    } else {
        DEFINE('clProtocol','http');
    }
   runtime::global('clProtocol', clProtocol);







// # DEFINE clQuery

    $clQuery = @$_GET['clQuery'];
    $clQuery = explode("/",$clQuery);
    $clQuery = array_filter($clQuery);
    DEFINE('clQuery',$clQuery);

    runtime::global('clQuery',  $clQuery);
    unset($clQueryOutput);
    unset($clQuery);



// ### Define clUrl
    $curentUrl = trim((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/');
    $clUrl = str_replace(@$_GET['clQuery'],"",$curentUrl);
    $clUrl = rtrim($clUrl, '/');




    if (@$clAjax == true):
        runtime::log('Check if is ajax [true]');
        $clUrl = $curentUrl;
        $clUrl = dirname($curentUrl);
        $clUrl = rtrim(substr($clUrl, 0, strpos($clUrl, "/codelab/gui")), '/') . '/cl';
    else:
        runtime::log('Check if is ajax [false]');
    endif;

    DEFINE('clUrl', $clUrl);
    runtime::global('clUrl',  $clUrl);




    unset($clUrl);
// ### Include main config file
    include(clPath . '/codelab/config.php');
    runtime::log('Load [config]');
    runtime::global('clConfig',  clConfig);
// ### Set PHP config
    // Show errors
    if (@clConfig['php']['errors'] == true):
        runtime::log('Display PHP errors [true]');
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
    else:
        ini_set('display_startup_errors', 0);
        ini_set('display_errors', 0);
        error_reporting(0);
    endif;
    // Set memory limit
    if (@clConfig['php']['memoryLimit']):
        $memoryLimit = clConfig['php']['memoryLimit'];
        ini_set("memory_limit",$memoryLimit);
        runtime::log('Set memoryLimit [' . $memoryLimit. ']');
    endif;





    // ###################################
    // ### SESSION
    // ###################################

     runtime::log('Core load', true);
    // ### Load session core file
    include(clPath . '/codelab/core/session.php');
     runtime::log('Core load [session]');
    // ### Define App core
    include(clPath . '/codelab/core/crypto.php');
    runtime::log('Core load [crypto]');
    // ### Load SQL core
    include(clPath . '/codelab/core/sql.php');
    runtime::log('Core load [sql]');

    // ### Define Registry core

    include(clPath . '/codelab/core/registry.php');
    runtime::log('Core load [registry]');
    include(clPath . '/codelab/core/spy.php');

    runtime::log('Core load [spy]');
    // ### Define lang core

    include(clPath . '/codelab/core/lang.php');
    // ### Define App core

    runtime::log('Core load [lang]');
    include(clPath . '/codelab/core/auth.php');
// ### Define Registry core

    runtime::log('Core load [auth]');
    include(clPath . '/codelab/core/team.php');
// ### Define Registry core

    runtime::log('Core load [team]');
// ### Load Guard core
    include(clPath . '/codelab/core/guard.php');



    runtime::log('Core load [guard]');
    include(clPath . '/codelab/core/app.php');
    runtime::log('Core load [content]');
    include(clPath . '/codelab/core/content.php');
    runtime::log('Core load [app]');
    // ### Define App core

    include(clPath . '/codelab/core/section.php');


                // Set language
                if (@session::get('clLang') == ''):
                    $paramGet = array(
                        'table' => 'clLanguages',
                        'order' => 'ordering',
                        'limit' => 1,
                        'sort' => 'asc',
                        'where' => 'idDefault = 1 AND active = 1'
                     );
                    $setLang = sql::get($paramGet,true);
                    // Check if multilanguage website
                    $paramGetMulti = array(
                        'table' => 'clLanguages',
                        'order' => 'ordering',
                        'sort' => 'asc',
                        'where' => 'active = 1'
                     );
                    $seMultilang = sql::get($paramGetMulti);
                    $setLang['multilingual'] = $seMultilang;
                    runtime::log('Set lang [' . $setLang['langCode'] . ']');
                    session::set('clLang', $setLang);
                    DEFINE('clLang', $setLang);
                    runtime::global('clLang', $setLang);
                else:
                    $setLang = session::get('clLang');
                    DEFINE('clLang', $setLang);
                    runtime::global('clLang', $setLang);
                endif;





    runtime::log('Core load [section]');



    // ### Load codelab libraries
    runtime::log('System library load', true);
    foreach (glob(clPath . "/codelab/libraries/*.php") as $filename)
    {
        include $filename;
        runtime::log('Library load [' . pathinfo($filename)['filename'] . ']');
    };
    // ### Load addons libraries
    runtime::log('Addons library load', true);
    $addonsDirs = array_filter(glob(clPath . '/app/addons/*'), 'is_dir');
    foreach ($addonsDirs as $addonsDirsKey => $addonsDirsValue):
        $librariesFolder = $addonsDirsValue . '/libraries';
        if (file_exists($librariesFolder) AND is_dir($librariesFolder)):
            foreach (glob($librariesFolder . "/*.php") as $filename)
            {
                include $filename;
                runtime::log('Library load [' . pathinfo($filename)['filename'] . ']');
            };
        endif;
    endforeach;







    if (@$clAjax == true):
        include(clPath . '/codelab/core/engine.php');
    elseif (@clQuery[0] == 'cl'):
        runtime::log('Load [engine]');
        ### Load engine
        // Load language
        if (session::get('clEngineLang') == ''):
            session::set('clEngineLang', strtolower(registry::get('gui.translation.default', 'en')));
        endif;
        $clEngineAssets = array();
        include(clPath . '/codelab/core/engine.php');
        include(clPath . '/codelab/gui/index.php');
    // # Load App
    else:

        // # Load control
        // 1) Load page control
        // 2) Load secions control

        // ############################################################################
        // # Get Current app page
        // ############################################################################

            $clPage = array();
            if (empty(clQuery)):
                $param = array(
                    'table' => 'clPages',
                    'columns' => array('id', 'name', 'alias', 'pagePath'),
                    'where' => '`alias`="frontpage"',
                    'limit' => 1
                 );
                $results = sql::get($param);
                foreach ($results as $key => $value):
                    $clPage = $results;
                //    $clPage['id'] = $clPageID;
                endforeach;
            else:
                $param = array(
                    'table' => 'clPages',
                    'columns' => array('id',  'name', 'alias', 'catch','pagePath'),
                    'where' => 'catch!=""',
                 );
                $catchCheck = true;
                $results = sql::get($param);
                foreach ($results as $key => $value):
                    $catch = lang::extract($value['catch']);
                    $catchParts = explode('/', $catch);
                    if (count($catchParts) == count(clQuery)):
                        $i = -1;
                        $times_to_run = count(clQuery);
                        while ($i++ < $times_to_run)
                        {
                            if (isset(clQuery[$i]) AND $catchParts[$i]):
                                // Check if is alias
                                $aliasFirst = substr($catchParts[$i], 0, 1);
                                $aliasLast = substr($catchParts[$i], -1);
                                 if ($aliasFirst != '[' AND $aliasLast != ']'):
                                     if (clQuery[$i] != $catchParts[$i]):
                                         unset($results[$key]);
                                     endif;
                                endif;
                            endif;
                        }
                else:
                     unset($results[$key]);
                    endif;
                endforeach;

                if (empty($results)):
                    $param = array(
                        'table' => 'clPages',
                        'columns' => array('id', 'catch', 'alias', 'pagePath'),
                        'where' => '`alias`="error"',
                     );
                    $results = sql::get($param);
                    foreach ($results as $key => $value):
                        $clPage = $results[$key];
                    endforeach;
                else:
                    foreach ($results as $key => $value):
                        $clPage = $results[$key];
                    endforeach;
                endif;

            endif;


            DEFINE('clPage',$clPage);
            runtime::global('clPage',  $clPage);
            unset($clPage);

            // # Create App   variables
            $clAppAssets = array(); // assets sources storage
            // # Load Codelab Gui
            // Get default langauage





        // ### Include App index file
        runtime::log('Load [app]');

        // Load system systems // TODO: IF DEVELOPER //
        app::asset(
            array(
                // Codelab system
                '/codelab/assets/styles/runtime.css',
            )
        );

        include(clPath . '/app/app.php');


        runtime::log('Codelab [end]');
        $clTimeEnd = microtime(true); // Bottom of page
        runtime::log('Load time ['.$clTimeEnd.']');
    endif;

// ############################################################################
// # Start loading app and extenstions
// ############################################################################
