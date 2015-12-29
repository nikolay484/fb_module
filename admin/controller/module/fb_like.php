<?php
class Controllermodulefblike extends Controller {
    private $error = array(); // This is used to set the errors, if any.
 
    public function index() {
        // Loading the language file of helloworld
        $this->load->language('module/fb_like'); 
     
        // Set the title of the page to the heading title in the Language file i.e., Hello World
        $this->document->setTitle($this->language->get('heading_title'));
     
        // Load the Setting Model  (All of the OpenCart Module & General Settings are saved using this Model )
        $this->load->model('setting/setting');
     
        // Start If: Validates and check if data is coming by save (POST) method
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            // Parse all the coming data to Setting Model to save it in database.
            $this->model_setting_setting->editSetting('fb_like', $this->request->post);
     
            // To display the success text on data save
            $this->session->data['success'] = $this->language->get('text_success');
     
            // Redirect to the Module Listing
            $this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
        }
     
        // Assign the language data for parsing it to view
        $data['heading_title'] = $this->language->get('heading_title');
     
        $data['text_edit']    = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_content_top'] = $this->language->get('text_content_top');
        $data['text_content_bottom'] = $this->language->get('text_content_bottom');      
        $data['text_column_left'] = $this->language->get('text_column_left');
        $data['text_column_right'] = $this->language->get('text_column_right');
        $data['text_hover'] = $this->language->get('text_hover');
        $data['text_click'] = $this->language->get('text_click');
     
        $data['entry_fb_url'] = $this->language->get('entry_fb_url');
        $data['entry_fb_width'] = $this->language->get('entry_fb_width');
        $data['entry_fb_height'] = $this->language->get('entry_fb_height');
        $data['entry_layout'] = $this->language->get('entry_layout');
        $data['entry_position'] = $this->language->get('entry_position');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_action'] = $this->language->get('entry_action');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
     
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_add_module'] = $this->language->get('button_add_module');
        $data['button_remove'] = $this->language->get('button_remove');
         
        // This Block returns the warning if any
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
     
        // This Block returns the error code if any
        if (isset($this->error['url'])) {
            $data['error_fb_url'] = $this->error['url'];
        } else {
            $data['error_fb_url'] = '';
        }  
         if (isset($this->error['width'])) {
            $data['error_fb_width'] = $this->error['width'];
        } else {
            $data['error_fb_width'] = '';
        }   
         if (isset($this->error['height'])) {
            $data['error_fb_height'] = $this->error['height'];
        } else {
            $data['error_fb_height'] = '';
        }   
     
        // Making of Breadcrumbs to be displayed on site
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('module/fb_like', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
          
        $data['action'] = $this->url->link('module/fb_like', 'token=' . $this->session->data['token'], 'SSL'); // URL to be directed when the save button is pressed
     
        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'); // URL to be redirected when cancel button is pressed
              
        // This block checks, if the hello world text field is set it parses it to view otherwise get the default 
        // hello world text field from the database and parse it
        if (isset($this->request->post['fb_like_facebook_page_url'])) {
            $data['fb_like_facebook_page_url'] = $this->request->post['fb_like_facebook_page_url'];
        } else {
            $data['fb_like_facebook_page_url'] = $this->config->get('fb_like_facebook_page_url');
        }   
        if (isset($this->request->post['fb_like_facebook_page_width'])) {
            $data['fb_like_facebook_page_width'] = $this->request->post['fb_like_facebook_page_width'];
        } else {
            $data['fb_like_facebook_page_width'] = $this->config->get('fb_like_facebook_page_width');
        }
        if (isset($this->request->post['fb_like_facebook_page_height'])) {
            $data['fb_like_facebook_page_height'] = $this->request->post['fb_like_facebook_page_height'];
        } else {
            $data['fb_like_facebook_page_height'] = $this->config->get('fb_like_facebook_page_height');
        }
        if (isset($this->request->post['fb_like_facebook_page_action'])) {
            $data['fb_like_facebook_page_action'] = $this->request->post['fb_like_facebook_page_action'];
        } else {
            $data['fb_like_facebook_page_action'] = $this->config->get('fb_like_facebook_page_action');
        }
          
        // This block parses the status (enabled / disabled)
        if (isset($this->request->post['fb_like_facebook_page_url_status'])) {
            $data['fb_like_facebook_page_url_status'] = $this->request->post['fb_like_facebook_page_url_status'];
        } else {
            $data['fb_like_facebook_page_url_status'] = $this->config->get('fb_like_facebook_page_url_status');
            
        }
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('module/fb_like.tpl', $data));

    }

    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
 
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'module/fb_like')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
 
        // Block to check if the helloworld_text_field is properly set to save into database,
        // otherwise the error is returned
        if (!$this->request->post['fb_like_facebook_page_url']) {
            $this->error['url'] = $this->language->get('error_fb_url');
        }
        if (!$this->request->post['fb_like_facebook_page_width']) {
            $this->error['width'] = $this->language->get('error_fb_width');
        }
        if (!$this->request->post['fb_like_facebook_page_height']) {
            $this->error['height'] = $this->language->get('error_fb_height');
        }
        /* End Block*/
 
        // Block returns true if no error is found, else false if any error detected
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}
