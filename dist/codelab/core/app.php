<?php
    $clAppLogs = array();
    $clAppContent = array();


class app {

    // In ##################################################################
    public static function log( $text, $type = 'log')
    {
        GLOBAL $clAppLogs;
        $clAppLogs[$text] = $type;

    }


        // In ##################################################################
        public static function scriptVars()
        {
            $output = '';
            $output .= '<script>';
            $output .= 'var clPath = "' . clPath . '";' . PHP_EOL;
            $output .= 'var clVersion = "' . clVersion . '";' . PHP_EOL;
            $output .= 'var clCodename = "' . clCodename . '";' . PHP_EOL;
            $output .= 'var clDomain = "' . clDomain . '";' . PHP_EOL;
            $output .= 'var clProtocol = "' . clProtocol . '";' . PHP_EOL;
            $output .= 'var clQuery = "' . implode(',', clQuery) . '";' . PHP_EOL;
            $output .= 'var clPage_id = "' . clPage['id'] . '";' . PHP_EOL;
            $output .= 'var clPage_name = "' . clPage['name'] . '";' . PHP_EOL;
            $output .= 'var clPage_alias = "' . clPage['alias'] . '";' . PHP_EOL;
            $output .= 'var clPage_pagePath = "' . clPage['pagePath'] . '";' . PHP_EOL;
            $output .= '</script>';
            echo $output;
        }
    public static function hook($hookName){
        // Load app hook
        $path = clPath . '/app/hooks/' . $hookName . '.php';
        if (is_file($path)):
            include($path);
            app::log('Hook load [' . $hookName. '] [app/hooks/' . $hookName . '.php]');
        endif;
        // Load addons hooks
        $dirs = array_filter(glob(clPath . '/app/addons/*'), 'is_dir');
        foreach ($dirs as $key => $value):
                $path = $value . '/hooks/' . $hookName . '.php';

                if (file_exists($path) AND is_file($path)):
                    include($path);
                    //app::log('Hook load [' . $hookName. '] [app/addons/' . @dirname($value) .  '/hooks/' . $hookName . '.php]');
                endif;
        endforeach;

    }




public static function block($filename){
    include(clPath . '/app/blocks/' . $filename . '.php');
    app::log('Block load [' . $filename. ']');
}

public static function lang($data = null){
    // Lang code
    if ($data == null):
        return session::get('clLang')['langCode'];
    // Lang version from array
    else:
        return session::get('clLang')[$data];
    endif;
}


public static function url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";
    // Here append the common URL characters.
    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];

    return $link;

}


public static function link(){
    return clUrl;
}

public static function page(){
    GLOBAL $clAppContent;




        // Get page content
        $paramContent = array(
            'table' => 'clContent',
            'columns' => array('id', 'sourceType', 'sourceID', 'alias', 'value'),
            'where' => 'sourceType="page" AND lang = "' . app::lang() . '"'
         );
        $resultsContent = sql::get($paramContent);
        foreach ($resultsContent as $keyContent => $valueContent):
            if ($valueContent['alias'] != ''):
                $clAppContent['page'][clPage['id']][$valueContent['alias']] = $valueContent['value'];
            endif;
        endforeach;




    $pageFile = trim(clPage['pagePath'], '/');
    $pagePath =  clPath  . '/' . $pageFile . '/';
    $pageFileView = $pagePath . 'view.php';
    include($pageFileView);

        app::log('Load page view [' . $pageFile . ']');


    // Load page assets
    foreach (clConfig['assets']['files'] as $sectionsAssetsFileKey => $sectionsAssetsFileValue):
        $sectionAssetsFile = $pagePath . $sectionsAssetsFileValue;
        //echo $sectionAssetsFile . '<br />';
        if (file_exists($sectionAssetsFile) AND is_file($sectionAssetsFile)):
            app::asset('/' . $pageFile . '/' . $sectionsAssetsFileValue);
        endif;
    endforeach;

}

public static function control(){

    // Get page controls
    $pageFile = trim(clPage['pagePath'], '/');
    $pagePath =  clPath  . '/' . $pageFile . '/';
    $pageFileControl = $pagePath . 'control.php';
    if (file_exists($pageFileControl) AND is_file($pageFileControl)):
        include($pageFileControl);
        app::log('Load control [page] [' . $pageFile . ']');
    endif;

    // Get sections controls
    $param = array(
        'table' => 'clSections',
        'where' => 'active = 1',
        'columns' => array('id', 'name', 'pagesInclude', 'pagesExclude',  'sectionPath', 'position', 'ordering'),
		'order' => 'ordering',
		'sort' => 'asc'
     );
    $results = sql::get($param);


    if (!empty($results)):
        $components = null;
        foreach ($results as $key => $value):
            $section = trim($value['sectionPath'], '/');
            $sectionPath =  clPath  . '/' . $section . '/';
            $sectionFileControl = $sectionPath . 'control.php';
            $pagesInclude = json_decode($value['pagesInclude'],true);
            $pagesExclude = json_decode($value['pagesExclude'],true);
            if (($value['pagesInclude'] == '*' OR (is_array($pagesInclude) AND in_array(clPage['id'],$pagesInclude))) AND (!is_array($pagesExclude) OR !in_array(clPage['id'],$pagesExclude))):
                if (file_exists($sectionFileControl) AND is_file($sectionFileControl)):
                    include($sectionFileControl);
                    app::log('Load control [section] [' . $section . ']');
                endif;
            endif;
        endforeach;
    endif;
}


public static function position($positionName){
    GLOBAL $clAppContent;
                    GLOBAL $clSection;
    $param = array(
        'table' => 'clSections',
        'columns' => array('id', 'name', 'pagesInclude', 'pagesExclude',  'sectionPath', 'position', 'ordering', 'class', 'additionalClass'),
        'where' => 'active = 1 AND position = "' . $positionName .'"',
		'order' => 'ordering',
		'sort' => 'asc'
     );
    $results = sql::get($param);


    if (!empty($results)):
        $components = null;
        foreach ($results as $key => $value):
            $section = trim($value['sectionPath'], '/');
            $sectionPath =  clPath  . '/' . $section . '/';
            $sectionFileView = $sectionPath . 'view.php';

            $pagesInclude = json_decode($value['pagesInclude'],true);
            $pagesExclude = json_decode($value['pagesExclude'],true);
            if (($value['pagesInclude'] == '*' OR (is_array($pagesInclude) AND in_array(clPage['id'],$pagesInclude))) AND (!is_array($pagesExclude) OR !in_array(clPage['id'],$pagesExclude))):
                if (file_exists($sectionFileView) AND is_file($sectionFileView)):

                    $clSection = array(
                        'id' => $value['id'],
                        'name' => $value['name'],
                        'class' => $value['class'],
                        'additionalClass' => $value['additionalClass'],
                        'path' => $sectionPath,
                        'url' => clUrl . '/' . $section . '/',
                        'pages' => array(
                            'include' => $value['pagesInclude'],
                            'Exclude' => $value['pagesExclude'],
                        ),
                        'position' => $value['position'],
                        'ordering' => $value['ordering'],
                    );


                    // Get section content
                    $paramContent = array(
                        'table' => 'clContent',
                        'columns' => array('id', 'sourceType', 'sourceID', 'name', 'value'),
                        'where' => 'sourceID = "' . $value['id'] . '" AND sourceType="section" AND (lang ="*" OR lang = "' . app::lang() . '")'
                     );
                    $resultsContent = sql::get($paramContent);
                    foreach ($resultsContent as $keyContent => $valueContent):
                        $clAppContent['section'][$valueContent['sourceID']][$valueContent['name']] = $valueContent['value'];
                    endforeach;


                    include ($sectionFileView);

                    unset($resultsContent);
                else:
                    echo '<div class="clError">Section load error: ' . $sectionFileView . '</div>';
                endif;
            endif;

            foreach (clConfig['assets']['files'] as $sectionsAssetsFileKey => $sectionsAssetsFileValue):
                $sectionAssetsFile = $sectionPath . $sectionsAssetsFileValue;
                if (file_exists($sectionAssetsFile) AND is_file($sectionAssetsFile)):
                    app::asset('/' . $section . '/' . $sectionsAssetsFileValue);
                endif;
            endforeach;
        endforeach;
    else:
        return false;
    endif;

}
public static function positionCheck($positionName){
    return true;
}

public static function asset($filePath){



    GLOBAL $clAppAssets;
    GLOBAL $clReturn;


    if (is_string($filePath)):
        $filePathTrim = trim($filePath, '/');
        $fullPath = clPath .'/' . $filePathTrim;
        if (!is_file($fullPath)):

            app::log('Asset file not fond ['.$filePath.']', 'error');
        else:
            $filePath = '/'.$filePathTrim;
            foreach ($clAppAssets as $key => $value):
                if ($value['path'] == '/' . $filePathTrim):
                    app::log('Asset already in use ['.$filePath.']', 'warning');
                    return false;
                endif;
            endforeach;

            $path_parts = pathinfo($filePath);
            if (isset($path_parts['basename'])):
                array_push($clAppAssets, array(
                    'url' => clUrl . $filePath,
                    'path' => $filePath,
                    'basename' => $path_parts['basename'],
                    'extension' => $path_parts['extension'],
                    'filename' =>$path_parts['filename']
                ));
            endif;

            app::log('Asset ['.$filePath.']');
        endif;



    elseif (is_array($filePath)):

        foreach ($filePath as $key => $value):

            $filePathTrim = trim($value, '/');
            $fullPath = clPath .'/' . $filePathTrim;
            $value = '/' . $filePathTrim;

            if (!is_file($fullPath)):

                app::log('Asset file not fond ['.$value.']', 'error');
            else:

                $path_parts = pathinfo($value);
                if (isset($path_parts['basename'])):
                    array_push($clAppAssets, array(
                        'url' => clUrl . '/' . $filePathTrim,
                        'path' => '/' . $filePathTrim,
                        'basename' => $path_parts['basename'],
                        'extension' => $path_parts['extension'],
                        'filename' =>$path_parts['filename']
                    ));
                    app::log('Asset ['.$value.']');
                endif;
            endif;

        endforeach;
    endif;
}

public static function assets($type = null){ // type = js or css
    GLOBAL $clAppAssets;

    if ($type == null OR $type == 'css'):
        app::hook('core.app.assets.start');
    endif;


    foreach ($clAppAssets as $key => $value):

        app::hook('core.app.assets.loop');

        $path = $clAppAssets[$key]['path'];
        if (($type == null OR $type == 'css') AND strtolower($value['extension']) == 'css'):
            app::hook('core.app.assets.loop.css');
            app::log('Asset load ['.$path.']');
            ?>
                <link rel="stylesheet" href="<?php echo $value['url']; ?>">
            <?php
        elseif (($type == null OR $type == 'js') AND strtolower($value['extension']) == 'js'):
            app::hook('core.app.assets.loop.css');
            app::log('Asset load ['.$path.']');
            ?>
                <script src="<?php echo $value['url']; ?>"></script>
            <?php
        endif;
    endforeach;
    app::hook('core.app.assets.end');
}



public static function end(){
    ?>

    <?php
}


}
