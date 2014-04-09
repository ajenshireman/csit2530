<?php
class Main extends Controller {
    public function index () {
        require './application/view/_template/head.php';
        require './application/view/main/index.php';
        require './application/view/_template/foot.php';
    }
}