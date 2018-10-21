<?php
	class Posts extends CI_Controller{
		public function index(){

			$data['title'] = 'Posts';
            
            $data['posts']= $this->postModel->getPosts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
        }
        public function view($slug = NULL){
            $data['post']= $this->postModel->getPosts($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['title']=$data['post']['title'];
            $this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
        }
        public function create(){
            $data['title']= 'Editor'; 
            $data['categories']=$this->postModel->getCategories();
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('text','Text','required');
    
            if($this->form_validation->run()===False){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');    
            }
            else{
                $this->postModel->createPost();
                redirect('posts');
            }
        }
        public function delete($id){
            $this->postModel->deletePost($id);
            redirect('posts');
        }
        public function edit($slug){
            $data['post']= $this->postModel->getPosts($slug);
            $data['categories']=$this->postModel->getCategories();
            if(empty($data['post'])){
                show_404();
            }
            
            $data['title']='Editor';
            
            $this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
        }
        public function update(){
            $this->postModel->updatePost();
            redirect('posts');
      }
	}