<?php


class content {

    public static function get($sourceType, $alias, $sourceID = null){
        GLOBAL $clAppContent;
        if ($sourceType == 'section'):
            if ($sourceID == null):
                $sourceID = section::get('id');
            endif;
            if (!isset($clAppContent['section'][$sourceID][$alias])):
                sql::insert('clContent', array(
                    'sourceType' => $sourceType,
                    'sourceID' => $sourceID,
                    'name' => '',
                    'alias' => $alias,
                    'value' => '',
                    'lang' => app::lang('idDefaultDeveloper')
                ));
            endif;
        endif;
        if ($sourceType == 'page'):
            if ($sourceID == null):
                $sourceID = clPage['id'];
            endif;
            if (!isset($clAppContent['page'][$sourceID][$alias])):
                sql::insert('clContent', array(
                    'sourceType' => $sourceType,
                    'sourceID' => $sourceID,
                    'name' => '',
                    'alias' => $alias,
                    'value' => '',
                    'lang' => app::lang('idDefaultDeveloper')
                ));
            endif;
        endif;
        $return =  $clAppContent[$sourceType][$sourceID][$alias];
        return $return;

    }
}
