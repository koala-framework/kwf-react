<?php
class React_Assets_Dependency_Filter_BabelJs extends Kwf_Assets_Dependency_Filter_BabelJs
{
    protected function _getArguments()
    {
        $ret = parent::_getArguments();
        $ret['presets'] = '--presets=es2015,react';
        return $ret;
    }
}

