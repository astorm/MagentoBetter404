<?php
class Pulsestorm_Better404_Model_Observer
{
    public function addExtraBlocks($observer)
    {
        if(!$this->_is404())
        {
            return;
        }

        $layout = $observer->getLayout();
        $block = $layout->getBlock('cms.wrapper');
        if(!$block)
        {
            return;
        }
        $layout->unsetBlock('cms.wrapper');
        $block = $layout->createBlock('pulsestorm_better404/404','cms.wrapper');
        $block->setBlock('cms.wrapper', $block);
    }
    
    protected function _is404()
    {
        $headers = Mage::app()->getResponse()->getHeaders();        
        foreach($headers as $header)
        {
            if(strToLower($header['name']) != 'status')
            {
                continue;
            }

            if(strpos($header['value'],'404') !== false)
            {
                return true;
            }
        }
        return false;
    }
}