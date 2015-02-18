<?php

/**
 * Our homepage. Show the most recently added quote.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct()
    {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->data['pagebody'] = 'homepage';    // this is the view we want shown

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
