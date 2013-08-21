<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller{
	function index(){
		$this->styles = array('main.css','style.css');
		$this->custom_css = 'h1{color:red;}';
		$this->scripts = array('jquery.js','script.js');
		$this->title = 'Главная страница';
		$this->description = 'Страница собрана функцией _render()';
		$this->_render('content');
	}
}