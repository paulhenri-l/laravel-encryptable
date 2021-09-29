<?php

require __DIR__ . '/vendor/autoload.php';

$finder = \PhpCsFixer\Finder::create()->in([
    'src/', 'tests/'
]);

return (new PaulhenriL\PhpCsConfig\Config())->setRules([
    '@paulhenri-l' => true,
    'array_syntax' => ['syntax' => 'short'],
])->setFinder($finder);
