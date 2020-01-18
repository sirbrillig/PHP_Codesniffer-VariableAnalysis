<?php
namespace VariableAnalysis\Tests;

use PHPUnit\Framework\TestCase;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Config;

class BaseTestCase extends TestCase {
  const STANDARD_NAME = 'VariableAnalysis';
  const SNIFF_FILE = __DIR__ . '/../Sniffs/CodeAnalysis/VariableAnalysisSniff.php';

  public function prepareLocalFileForSniffs($fixtureFile) {
    $config            = new Config();
    $config->cache     = false;
    $config->standards = [self::STANDARD_NAME];
    $config->ignored   = [];

    $sniffFiles = [realpath(self::SNIFF_FILE)];
    $ruleset    = new Ruleset($config);
    $ruleset->registerSniffs($sniffFiles, [], []);
    $ruleset->populateTokenListeners();
    if (! file_exists($fixtureFile)) {
      throw new \Exception('Fixture file does not exist: ' . $fixtureFile);
    }
    return new LocalFile($fixtureFile, $ruleset, $config);
  }

  public function getLineNumbersFromMessages(array $messages) {
    $lines = array_keys($messages);
    sort($lines);
    return $lines;
  }

  public function getWarningLineNumbersFromFile(LocalFile $phpcsFile) {
    return $this->getLineNumbersFromMessages($phpcsFile->getWarnings());
  }

  public function getErrorLineNumbersFromFile(LocalFile $phpcsFile) {
    return $this->getLineNumbersFromMessages($phpcsFile->getErrors());
  }

  public function getFixture($fixtureFilename) {
    return realpath(__DIR__ . '/CodeAnalysis/fixtures/' . $fixtureFilename);
  }
}
