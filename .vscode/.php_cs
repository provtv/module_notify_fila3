<?php
<<<<<<< HEAD
=======

declare(strict_types=1);

>>>>>>> 688d0704 (first)
$finder = PhpCsFixer\Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
<<<<<<< HEAD
    ->ignoreVCS(true)
;

return PhpCsFixer\Config::create()
    ->setRules(array(
=======
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules([
>>>>>>> 688d0704 (first)
        '@Symfony' => true,
        'array_indentation' => true,
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'combine_consecutive_unsets' => true,
        'binary_operator_spaces' => ['align_double_arrow' => false],
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_construct' => false,
<<<<<<< HEAD
        'braces'=>[
            'position_after_functions_and_oop_constructs'=>'same',
=======
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
>>>>>>> 688d0704 (first)
        ],
        'function_declaration' => true,
        'blank_line_after_namespace' => true,
        'class_definition' => true,
        'elseif' => true,
<<<<<<< HEAD
    ))
    ->setFinder($finder)
;
=======
    ])
    ->setFinder($finder);
>>>>>>> 688d0704 (first)
