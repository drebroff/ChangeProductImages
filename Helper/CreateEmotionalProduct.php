<?php
namespace Funami\ChangeProductImages\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Model\Category;

class CreateEmotionalProduct extends AbstractHelper
{


    protected $productFactory;
    private $productRepository;
    public function __construct(

        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\App\Helper\Context $context,
    ProductRepository $_productRepository

    )

    {
$this->productRepository = $_productRepository;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

public function createProduct($categpryId) {
    $_product = $this->productFactory->create();


    $_product->setName('asd');
    $_product->setTypeId('Dome');
    $_product->setAttributeSetId(4);
    $_product->setSku('203-SKU');
    $_product->setWebsiteIds(array(1));
    $_product->setVisibility(4);
    $_product->setPrice(350.00);
    $_product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
    $_product->setStockData(array(
            'use_config_manage_stock' => 0, //'Use config settings' checkbox
            'manage_stock' => 1, //manage stock
            'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
            'max_sale_qty' => 2, //Maximum Qty Allowed in Shopping Cart
            'is_in_stock' => 1, //Stock Availability
            'qty' => 100 //qty
        )
    );

    $product = $this->productRepository->save($_product);

//    $simpleProduct1 = $this->productFactory->create();
//    $simpleProduct1->setData('sku', '203');
//    $simpleProduct1->setData('name', 'Test Simple Product 1');
//    $simpleProduct1->setData('website_ids', array(1)); // product can be found in main website
//    $simpleProduct1->setData('attribute_set_id', 4);
//    $simpleProduct1->setData('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
//    $simpleProduct1->setData('visibility', 4);
//    $simpleProduct1->setData('price', 12);
//    $simpleProduct1->setData('category_ids', [$categpryId]);// set category
//    $simpleProduct1->setData('type_id', 'simple');
//    $simpleProduct1->setData('stock_data', array(  // set product quantity
//        'use_config_manage_stock' => 0,
//        'manage_stock' => 1,
//        'is_in_stock' => 1,
//        'qty' => 100
//    ));
//    $product = $this->productRepository->save($simpleProduct1);

//    $simpleProduct1->save();

//    $simpleProductId1 = $simpleProduct1->getId();  // get simple product id so that we can assign it to configurable product by id later
}

}
