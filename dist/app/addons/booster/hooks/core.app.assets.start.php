<?php
    // Get globals
    global $clAppAssets;
    global $type;
    // Load Booster config
    $boosterGet = booster::get();
    $combineFilesDisable = json_decode($boosterGet['css.combine.files.disable']);
    // SESSION


    // Create folder
    clFolder::create(clPath . $boosterGet['storage.path']);

    // #########################################
    // ##### CSS
    // #########################################

    // Cache
    $cssCache = false;
    if ($boosterGet['css.display'] == 'inline' AND $boosterGet['css.combine'] == '1' OR $boosterGet['css.minify'] == 1):
        $cacheFiles = array_filter(glob(clPath . $boosterGet['storage.path'] . '/*'), 'is_file');
        foreach ($cacheFiles as $cacheFilesKey => $cacheFilesValue):
            $fileDecoded = base64_decode(pathinfo($cacheFilesValue)['filename']);
                //$fileData_page = $fileData[0];
                //$fileData_time = $fileData[1];
                if ($fileDecoded == app::url()):
                    //echo '<hr />';
                    /*** if file is 24 hours (86400 seconds) old then delete it ***/
                    $time = time() - filectime($cacheFilesValue);
                    if($time < $boosterGet['css.cache']){
                        $cssCache = true;
                        $timeCount = $time - $boosterGet['css.cache'];
                        app::log('CSS Cache [enabled] time: [' . $boosterGet['css.cache'] . '] time left: [' . $timeCount . ']');
                        app::asset($boosterGet['storage.path'] . '/' . base64_encode(app::url()) .  '.css');
                        foreach ($clAppAssets as $clAppAssetsKey => $clAppAssetsValue):
                            if (!in_array($clAppAssetsValue['path'], $combineFilesDisable)):
                                if (($type == null OR $type == 'css') AND strtolower($clAppAssetsValue['extension']) == 'css'):
                                    unset($clAppAssets[$key]);
                                endif;
                            endif;
                        endforeach;
                    } else {
                        app::log('CSS Cache [enabled] [recreate] time: [' . $boosterGet['css.cache'] . ']');
                    }
                    break;
                endif;


        endforeach;
    endif;

    // Create
    if ($cssCache == false):
        $outputCSS = '';
        if ($boosterGet['css.minify'] == '1' OR $boosterGet['css.combine'] == '1'):

            foreach ($clAppAssets as $key => $value):
                $path = $clAppAssets[$key]['path'];
                if (!in_array($path, $combineFilesDisable)):
                    if (($type == null OR $type == 'css') AND strtolower($value['extension']) == 'css'):
                        app::log('Booster: Optimize file [' . $path . ']');
                        if ($boosterGet['css.combine'] == '1' OR $boosterGet['css.display'] == 'minify'OR $boosterGet['css.display'] == 'inline'):
                            $outputCSS .= file_get_contents(clPath . $path);
                        endif;
                        unset($clAppAssets[$key]);
                    endif;
                endif;
            endforeach;
            if ($boosterGet['css.minify'] == '1'):
                app::log('Booster CSS [minify]');
                $outputCSS = clMinify::css($outputCSS);
            endif;
            if ($boosterGet['css.display'] == 'inline'):
                app::log('Booster CSS [inline]');
                echo '<style>' .$outputCSS.'</style>';
            elseif ($boosterGet['css.display'] == 'file'):
                $filename = base64_encode(app::url());
                $boosterStorage = $boosterGet['storage.path'] . '/' . $filename .  '.css';

                app::log('Booster CSS minified file created [' . $boosterStorage . ']');
                $fileOutputPath = clPath . $boosterStorage;
                //echo $fileOutputPath;
                if (file_exists($fileOutputPath) AND is_file($fileOutputPath)):
                        unlink($fileOutputPath);
                endif;
                $boosterCombineFile = fopen($fileOutputPath, "w+") or die("Unable to open file!");
                fwrite($boosterCombineFile, $outputCSS);
                fclose($boosterCombineFile);
                app::asset($boosterStorage);
            endif;
        endif;
        global $clReturn;
        $clReturn = true;
    endif;

    /*
    foreach ($clAppAssets as $key => $value):
        $path = $clAppAssets[$key]['path'];
        if (($type == null OR $type == 'css') AND strtolower($value['extension']) == 'css'):
            echo 'CSS: ' .$path . '</br>';
            $outputCSS .= file_get_contents(clPath . $path);
        elseif (($type == null OR $type == 'js') AND strtolower($value['extension']) == 'js'):
            echo 'JS: ' . $path . '</br>';
            $outputJS .= file_get_contents(clPath . $path);
        endif;
    endforeach;
    */
