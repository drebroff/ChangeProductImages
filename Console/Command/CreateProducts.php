<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funami\ChangeProductImages\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Funami\ChangeProductImages\Helper\CreateEmotionalProduct;
class CreateProducts extends Command
{

    const CATEGORY_ARGUMENT = "category";
    const CATEGORY_OPTION = "option";
    private $createEmotionalProduct;
    private $state;
    public function __construct(
        \Magento\Framework\App\State $state,
        CreateEmotionalProduct $_createEmotionalProduct,
        $data = []
    ){
        $this->createEmotionalProduct = $_createEmotionalProduct;
        $this->state = $state;
        parent::__construct();
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML); // or \Magento\Framework\App\Area::AREA_ADMINHTML, depending on your needs
        $categoryId = $input->getArgument(self::CATEGORY_ARGUMENT);
        $option = $input->getOption(self::CATEGORY_OPTION);
        $this->createEmotionalProduct->createProduct($categoryId);
//        $output->writeln("Hello " . $name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("fu:create:products");
        $this->setDescription("Create products with sku 101 and 102. They should not have images. Add products to required category (using input option).");
        $this->setDefinition([
            new InputArgument(self::CATEGORY_ARGUMENT, InputArgument::REQUIRED, "Category ID"),
            new InputOption(self::CATEGORY_OPTION, "-c", InputOption::VALUE_NONE, "Category ID for products")
        ]);
        parent::configure();
    }
}

