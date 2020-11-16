<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funami\ChangeProductImages\Plugin\Magento\Catalog\Model;
use Funami\ChangeProductImages\Helper\GetProductImages;

class Category
{
    private $getProductImages;
    public function __construct(
        GetProductImages $_getProductImages
    ) {
        $this->getProductImages = $_getProductImages;
    }
    public function afterGetImageUrl(
        \Magento\Catalog\Model\Category $subject,
        $result,
        $attributeCode = 'image'
    ) {
        $productImages = $this->getProductImages->execute();


        // INTERCEPT CATALOG PRODUCT IMAGE HERE
//         foreach ($productImages as $productImage) {
//           if ($productImage['sku'] == $subject->getAllChildren()) {
//             $result->image = $image['url']
//            }
//          }

        return $result;
    }
}
