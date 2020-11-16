<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funami\ChangeProductImages\Plugin\Magento\Checkout\CustomerData;
use Funami\ChangeProductImages\Helper\GetProductImages;
use Magento\Catalog\Model\Product;
use Magento\Store\Model\StoreManagerInterface;

class AbstractItem
{
    private $getProductImages;
    private $product;
    private $storeManagerInterface;
    public function __construct(
        Product $_product,
        StoreManagerInterface $_storeManager,
        GetProductImages $_getProductImages
    ) {
        $this->product = $_product;
        $this->storeManagerInterface = $_storeManager;
        $this->getProductImages = $_getProductImages;
    }
    public function afterGetItemData(
        \Magento\Checkout\CustomerData\AbstractItem $subject,
        $result,
        $item
    ) {
        $productImages = $this->getProductImages->execute();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $product = $this->product->load($result['product_id']);

        /* thum url */
        $storeManager = $objectManager->create('Magento\Store\Model\StoreManagerInterface');
        $currentStore = $this->storeManagerInterface->getStore();
        $mediaUrl = $currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        foreach ($productImages as $productImage) {
            if($productImages['sku'] == $product->getSku()){
                // API URL should be here
                $result['product_image']['src'] = $productImage['url'];
            }
            else{
                $result['product_image']['src'];
            }
        }

        return $result;
    }
}
