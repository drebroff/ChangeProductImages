<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funami\ChangeProductImages\Plugin\Magento\Catalog\Model;

use Funami\ChangeProductImages\Helper\GetProductImages;

class Product
{
    private $getProductImages;

    public function __construct(
        GetProductImages $_getProductImages
    ) {
        $this->getProductImages = $_getProductImages;
    }
    public function afterGetImage(
        \Magento\Catalog\Model\Product $subject,
        $result
    ) {
        $productImages = $this->getProductImages->execute();

        // INTERCEPT PRODUCT IMAGE HERE
         foreach ($productImages as $productImage) {
           if ($productImage['sku'] == $subject->getSku()) {
             // Set Image
            }
          }

        return $result;
    }
}
