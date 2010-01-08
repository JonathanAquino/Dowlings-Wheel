<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../lib/simpletest/autorun.php';
require_once '../app/helpers/functions.php';

class FunctionsTest extends UnitTestCase {
    public function testQh_HtmlEncodesAmpersands() {
        $this->assertIdentical('A &amp; W', qh('A & W'));
    }
}
