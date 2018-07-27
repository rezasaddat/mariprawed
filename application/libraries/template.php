<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class template {
    var $template_data = array();

    function set($name, $value)
        {
            $this->template_data[$name] = $value;
        }

    function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
	{
            $this->CI =& get_instance();
            $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
            return $this->CI->load->view($template, $this->template_data, $return);
	}

    function convertrupiah($value){
        return "Rp. ".strrev(implode(',',str_split(strrev(strval($value)),3)));
    }
}
