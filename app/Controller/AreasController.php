<?php

class AreasController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Area');

    public function beforeFilter(){
    	parent::beforeFilter();

    	$this->layout = 'changePractice';
    }

    public function index() {
    	
    $areas = $this->Area->find('all');
   		//Categoryモデルを使ってデータを取得する
    //$categories = $this->Category->find('all');

    	$this->set(compact('areas'));
 
    }

    // public function category_index($category_id = null) {
    //     $posts = $this->Post->find('all',array('conditions' => array('category_id' => $category_id)));

    //     //選択されたカテゴリーのデータを取得しておく
    //     $selected_category = $this->Category->find('all',array('condition' => array('id' =>$category_id)));

    // 	//Categoryモデルを使ってデータを取得する
    // 	$categories = $this->Category->find('all');

    // 	//$this->set(compact('ramens');

    //     $this->set('posts', $this->Post->find('all'));
    // }

        public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        // $Ramen = $this->Ramen->findById($id);
        // if (!$ramen {
        //     throw new NotFoundException(__('Invalid post'));
        // }
        // $this->set('ramen', $ramen);
    }
    public function add (){
    	$this->layout = 'changePractice';

    	if ($this->request->is('post')) {
            $this->Area->create();
            debug($this->request->data);

             if ($this->Area->save($this->request->data)) {
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

	    $area = $this->User->findById($id);
	    if (!$user) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('user', 'put'))) {
	        $this->User->id = $id;
	        if ($this->User->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $area;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->User->delete($id)) {
	        $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'index'));
    	}
    }
}

?>