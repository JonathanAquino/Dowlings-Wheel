<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../lib/simpletest/autorun.php';
require_once '../app/helpers/TableLoader.php';
require_once '../app/models/Table.php';

class TableLoaderTest extends UnitTestCase {
    public function testParse_CreatesTwoTableObjects_GivenTwoSections() {
        $tableLoader = new TestTableLoader();
        $tables = $tableLoader->parse('=== Nouns ===
Gates: portae portarum portis portas portis
=== Adjectives ===
Large (masculine, singular): magnus magni magno magnum magno');
        $this->assertIdentical(array('Nouns', 'Adjectives'), array_keys($tables));
        $this->assertIdentical('Gates: portae portarum portis portas portis', $tables['Nouns']->getText());
    }
}

class TestTableLoader extends TableLoader {
    public function parse($data) {
        return parent::parse($data);
    }
}
