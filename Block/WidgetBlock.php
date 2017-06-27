<?php

namespace HelpCrunch\HelpCrunch\Block;

use \HelpCrunch\HelpCrunch\Helper\Data;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

/**
 * Class WidgetBlock
 * @package HelpCrunch\HelpCrunch\Block
 */
class WidgetBlock extends Template
{
    /**
     * @var Data
     */
    private $dataHelper;

    /**
     * @param Context $context
     * @param Data $dataHelper
     * @param array $data
     */
    public function __construct(Context $context, Data $dataHelper, array $data = array())
    {
        parent::__construct($context, $data);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @return Data
     */
    public function getDataHelper()
    {
        return $this->dataHelper;
    }
}
