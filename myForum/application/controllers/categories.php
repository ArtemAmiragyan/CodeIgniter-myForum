<?php
    class Categories extends CI_Controller{
        public function index($page = 'categories'){
            $data['title']= 'Categories';
            $data['categories'] = $this->postModel->getCategories();
           
            $this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
        }
        public function posts($id){
            $data['title']= $this->postModel->getCategories($id)->name;
        
            $data['posts']= $this->postModel->getPostsByCategory($id);
            
            $this->load->view('templates/header');
			$this->load->view('posts/index');
			$this->load->view('templates/footer');
        }
    }