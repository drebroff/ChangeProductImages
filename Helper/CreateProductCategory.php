<?php


namespace Funami\ChangeProductImages\Helper;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Catalog\Api\CategoryRepositoryInterface;

class CreateProductCategory extends AbstractHelper
{
    protected $categoryFactory;
    protected $storeManager;
    protected $categoryRepository;
    function __construct(
        StoreManagerInterface $_storeManager,
        CategoryFactory $categoryFactory,
        \Magento\Framework\App\Helper\Context $context,
        CategoryRepositoryInterface $_categoryRepository

    )
    {
        $this->categoryRepository = $_categoryRepository;
        $this->storeManager = $_storeManager;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function FetchOrCreateProductCategory($categoryName, $categoryParentId)
    {
        $parentCategory = $this->categoryFactory->create()->load($categoryParentId);

        $category = $this->categoryFactory->create();
        $cate = $category->getCollection()
            ->addAttributeToFilter('name', $categoryName)
            ->getFirstItem();

        if (!$cate->getId()) {
            $category->setPath($parentCategory->getPath())
                ->setParentId($categoryParentId)
                ->setName($categoryName)
                ->setIsActive(true);
            $category->save();
        }

        return $category->getCollection()
            ->addAttributeToFilter('name', $categoryName)
            ->getFirstItem()->getId();
    }

    function createCategory($categoryName, $parentCategoryId) {

        $category = $this->categoryFactory->create();

        $category->setName($categoryName);
        $category->setParentId($parentCategoryId); // 1: root category.
        $category->setIsActive(true);
        $category->setCustomAttributes([
            'description' => 'Computer 3 desc',
        ]);

        $this->categoryRepository->save($category);
        return $category->getCollection()
            ->addAttributeToFilter('name', $categoryName)
            ->getFirstItem()->getId();
    }
}
