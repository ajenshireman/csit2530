<?php
class Main extends Controller {
    public function index () {
        require './application/view/_template/head.php';
        require './application/view/main/index.php';
        require './application/view/_template/foot.php';
    }
    
    public function testLink () {
        require './application/view/_template/head.php';
        require './application/view/main/testlink.php';
        require './application/view/_template/foot.php';
    }
    
    public function testParams ( $parameters = array() ) {
        if ( isset($parameters[0]) ) {
            $msg = $parameters[0];
        } else {
            $msg = 'There is no message';
        }
        
        require './application/view/_template/head.php';
        require './application/view/main/testparams.php';
        require './application/view/_template/foot.php';
    }
}
