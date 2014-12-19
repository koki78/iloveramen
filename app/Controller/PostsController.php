<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Post','Category');

    public function beforeFilter(){
    	parent::beforeFilter();

    	$this->layout = 'changePractice';
    }

    public function index() {
    	
    	$posts = $this->Post->find('all');
   		//Categoryモデルを使ってデータを取得する
    	$categories = $this->Category->find('all');

    	$this->set(compact('posts','categories'));
 

    }

    public function category_index($category_id = null) {
        $posts = $this->Post->find('all',array('conditions' => array('category_id' => $category_id)));

        //選択されたカテゴリーのデータを取得しておく
        $selected_category = $this->Category->find('all',array('condition' => array('id' =>$category_id)));

    	//Categoryモデルを使ってデータを取得する
    	$categories = $this->Category->find('all');

    	$this->set(compact('posts','categories','selected_category'));

        //$this->set('posts', $this->Post->find('all'));
    }

        public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    public function add (){
    	$this->layout = 'changePractice';

    	if ($this->request->is('post')) {
            $this->Post->create();
            debug($this->request->data);

             if ($this->Post->save($this->request->data)) {
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

	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
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