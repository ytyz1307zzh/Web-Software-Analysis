<?php

class Controller {
    var $model;
    var $view;
    public function __construct($model, $view) 
    {
        $this->model = $model;
        $this->view = $view;
    }
    public function thankyou() 
    {
        $message = $this->view->thankyou();
        print "<h3>" . $message . "</h3>";
    }
    public function insert($request) 
    {
        $this->model->insert($request);
    }
    public function display_result() 
    {
        $results = $this->model->list_result();
        $this->view->display_result($results);
    }
    public function delete($request) 
    {
        $this->model->delete($request);
        $this->view->display_delete($request);
    }
}

?>