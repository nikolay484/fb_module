<?php
class Controllermodulefblike extends Controller {
    public function index() {
        $this->load->language('module/fb_like'); // loads the language file of helloworld
        
        $data['heading_title'] = $this->language->get('heading_title'); // set the heading_title of the module
         
        $data['facebook_page_url'] = html_entity_decode($this->config->get('fb_like_facebook_page_url'));
        $data['facebook_page_width'] = html_entity_decode($this->config->get('fb_like_facebook_page_width'));
        $data['facebook_page_height'] = html_entity_decode($this->config->get('fb_like_facebook_page_height'));
        $data['facebook_page_action'] = html_entity_decode($this->config->get('fb_like_facebook_page_action'));
         return $this->load->view($this->config->get('config_template') . '/template/module/fb_like.tpl', $data);
    
    }
}