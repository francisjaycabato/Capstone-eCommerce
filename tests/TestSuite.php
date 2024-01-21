<?php

use PHPUnit\Framework\TestSuite;

require_once 'PasswordValidationTest.php'; // Include each test file

$suite = new TestSuite();
$suite->addTestSuite(PasswordValidationTest::class);
$suite->addTestSuite(CartTest::class);

// Add more test cases as needed

return $suite;
