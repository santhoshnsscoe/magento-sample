
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'vendorname_samplemodule',
                component: 'VendorName_SampleModule/js/view/payment/method-renderer/method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);