<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funami\ChangeProductImages\Console\Command;

use ParagonIE\Sodium\Core\Curve25519\Fe;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Funami\ChangeProductImages\Helper\CreateProductCategory;

class CreateCategory extends Command
{


    private $createProductCategory;
    public function __construct(
        createProductCategory $_createProductCategory,
        $data = []
    ){
        $this->createProductCategory = $_createProductCategory;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {

        $createdCategoryId= $this->createProductCategory->createCategory('Emotion Category ' . rand(1,100), 1);
        $output->writeln("Category Id: " . $createdCategoryId);

    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("fu:create:category");
        $this->setDescription("Create category. Print out category ID.");
        $this->setDefinition([
        ]);
        parent::configure();
    }
}

