<?php
class React_Assets_Provider extends Kwf_Assets_Provider_Abstract
{
    public function getDependency($dependencyName)
    {
        if (substr($dependencyName, 0, 4) == 'kwf/') {
            $dependencyName = substr($dependencyName, 4);
            if (file_exists(KWF_PATH.'/commonjs/'.$dependencyName.'.jsx')) {
                $ret = new React_Assets_Dependency_File_Jsx($this->_providerList, 'kwf/commonjs/'.$dependencyName.'.jsx');
                return $ret;
            }
        } else if (substr($dependencyName, 0, 4) == 'web/') {
            $dependencyName = substr($dependencyName, 4);
            if (file_exists('./'.$dependencyName.'.jsx')) {
                $ret = new React_Assets_Dependency_File_Jsx($this->_providerList, 'web/'.$dependencyName.'.jsx');
                return $ret;
            }
        }
        return null;
    }
}

