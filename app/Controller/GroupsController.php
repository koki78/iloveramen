<?php

class GroupsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Group');

    public function beforeFilter(){
    	parent::beforeFilter();
          $this->Auth->allow();

    	$this->layout = 'changePractice';
    }

    public function index() {
    	
    	$groups = $this->Group->find('all');
   		//Categoryモデルを使ってデータを取得する
    	$categories = $this->Category->find('all');

    	$this->set(compact('groups'));
 

    }

    public function category_index($category_id = null) {
        $groups = $this->Group->find('all',array('conditions' => array('category_id' => $category_id)));

        //選択されたカテゴリーのデータを取得しておく
        $selected_category = $this->Group->find('all',array('condition' => array('id' =>$category_id)));

    	//Categoryモデルを使ってデータを取得する
    	$groups = $this->Group->find('all');

    	//$this->set(compact('posts','categories','selected_category'));

        //$this->set('posts', $this->Post->find('all'));
    }

        public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $Group = $this->Group->findById($id);
        if (!$group) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('group', $group);
    }
    public function add (){
    	//$this->layout = 'changePractice';

    	if ($this->request->is('post')) {
            $this->Group->create();
            debug($this->request->data);

             if ($this->Group->save($this->request->data)) {
             $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $group = $this->Group->findById($id);
	    if (!$group) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('group', 'put'))) {
	        $this->Group->id = $id;
	        if ($this->Group->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $group;
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
