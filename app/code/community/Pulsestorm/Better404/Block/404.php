<?php
class Pulsestorm_Better404_Block_404 extends Mage_Core_Block_Template
{
    protected $_lint;
    public function _construct()
    {
        $this->_initLint();
        $this->setTemplate('pulsestorm_better404/404.phtml');
    }
    
    public function getClaimedByName()
    {
        return $this->_lint->getClaimedByName();
    }
    
    public function getUrlOriginalPath()
    {
        return $this->_lint->getUrlOriginalPath();
    }  
    
    public function getClaimed()
    {
        return $this->_lint->getClaimed();
    }
    
    public function getUrlModuleName()
    {        
        return $this->_lint->getUrlModuleName();
    }
    
    public function getUrlControllerName()
    {
        return $this->_lint->getUrlControllerName();
    }

    public function getUrlActionName()
    {
        return $this->_lint->getUrlActionName();
    }

    public function getControllerFilePath($module_name)
    {
        $info = $this->_lint->getControllerInformation($module_name);
        return $info['class_file'];
    }

    /**
    * Crude state machine to check if the class exists
    */
    public function getControllerClassExists($module_name)
    {
        return $this->_lint->getControllerClassExists($module_name);
    }
    
    public function getControllerInformation($module_name)
    {
        return $this->_lint->getControllerInformation($module_name);
    }
    
    public function getControllerClassName($module_name)
    {
        $info = $this->_lint->getControllerInformation($module_name);
        return $info['class_name'];
    }

    public function getControllerFileExists($module_name)
    {
        $info = $this->_lint->getControllerInformation($module_name);
        return file_exists($info['class_file']);
    }
    
    public function getActionMethodExists($controller_name, $action)
    {
        return $this->_lint->getActionMethodExists($controller_name, $action);
    }
    
    public function getExtraModules()
    {
        return $this->_lint->getExtraModules();        
    }
    protected function _initLint()
    {
        $this->_lint = Mage::getModel('pulsestorm_better404/lint');
        return $this->_lint;
    }
    
    protected function _safeHtml($string)
    {
        return strip_tags($string);
    }
}