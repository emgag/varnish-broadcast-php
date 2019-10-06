<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->in('tests')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony'               => true,
        'binary_operator_spaces' => ['default' => 'align'],
        'yoda_style'             => false,
    ])
    ->setFinder($finder)
;
