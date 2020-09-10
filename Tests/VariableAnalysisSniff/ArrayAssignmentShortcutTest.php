<?php
namespace VariableAnalysis\Tests\VariableAnalysisSniff;

use VariableAnalysis\Tests\BaseTestCase;

class ArrayAssignmentShortcutTest extends BaseTestCase {
  public function testArrayAssignmentReportsCorrectLines() {
    $fixtureFile = $this->getFixture('ArrayAssignmentShortcutFixture.php');
    $phpcsFile = $this->prepareLocalFileForSniffs($fixtureFile);
    $phpcsFile->process();

    $lines = $this->getWarningLineNumbersFromFile($phpcsFile);
    $expectedWarnings = [
      21,
      27,
      28,
      29,
    ];
    $this->assertEquals($expectedWarnings, $lines);
  }

  public function testArrayAssignmentHasCorrectSniffCodes() {
    $fixtureFile = $this->getFixture('ArrayAssignmentShortcutFixture.php');
    $phpcsFile = $this->prepareLocalFileForSniffs($fixtureFile);
    $phpcsFile->process();

    $warnings = $phpcsFile->getWarnings();
    $this->assertEquals('VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedArrayVariable', $warnings[21][5][0]['source']);
    $this->assertEquals('VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedArrayVariable', $warnings[27][5][0]['source']);
    $this->assertEquals('VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable', $warnings[28][5][0]['source']);
    $this->assertEquals('VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable', $warnings[29][10][0]['source']);
  }
}
