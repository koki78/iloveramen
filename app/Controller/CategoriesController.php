<?php
class CategoriesController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');

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

    public function add (){
        $this->layout = 'changePractice';

        if ($this->request->is('category')) {
            $this->Category->create();
            debug($this->request->data);

             if ($this->Category->save($this->request->data)) {
             $this->Session->setFlash(__('Your post has been saved.'));
                // return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $category = $this->User->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('category', 'put'))) {
            $this->Category->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

        public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
    }
}

}
?>