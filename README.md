#  Change product images (concept)

    ``funami/module-changeproductimages``  
___
    > 1. Create new module. Must be compatible with newest Magento version.
    > 2. Create Magento command line commands to:
    >   a. Create category. Print out category ID.
    >   b. Create products with sku 101 and 102. They should not have images. Add
           products to required category (using input option).
    > 3. In category and product view pages those products should display image from Dummy
      API.
    > 4. When added to cart, those products in minicart should display images from API.

## Main Functionalities
Change product images from CDN API

### Files

 - Unzip the zip file in `app/code/Funami`
 - Enable the module by running `php bin/magento module:enable Funami_ChangeProductImages`
 - Compile php classes by running `php bin/magento setup:di:compile`
 - Flush the cache by running `php bin/magento cache:flush`


## Commands
  ``fu:create:category``  
  
  ``fu:create:products``
  
## Attributes



