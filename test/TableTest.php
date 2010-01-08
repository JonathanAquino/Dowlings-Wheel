<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../lib/simpletest/autorun.php';
require_once '../app/models/Table.php';

class TableTest extends UnitTestCase {
    public function testGetTextWithValuesCleared() {
        $table = new Table('Nouns', 'Gates: portae portarum portis portas portis');
        $this->assertIdentical('Gates: ', $table->getTextWithoutValues());
    }
}

