<?php
class CategoriesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    	$categories = $this->Category->find('all');

    	$this->set(compact('categories'));

        //$this->set('posts', $this->Post->find('all'));
    }
        public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->set('category', $category);
    }

}
?>