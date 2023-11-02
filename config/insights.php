<?php

declare(strict_types=1);

use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenDefineFunctions;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenFinalClasses;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenPrivateMethods;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits;
use NunoMaduro\PhpInsights\Domain\Metrics\Architecture\Classes;
use SlevomatCodingStandard\Sniffs\Commenting\UselessFunctionDocCommentSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\SuperfluousWhitespaceSniff;
use SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */

    'preset' => 'laravel',
    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    |
    | This options allow to add hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    | Supported: "textmate", "macvim", "emacs", "sublime", "phpstorm",
    | "atom", "vscode".
    |
    | If you have another IDE that is not in this list but which provide an
    | url-handler, you could fill this config with a pattern like this:
    |
    | myide://open?url=file://%f&line=%l
    |
    */

    'ide' => 'phpstorm',
    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind that all added `Insights` must belong to a specific `Metric`.
    |
    */

    'exclude' => [
        'app/Exceptions/Handler.php',
        'app/Providers/',
        'app/Rules/ValidName.php',
        'app/Console/Kernel.php',
        'app/Http/Middleware/',
    ],

    'add' => [
        Classes::class => [
            ForbiddenFinalClasses::class,
        ],
    ],

    'remove' => [
        AlphabeticallySortedUsesSniff::class,
        DeclareStrictTypesSniff::class,
        DisallowMixedTypeHintSniff::class,
        ForbiddenDefineFunctions::class,
        ForbiddenNormalClasses::class,
        ForbiddenTraits::class,
        ParameterTypeHintSniff::class,
        PropertyTypeHintSniff::class,
        ReturnTypeHintSniff::class,
        UselessFunctionDocCommentSniff::class,
        SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
        SlevomatCodingStandard\Sniffs\ControlStructures\DisallowShortTernaryOperatorSniff::class,
        SlevomatCodingStandard\Sniffs\Operators\DisallowEqualOperatorsSniff::class,
        SlevomatCodingStandard\Sniffs\TypeHints\DisallowArrayTypeHintSyntaxSniff::class,
        NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class,
        NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class,
        PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff::class,
        SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff::class,
        PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer::class,
        SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class,
        PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer::class,
        \PhpCsFixer\Fixer\Import\OrderedImportsFixer::class,
        SlevomatCodingStandard\Sniffs\Operators\RequireOnlyStandaloneIncrementAndDecrementOperatorsSniff::class,
        SlevomatCodingStandard\Sniffs\PHP\UselessParenthesesSniff::class,
        PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer::class,
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenSecurityIssues::class,
        PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\TodoSniff::class,
        PHP_CodeSniffer\Standards\Generic\Sniffs\Strings\UnnecessaryStringConcatSniff::class
    ],

    'config' => [
        ForbiddenPrivateMethods::class => [
            'title' => 'The usage of private methods is not idiomatic in Laravel.',
        ],
        LineLengthSniff::class => [
            'lineLimit' => 120,
            'absoluteLineLimit' => 130,
            'ignoreComments' => true,
            'exclude' => [
                'lang/'
            ]
        ],
        SuperfluousWhitespaceSniff::class => [
            'ignoreBlankLines' => true,
        ],
        DocCommentSpacingSniff::class => [
            'linesCountBeforeFirstContent' => 0,
            'linesCountBetweenDescriptionAndAnnotations' => 0,
            'linesCountBetweenDifferentAnnotationsTypes' => 0,
            'linesCountBetweenAnnotationsGroups' => 1,
            'linesCountAfterLastContent' => 0,
            'annotationsGroups' => [],
        ],
        \PhpCsFixer\Fixer\Basic\BracesFixer::class => [
            'allow_single_line_closure' => true
        ],
        SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class => [
            'exclude' => [
                'app/Rules/',
                'app/Http/Requests/API/'
            ]
        ],
        \SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff::class => [
            'searchAnnotations' => true,
            'ignoredAnnotationNames' => [],
            'ignoredAnnotations' => ['@urlParam'],
        ],
        \SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class => [
            'maxLinesLength' => 30,
            'exclude' => [
                'app/Repositories/BaseRepository.php',
            ]
        ],
        \PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer::class => [
            'exclude' => [
                'lang/'
            ]
        ],
        \PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class => [
            'exclude' => [
                'app/Repositories/BaseRepository.php',
            ]
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
    */

    'requirements' => [
//        'min-quality' => 0,
//        'min-complexity' => 0,
//        'min-architecture' => 0,
//        'min-style' => 0,
//        'disable-security-check' => false,
    ],

];
