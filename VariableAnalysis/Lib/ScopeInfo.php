<?php

namespace VariableAnalysis\Lib;

/**
 * Holds details of a scope.
 */
class ScopeInfo {
  /**
   * The token index of the start of this scope.
   *
   * @var int
   */
  public $scopeStartIndex;

  /**
   * The variables defined in this scope.
   *
   * @var VariableInfo[]
   */
  public $variables = [];

  public function __construct($scopeStartIndex) {
    $this->scopeStartIndex = $scopeStartIndex;
  }
}
