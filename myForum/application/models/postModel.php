<?php
    class PostModel extends CI_Model{
        public function __construct()
        {
            $this->load->database();

        }
        public function getPosts($slug = FALSE)
        {
            if($slug === FALSE)
            {             
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories', 'categories.id = posts.categoryId');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query= $this->db->get_where('posts', array ('slug' => $slug));
            return $query->row_array();
        }
        public function createPost(){
            $slug = url_title($this->input->post('title'));

            $data= array(
                'title' => $this->input->post ('title'),
                'slug' => $slug,
                'text' => $this->input->post('text'),
                'categoryId' => $this->input->post('categoryId')
            );
            return $this->db->insert('posts',$data);
        }
        public function deletePost($id){
            $this->db->where('id',$id);
            $this->db->delete('posts');
            return true;
        }
        public function updatePost(){
            $slug = url_title($this->input->post('title'));
            
            $data= array(
                'title' => $this->input->post ('title'),
                'slug' => $slug,
                'text' => $this->input->post('text'),
                'categoryId' => $this->input->post('categoryId')
            );
           $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts',$data);
        }
        public function getCategories(){
            $this->db->order_by('name');
            $query=$this->db->get('categories');
            return $query->result_array();
        }
        public function getCategory($Id){
            $query =$this->db->get_Where('categories',array('id'=>$id));
            return $query->row();
        }
        public function getPostsByCategory($categoryId){
            $this->db->order_by('posts.id','DESC');
            $this->db->join('categories', 'categories.id = posts.categoryId');
                $query = $this->db->get_Where('posts', array('categoryId' => $categoryId));
                return $query->result_array();
        }
    }