<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor/')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP70Migration' => false,
        '@PHP70Migration:risky' => false,
        '@PHP71Migration' => false,
        'phpdoc_summary' => false,
        'yoda_style' => false,
        'no_superfluous_phpdoc_tags' => false,
        'combine_consecutive_unsets' => true,
        'blank_line_after_opening_tag' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_no_empty_return' => false,
        'strict_param' => true,
        'doctrine_annotation_indentation' => true,
        'mb_str_functions' => true,
        'native_function_invocation' => true,
        'no_short_echo_tag' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'simplified_null_return' => false,
        'strict_comparison' => true,
        'ordered_imports' => ['sortAlgorithm' => 'alpha'],
        'declare_equal_normalize' => ['space' => 'single'],
        'array_syntax' => ['syntax' => 'short'],
        'list_syntax' => ['syntax' => 'short'],
        'doctrine_annotation_braces' => ['syntax' => 'with_braces'],
        'general_phpdoc_annotation_remove' => ['annotations' => ['author', 'created', 'version', 'package', 'copyright', 'license', 'throws']],
    ])
    ->setFinder($finder)
;
