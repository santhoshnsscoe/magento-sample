<?php

namespace VendorName\SampleModule\Model\Source;

use VendorName\SampleModule\Model\Payment;

class PaymentAction {

    public function toOptionArray() {

        return [
            /** [
              'value' => Payment::ACTION_AUTHORIZE,
              'label' => __('Authorize Only')
              ],* */
            [
                'value' => Payment::ACTION_AUTHORIZE_CAPTURE,
                'label' => __('Authorize and Capture')
            ],
        ];
    }

}
