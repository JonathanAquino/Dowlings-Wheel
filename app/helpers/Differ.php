<?php
/**
 * Produces an HTML report of the difference between the expected and
 * actual values of a Latin table submitted by the user.
 */
class Differ {

    /**
     * Returns an HTML report of the difference between the expected
     * and submitted data.
     *
     * @param $expectedText string  the correct data
     * @param $actualTable string  the submitted data
     * @return string  HTML showing correct words in green and incorrect words in red
     */
    public function diff($expectedText, $actualText) {
        $expectedLines = $this->linesWithLabels(preg_split('!\r\n|\n|\r!', $expectedText));
        $i = 0;
        $actualLines = preg_split('!\r\n|\n|\r!', $actualText);
        $diff = array();
        foreach ($actualLines as $actualLine) {
            if (! preg_match('!^(?P<label>[^:]+):(?P<words>.*)!', $actualLine, $matches)) {
                $diff[] = qh($actualLine);
            } else {
                $diff[] = $this->diffLines(isset($expectedLines[$i]) ? $expectedLines[$i] : '', $actualLine);
                $i++;
            }
        }
        return implode("\n", $diff);
    }

    /**
     * Returns an HTML report of the difference between the expected
     * and actual line.
     *
     * @param $expectedLine string  the correct line
     * @param $actualLine string  the submitted line
     * @return string  HTML showing correct words in green and incorrect words in red
     */
    protected function diffLines($expectedLine, $actualLine) {
        list($expectedLabel, $expectedWords) = $expectedLine ? explode(':', $expectedLine, 2) : array('', '');
        list($actualLabel, $actualWords) = explode(':', $actualLine, 2);
        preg_match_all('![\s,]*([^\s,]+)!', $actualWords, $actualMatches);
        preg_match_all('![\s,]*([^\s,]+)!', $expectedWords, $expectedMatches);
        $diff = $actualLabel . ':';
        $n = max(count($expectedMatches[1]), count($actualMatches[1]));
        for ($i = 0; $i < $n; $i++) {
            if ($i >= count($expectedMatches[1])) {
                $diff .= ' <span class="incorrect">' . qh($actualMatches[1][$i]) . ' <span class="hint">()</span></span>';
            } elseif ($i >= count($actualMatches[1])) {
                $diff .= ' <span class="incorrect"><span class="hint">(' . qh($expectedMatches[1][$i]) . ')</span></span>';
            } elseif (strcasecmp(preg_replace('![^a-z]!i', '', $expectedMatches[1][$i]), preg_replace('![^a-z]!i', '', $actualMatches[1][$i])) !== 0) {
                $diff .= ' <span class="incorrect">' . qh($actualMatches[1][$i]) . ' <span class="hint">(' . qh($expectedMatches[1][$i]) . ')</span></span>';
            } else {
                $diff .= ' <span class="correct">' . qh($actualMatches[1][$i]) . '</span>';
            }
        }
        return $diff;
    }

    /**
     * Returns the lines that contain labels (strings followed by a colon).
     *
     * @param $lines array  the lines to parse
     * @return array  matching lines
     */
    protected function linesWithLabels($lines) {
        $result = array();
        foreach ($lines as $line) {
            if (preg_match('!^[^:]+:!', $line, $matches)) {
                $result[] = $line;
            }
        }
        return $result;
    }

}
