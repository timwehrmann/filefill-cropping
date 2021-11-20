<?php
defined('TYPO3_MODE') || die;

unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['processors']['DeferredBackendImageProcessor']);

if ($contextConfiguration ?? false && @file_exists($contextConfiguration)) {
    /** @noinspection PhpIncludeInspection */
    require_once $contextConfiguration;
}

$GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = [
    \TYPO3\CMS\Core\Log\LogLevel::ERROR => [
        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3_error.log',
        ]
    ],
    \TYPO3\CMS\Core\Log\LogLevel::WARNING => [
        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [],
    ],
    \TYPO3\CMS\Core\Log\LogLevel::DEBUG => [
        \TYPO3\CMS\Core\Log\Writer\NullWriter::class => [],
    ],
];

// Always load HostConfiguration file
$hostConfigurationPath = __DIR__ . '/HostConfiguration.php';
if (@file_exists($hostConfigurationPath)) {
    /** @noinspection PhpIncludeInspection */
    require_once $hostConfigurationPath;
}
