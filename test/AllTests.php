<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../lib/simpletest/autorun.php';

class AllTests extends TestSuite {
    function AllTests() {
        $this->TestSuite('All tests');
        $this->addFile('TableTest.php');
        $this->addFile('TableLoaderTest.php');
        $this->addFile('FunctionsTest.php');
        $this->addFile('DifferTest.php');
    }
}
