<?php

namespace VendorName\SampleModule\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Area;
use Magento\Framework\Mail\Template\TransportBuilder;

class Email extends Data {

    //construct params
    protected $_transportBuilder;
    
    public function __construct(Context $context, TransportBuilder $transportBuilder) {
        $this->_transportBuilder = $transportBuilder;
        parent::__construct($context);
    }

    public function sendEmail() {

        $templateId = $this->getConfig('template');
        $identity = $this->getConfig('identity');
        $storeid = 1;
        $vars = array();
        $tomail = 'testing@testing.com';
        $toname = 'testing testing';

        if ($templateId && $identity) {
            $transport = $this->_transportBuilder
                    ->setTemplateIdentifier($templateId)
                    ->setTemplateOptions(['area' => Area::AREA_FRONTEND, 'store' => $storeid])
                    ->setTemplateVars($vars)
                    ->setFrom($identity)
                    ->addTo($tomail, $toname)
                    ->getTransport();
            $transport->sendMessage();
        }

        return $this;
    }

}
