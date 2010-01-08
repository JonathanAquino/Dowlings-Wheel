<?php
/**
 * A table of Latin declensions or conjugations.
 */
class Table {

    /** The table title */
    private $name;

    /** The contents of the table. */
    private $text;

    /**
     * Creates the table.
     *
     * @param $name string  the table title
     * @param $text string  the contents of the table
     */
    public function __construct($name, $text) {
        $this->name = $name;
        $this->text = $text;
    }

    /**
     * Returns the table title.
     *
     * @return string  a human-readable description
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Returns the contents of the table.
     *
     * @return string  the table text, with fields populated.
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Returns the contents of the table, minus the values.
     *
     * @return string  the subsection titles and field names
     */
    public function getTextWithoutValues() {
        return preg_replace('!:.*!', ': ', $this->getText());
    }

}
