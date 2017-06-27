## HelpCrunch Widget module for Magento 2

[HelpCrunch](https://helpcrunch.com) widget for your Magento 2 site.

Also it will automatically authorize customers in HelpCrunch (via [user authentication mode](https://helpcrunch.com/docs/web-sdk.html#user-authentication-mode)).

### Installation
* `composer require helpcrunch/magento2-module:dev-master`
* `php bin/magento module:enable HelpCrunch_HelpCrunch`
* `php bin/magento setup:upgrade`
* `php bin/magento setup:di:compile` (if magento asks to "re-run Magento compile command")
* `php bin/magento setup:static-content:deploy -f`
* `php bin/magento cache:clean`
