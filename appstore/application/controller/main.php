<?php
class Main extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index () {
        $this->render('main/index');
    }
    
    public function testLink () {
        $this->render('main/testlink');
    }
    
    public function testParams ( $parameters = array() ) {
        if ( isset($parameters[0]) ) {
            $this->msg = $parameters[0];
        } else {
            $this->msg = 'There is no message';
        }
        
        $this->render('main/testparams');
    }
}
