<?php
class React_Assets_CssByJsx extends Kwf_Assets_Provider_Abstract
{
    public function getDependenciesForDependency(Kwf_Assets_Dependency_Abstract $dependency)
    {
        $ret = array();

        if ($dependency->getMimeType() == 'text/javascript' && $dependency instanceof Kwf_Assets_Dependency_File) {
            if (substr($dependency->getFileNameWithType(), -4) == '.jsx') {
                if (file_exists(substr($dependency->getAbsoluteFileName(), 0, -4).'.css')) {
                    $fnCss = substr($dependency->getFileNameWithType(), 0, -4).'.css';
                    $ret[Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_REQUIRES][] = new Kwf_Assets_Dependency_File_Css($this->_providerList, $fnCss);
                }
                if (file_exists(substr($dependency->getAbsoluteFileName(), 0, -4).'.scss')) {
                    $fnScss = substr($dependency->getFileNameWithType(), 0, -4).'.scss';
                    $ret[Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_REQUIRES][] = new Kwf_Assets_Dependency_File_Scss($this->_providerList, $fnScss);
                }
            }
        }
        return $ret;
    }

    public function getDependency($dependencyName)
    {
        return null;
    }
}

