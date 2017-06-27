<?php

namespace HelpCrunch\HelpCrunch\Helper;

use \Magento\Customer\Model\Customer;
use \Magento\Customer\Model\Session;
use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package HelpCrunch\HelpCrunch\Helper
 */
class Data extends AbstractHelper
{
    const SETTINGS_PATH = 'helpcrunch_block_config/general/settings';

    /**
     * @var Customer
     */
    private $customer = null;

    /**
     * @var \stdClass
     */
    private $settings = array();

    /**
     * @param Context $context
     * @param Session $customerSession
     */
    public function __construct(Context $context, Session $customerSession)
    {
        parent::__construct($context);
        if ($customerSession && $customerSession->isLoggedIn()) {
            $this->customer = $customerSession->getCustomer();
        }
        $settings = $this->scopeConfig->getValue(self::SETTINGS_PATH, ScopeInterface::SCOPE_STORE);
        if ($settings && ($settings = json_decode($settings))) {
            $this->settings = $settings;
        }
    }

    /**
     * @return bool
     */
    public function hasSettings()
    {
        return !empty($this->settings) &&
            isset($this->settings->organization) &&
            isset($this->settings->application_id) &&
            isset($this->settings->application_secret);
    }

    /**
     * Returns HelpCrunch organization name
     * @return integer
     */
    public function getOrganizationName()
    {
        return $this->settings->organization;
    }

    /**
     * Returns HelpCrunch application (widget) ID
     * @return integer
     */
    public function getApplicationId()
    {
        return $this->settings->application_id;
    }

    /**
     * Returns HelpCrunch application (widget) secret
     * @return integer
     */
    public function getApplicationSecret()
    {
        return $this->settings->application_secret;
    }

    /**
     * @return bool
     */
    public function isLoggedIn()
    {
        return !empty($this->customer);
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer->getId();
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customer->getEmail();
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer->getName();
    }
}
