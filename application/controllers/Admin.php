<?php

/**
 * Our homepage. Show the most recently added quote.
 *
 * controllers/Admin.php
 *
 * ------------------------------------------------------------------------
 */
class Admin extends Application {

    public function __construct()
    {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    public function index()
    {
        // get the quotes from the database
        $this->data['quotes'] = $this->quotes->all();

        // fill in template parameters
        $this->data['pagebody'] = 'adminpage';      // this is the view we want shown
        $this->data['title'] = 'Quotes Maintenance';

        $this->render();
    }

    /**
     * creates a new quote, adds it to the database, then presents the quote in
     *   a form to let the user edit its contents.
     */
    public function add()
    {
        $newQuote = $this->quotes->create();
        $this->present($newQuote);
    }

    /**
     * presents the passed quote on a form that can be used to edit existing or
     *   new quotes.
     *
     * @param  {Quote} $quote a {quote} record from the database.
     */
    public function present($quote)
    {
        $this->load->helper('formfields');

        // create the form inputs
        $this->data['fid']   = makeTextField('ID#','id',$quote->id);
        $this->data['fwho']  = makeTextField('Author','who',$quote->who);
        $this->data['fmug']  = makeTextField('Picture','mug',$quote->mug);
        $this->data['fwhat'] = makeTextArea('The Quote','what',$quote->what);

        // create submit button
        $this->data['fsubmit'] = makeSubmitButton('Process Quote','Click here to validate the quotation data','btn-success');

        // set template parameters
        $this->data['pagebody'] = 'quoteedit';
        $this->data['title']    = 'Quote #'.$quote->id;

        $this->render();
    }
}

/* End of file Admin.php */
/* Location: application/controllers/Admin.php */
