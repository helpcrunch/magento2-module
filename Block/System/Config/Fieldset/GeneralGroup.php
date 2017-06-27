<?php

namespace HelpCrunch\HelpCrunch\Block\System\Config\Fieldset;

use \Magento\Backend\Block\Context;
use \Magento\Backend\Model\Auth\Session;
use \Magento\Config\Block\System\Config\Form\Fieldset;
use \Magento\Framework\Data\Form\Element\AbstractElement;
use \Magento\Framework\View\Helper\Js;

class GeneralGroup extends Fieldset
{
    /**
     * @param Context $context
     * @param Session $authSession
     * @param Js $jsHelper
     * @param array $data
     */
    public function __construct(Context $context, Session $authSession, Js $jsHelper, array $data = array())
    {
        parent::__construct($context, $authSession, $jsHelper, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getHeaderCommentHtml($element)
    {
        $settings = null;
        $fieldElement = $element->getElements()->searchById('helpcrunch_block_config_general_settings');
        if (is_object($fieldElement) && method_exists($fieldElement, 'getData')) {
            $fieldElementData = $fieldElement->getData();
            if (array_key_exists('value', $fieldElementData)) {
                $settings = $fieldElementData['value'];
            }
        }

        return '<div class="comment" id="helpcrunch-settings-comment">' .
            $this->getHeaderCommentText(!!$settings) .
            '</div>';
    }

    /**
     * @param bool $isLoggedIn
     * @return string
     */
    private function getHeaderCommentText($isLoggedIn)
    {
        if ($isLoggedIn) {
            return '
            <h3>HelpCrunch settings are installed</h3>
            <ul>
              <li>
                You can check your settings string code in "CMS / E-commerce" block at Settings &#8594; Website Widgets
              </li>
              <li>
                If you have any problems with widget - check the
                <a target="_blank" href="https://docs.helpcrunch.com/integrations.html#magento2-integration">
                  integration guide
                </a>
              </li>
              <li>
                If you still have any questions, you can login into your HelpCrunch admin account and ask us by chat
              </li>
            </ul>';
        }

        return '
            <h3>You need to enter HelpCrunch settings string</h3>
            <ul>
              <li>
                If you don\'t have a HelpCrunch account you\'ll need to register at
                <a href="https://helpcrunch.com/signup.html?utm_medium=helpcrunch&utm_campaign=extensions&utm_source=magento2_extension" target="_blank">
                  https://helpcrunch.com/signup.html
                </a>
                first
              </li>
              <li>
                If you have registered a HelpCrunch account and now you are completing a wizard -
                copy your settings from the first step of the wizard, choosing the <b>Magento</b>
                from the platforms list
              </li>
              <li>
                If you have skipped a wizard or have already installed a website widget somewhere else -
                go to your <a target="_blank" href="https://helpcrunch.com/signin.html">HelpCrunch admin account</a>,
                then to Settings &#8594; Website Widgets, choose your widget (or create one) and copy 
                a code from <b>CMS / E-commerce</b> block in <b>Settings / Setup</b>
              </li>
              <li>
                If you are stuck - check the
                <a target="_blank" href="https://docs.helpcrunch.com/integrations.html#magento2-integration">
                  integration guide
                </a>
                or ask us by chat from your HelpCrunch admin account.
              </li>
            </ul>';
    }
}
