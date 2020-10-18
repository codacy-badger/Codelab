<?php


class engine {


            public static function block($blockFile){
                include clPath . '/codelab/gui/engines/' . clRegistry['gui.engine'] . '/blocks/' . $blockFile . '.php';
            }

            public static function translation($text, $transform = null, $destionationLanguage = null){
                $text = trim($text);

                if ($transform != null) {
                    switch ($transform) {
                        case 'u':
                            $text = mb_strtoupper($text);
                            break;
                        case 'uw':
                            $text = ucwords($text);
                            break;
                        case 'uf':
                            $text = ucfirst($text);
                            break;
                        case 'l':
                            $text = mb_strtolower($text);
                            break;
                        default:
                            break;
                    }
                }
                return $text;
            }

    		// In ##################################################################
    		public static function noty($type, $text)
    		{
    			$_SESSION[clConfig['session']['name']]['noty'][$text] = $type;
    		}

    		// In ##################################################################
    		public static function notyDisplay()
    		{
    			if (isset($_SESSION[clConfig['session']['name']]['noty'])) :
    				foreach($_SESSION[clConfig['session']['name']]['noty'] as $key => $value) {
    					echo '
    							<script>
    								new Noty({
    									type: "' . $value. '",
    									text: "' . $key . '",
    								}).show();
    							</script>
    					';
    					unset($_SESSION[clConfig['session']['name']]['noty'][$key]);
    				}
    			endif;
    		}



    public static function checkIco($value){
        if ($value == 1):
            return '<i class="fas fa-check color-green"></i>';
        endif;
        if ($value == 0):
            return '<i class="fas fa-times color-red"></i>';
        endif;
    }



    public static function path(){
        return clPath . '/codelab/gui/engines/' . clRegistry['gui.engine'];
    }
    public static function url(){
        return clUrl . '/codelab/gui/engines/' . clRegistry['gui.engine'];
    }













    public static function asset($filePath){
        GLOBAL $clEngineAssets;
        if (is_string($filePath)):
            $path_parts = pathinfo($filePath);
            if (isset($path_parts['basename'])):
                array_push($clEngineAssets, array(
                    'url' => clUrl . '/codelab/gui/engines/' . clRegistry['gui.engine'] . $filePath,
                    'path' => $filePath,
                    'basename' => $path_parts['basename'],
                    'extension' => $path_parts['extension'],
                    'filename' =>$path_parts['filename']
                ));
            endif;
        elseif (is_array($filePath)):
            foreach ($filePath as $key => $value):
                $path_parts = pathinfo($value);
                if (isset($path_parts['basename'])):
                    array_push($clEngineAssets, array(
                        'url' => clUrl . '/codelab/gui/engines/' . clRegistry['gui.engine'] . $value,
                        'path' => $value,
                        'basename' => $path_parts['basename'],
                        'extension' => $path_parts['extension'],
                        'filename' =>$path_parts['filename']
                    ));
                endif;
            endforeach;
        endif;
    }

    public static function assets(){
        GLOBAL $clEngineAssets;
        $clEngineAssetsCSS = array();
        $clEngineAssetsJS = array();
        $clEngineAssetsUnknown = array();

        foreach ($clEngineAssets as $key => $value):
            if ($clEngineAssets[$key]['extension'] != ''):
                $path = $clEngineAssets[$key]['path'];
                $extension = strtolower($clEngineAssets[$key]['extension']);
                if ($extension == 'css'):
                    array_push($clEngineAssetsCSS, array(
                            'path' => clPath . '/app' . $clEngineAssets[$key]['path'],
                            'url' => $clEngineAssets[$key]['url']
                        )
                    );
                elseif ($extension == 'js'):
                    array_push($clEngineAssetsJS, array(
                            'path' => clPath . '/app' . $clEngineAssets[$key]['path'],
                            'url' => $clEngineAssets[$key]['url']
                        )
                    );
                else:
                    array_push($clEngineAssetsUnknown, array(
                            'path' => clPath . '/app' . $clEngineAssets[$key]['path'],
                            'url' => $clEngineAssets[$key]['url']
                        )
                    );
                endif;
            endif;
        endforeach;
        echo '<!-- Engine styles -->' . PHP_EOL;
        foreach ($clEngineAssetsCSS as $key => $value):
            ?>
                <link rel="stylesheet" href="<?php echo $value['url']; ?>">
            <?php
        endforeach;
        echo '<!-- Engine scripts -->' . PHP_EOL;
        foreach ($clEngineAssetsJS as $key => $value):
            ?>
                <script src="<?php echo $value['url']; ?>"></script>
            <?php
        endforeach;


    }







    public static function critical($text){
        echo '<h1 style="background-color:red;color:white">ENGINE CRITICAL ERROR: ' . $text . '</h1>';
        die();
    }




    public static function page(){

        $assets = array(
            'script.js',
            'scripts.js',
            'style.css',
            'styles.css',
        );

        if (!is_array(clQuery)):
            die('Core engine page type unknow');
        endif;
        if (clQuery[0] != 'cl'):
            die('No cl parameter');
        endif;


        // Dashboards
        if (count(clQuery) == 1):
            $viewPath =  engine::path() . '/pages/dashboard/view.php';
            if (is_file($viewPath)):
                include($viewPath);
                $folderPath = pathinfo($viewPath);
                $folderPath =  $folderPath['dirname'];
                foreach ($assets as $key => $value):
                    if (is_file($folderPath . '/' . $value)): engine::asset(array('/pages/dashboard/' . $value)); endif;
                endforeach;
            else:
                engine::critical('No page view file: ' . $viewPath);
            endif;
        endif;
        if (count(clQuery) == 2):
            engine::critical('No page selected');
        endif;
        if (count(clQuery) == 3):
            $viewPath =  engine::path() . '/pages/' . clQuery[1] . '/' . clQuery[2] . '/view.php';
            if (is_file($viewPath)):
                include($viewPath);
                $folderPath = pathinfo($viewPath);
                $folderPath =  $folderPath['dirname'];
                foreach ($assets as $key => $value):
                    if (is_file($folderPath . '/' . $value)): engine::asset(array('/pages/' . clQuery[1] . '/' . clQuery[2] . '/' . $value)); endif;
                endforeach;
            else:
                engine::critical('No page view file: ' . $viewPath);
            endif;
        endif;
    }



}
