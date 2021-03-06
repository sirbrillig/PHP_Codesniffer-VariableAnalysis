<?php

function loopAndPush($parts) {
  $suggestions = [];
  while ($part = array_shift($parts)) {
    $suggestions[] = $part;
  }
  return $suggestions;
}

function concatAndAssignAndPush($parts) {
  $suggestions = [];
  $suggestion = 'block';
  while ($part = array_shift($parts)) {
    $suggestions[] = $suggestion .= '__' . strtr($part, '-', '_');
  }
  return $suggestions;
}

function concatAndAssignAndPushWithoutLoop() {
  $suggestions = [];
  $suggestion = 'block';
  $suggestions[] = $suggestion .= '__';
  return $suggestions;
}

function concatAndPush($parts) {
  $suggestions = [];
  $suggestion = 'block';
  while ($part = array_shift($parts)) {
    $suggestions[] = $suggestion . '__' . strtr($part, '-', '_');
  }
  return $suggestions;
}

function whileLoopAssignWithUndefinedShift() {
  $suggestions = [];
  while ($part = array_shift($parts)) { // undefined variable parts
    $suggestions[] = $part;
  }
  return $suggestions;
}

function loopAndPushWithUndefinedArray($parts) {
  while ($part = array_shift($parts)) {
    $suggestions[] = $part; // undefined variable suggestions
  }
  return $suggestions;
}

function concatAndAssignAndPush2($parts) {
  $suggestions = [];
  $suggestion = 'block';
  while ($part = array_shift($parts)) {
    $suggestions[] = ( $suggestion .= '__' . strtr($part, '-', '_') );
  }
  return $suggestions;
}

function concatAndAssignAndPush3($parts) {
  $suggestions = [];
  $suggestion = 'block';
  while ($part = array_shift($parts)) {
    $suggestions[] = getPrefix() . $suggestion .= '__' . strtr($part, '-', '_');
  }
  return $suggestions;
}

function concatAndAssignAndPush4($parts) {
  $suggestion = 'block';
  while ($part = array_shift($parts)) {
    addToSuggestion($suggestion .= $part);
  }
}
