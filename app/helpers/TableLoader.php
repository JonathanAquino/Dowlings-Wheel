<?php
/**
 * Reads the data.txt file into Table objects.
 */
class TableLoader {

    /** Title of the Nouns section. */
    const NOUNS = 'Nouns';

    /** Title of the Adjectives section. */
    const ADJECTIVES = 'Adjectives';

    /** Title of the Indicative Active Verbs section. */
    const VERBS_INDICATIVE_ACTIVE = 'Verbs, Indicative Active';

    /** Title of the Indicative Passive Verbs section. */
    const VERBS_INDICATIVE_PASSIVE = 'Verbs, Indicative Passive';

    /** Title of the Subjunctive Active Verbs section. */
    const VERBS_SUBJUNCTIVE_ACTIVE = 'Verbs, Subjunctive Active';

    /** Title of the Subjunctive Passive Verbs section. */
    const VERBS_SUBJUNCTIVE_PASSIVE = 'Verbs, Subjunctive Passive';

    /**
     * Reads the given file and creates Table objects.
     *
     * @param $filename string  the data file to load
     * @return array  Table objects, keyed by section names (e.g., NOUNS)
     */
    public function load($filename) {
        return $this->parse(file_get_contents($filename));
    }

    /**
     * Reads the given data and creates Table objects.
     *
     * @param $data string  the contents of the data file to load
     * @return array  Table objects, keyed by section names (e.g., NOUNS)
     */
    protected function parse($data) {
        $tables = array();
        foreach (explode('=== ', $data) as $section) {
            if (! $section) {
                continue;
            }
            if (! preg_match('!(?P<name>.*) ===(?P<text>.*)!s', $section, $matches)) {
                throw new Exception('Could not parse data (1916045563)');
            }
            $tables[$matches['name']] = new Table($matches['name'], trim($matches['text']));
        }
        return $tables;
    }

}
