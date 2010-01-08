<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../lib/simpletest/autorun.php';
require_once '../app/helpers/Differ.php';

class DifferTest extends UnitTestCase {

    public function setUp() {
        $this->differ = new TestDiffer();
    }

    public function testDiff() {
        $expectedText = '--- First Declension ---
Gates: portae portarum portis portas portis
Gate: porta portae portae portam porta';
        $actualText = 'Foo & Bar
Gates:  portae, portarum portix portas';
        $expectedDiff = 'Foo &amp; Bar
Gates: <span class="correct">portae</span> <span class="correct">portarum</span> <span class="incorrect">portix <span class="hint">(portis)</span></span> <span class="correct">portas</span> <span class="incorrect"><span class="hint">(portis)</span></span>';
        $actualDiff = $this->differ->diff($expectedText, $actualText);
        $this->assertIdentical($expectedDiff, $actualDiff);
    }

    public function testDiffLines() {
        $expectedLine = 'Gates: portae portarum portis portas portis';
        $actualLine = 'Gates:  portae portarum portix portas portis foo';
        $expectedDiff = 'Gates: <span class="correct">portae</span> <span class="correct">portarum</span> <span class="incorrect">portix <span class="hint">(portis)</span></span> <span class="correct">portas</span> <span class="correct">portis</span> <span class="incorrect">foo <span class="hint">()</span></span>';
        $actualDiff = $this->differ->diffLines($expectedLine, $actualLine);
        $this->assertIdentical($expectedDiff, $actualDiff);
    }

    public function testDiffLines_MarksAllWordsIncorrect_WhenExpectedLineEmpty() {
        $expectedLine = '';
        $actualLine = 'Gates:  portae portarum portix';
        $expectedDiff = 'Gates: <span class="incorrect">portae <span class="hint">()</span></span> <span class="incorrect">portarum <span class="hint">()</span></span> <span class="incorrect">portix <span class="hint">()</span></span>';
        $actualDiff = $this->differ->diffLines($expectedLine, $actualLine);
        $this->assertIdentical($expectedDiff, $actualDiff);
    }

    public function testLinesWithLabels() {
        $expectedValue = array(
                'Gate: porta portae portae portam porta',
                'Gates: portae portarum portis portas portis');
        $this->assertIdentical($expectedValue, $this->differ->linesWithLabels(array(
                '--- First Declension ---',
                'Gate: porta portae portae portam porta',
                'Gates: portae portarum portis portas portis')));
    }
}

class TestDiffer extends Differ {
    public function linesWithLabels($text) {
        return parent::linesWithLabels($text);
    }
    public function diffLines($expectedLine, $actualLine) {
        return parent::diffLines($expectedLine, $actualLine);
    }
}
