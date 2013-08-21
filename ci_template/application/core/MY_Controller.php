<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
	protected $styles = FALSE;
	protected $custom_css = FALSE;
    protected $scripts = FALSE;
	protected $custom_js = FALSE;
    protected $title = FALSE;
    protected $description = FALSE;
    protected $keywords = FALSE;
    
    function _render($view,$data = array()){
			$this->load->helper('url');
			$template['scripts'] = '';
            if($this->scripts != FALSE){
                
                foreach($this->scripts as $value){
                    $template['scripts'] .= '<script src="' . base_url('js/' . $value) . '"></script>' . PHP_EOL;
                }
            }
			$template['styles'] = '';
			if($this->styles != FALSE){
                
                foreach($this->styles as $value){
                    $template['styles'] .= '<link rel="stylesheet" href="' . base_url('css/' . $value) . '">' . PHP_EOL;
                }
            }
			$template['custom_css'] = $this->custom_css;
			$template['custom_js'] = $this->custom_js;
            $template['title'] = $this->title;
            $template['description'] = $this->description;
            $template['keywords'] = $this->keywords;
            $template['header'] = $this->load->view('header','',TRUE);
            $template['content'] = $this->load->view($view,$data,TRUE);
            $template['footer'] = $this->load->view('footer','',TRUE);
            $this->load->view('template',$template);   
    }
}