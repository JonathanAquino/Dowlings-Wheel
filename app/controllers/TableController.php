<?php
/**
 * Dispatches requests pertaining to a table of Latin declensions or conjugations.
 */
class TableController {

    /**
     * Lists the available tables.
     */
    public function action_list() {
        $this->page = 'home';
        require_once './app/views/table/list.php';
    }

    /**
     * Displays a form for entering a table of declensions or conjugations.
     *
     * Expected GET variables:
     *     - table - name of the table to load
     *     - demo - whether to display demo data
     */
    public function action_new() {
        $this->demoing = isset($_GET['demo']);
        if ($this->demoing) {
            $this->page = 'demo';
            $this->table = $this->loadTable(TableLoader::NOUNS);
            $this->text = file_get_contents('./db/demo.txt');
        } else {
            $this->table = $this->loadTable($_GET['table']);
            $this->text = $this->table->getTextWithoutValues();
            $this->answers = $this->table->getText();
        }
        require_once './app/views/table/new.php';
    }

    /**
     * Processes the form and shows which values are correct and which are incorrect.
     *
     * Expected GET variables:
     *     - table - name of the table to load
     *
     * Expected POST variables:
     *     - text - the submitted table data
     */
    public function action_create() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->action_new();
            return;
        }
        $this->table = $this->loadTable($_GET['table']);
        $differ = new Differ();
        $this->diff = $differ->diff($this->table->getText(), $_POST['text']);
        require_once './app/views/table/create.php';
    }

    /**
     * Displays the specified table (the "answers").
     *
     * Expected GET variables:
     *     - table - name of the table to load
     */
    public function action_show() {
        $this->table = $this->loadTable($_GET['table']);
        require_once './app/views/table/show.php';
    }

    /**
     * Returns the Table with the given name.
     *
     * @param $name string  the title of the table to retrieve
     * @return Table  the Table object
     */
    private function loadTable($name) {
        $tableLoader = new TableLoader();
        if (isset($_COOKIE['strict_mode'])) {
            $tables = $tableLoader->load('./db/data-strict.txt');
        } else {
            $tables = $tableLoader->load('./db/data.txt');
        }
        if (! isset($tables[$name])) {
            throw new Exception('Unknown table: ' . $name . ' (1267601568)');
        }
        return $tables[$name];
    }

}
