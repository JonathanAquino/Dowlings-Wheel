<?php
/**
 * Dispatches requests pertaining to help documentation.
 */
class HelpController {

    /**
     * Displays the specified help document
     *
     * Expected GET variables:
     *     - id - the ID of the document to display
     */
    public function action_show() {
        switch ($_GET['id']) {
            case 'goodies':
                $this->page = 'goodies';
                require_once './app/views/help/goodies.php';
                break;
            case 'about':
                $this->page = 'about';
                require_once './app/views/help/about.php';
                break;
            case 'contact':
                $this->page = 'contact';
                require_once './app/views/help/contact.php';
                break;
        }
    }

}
