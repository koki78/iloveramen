<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('User','Group');

    public function beforeFilter(){
    	parent::beforeFilter();
         $this->Auth->allow();

    	$this->layout = 'changePractice';
    }

    public function index() {
    	
    	$users = $this->User->find('all');
   		

//viewファイルでも関数の中身を使えるようにする
    	$this->set(compact('users','groups'));
 
    }
//opptions =>array
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $User = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('user', $user);
    }


    public function add (){
    	$this->layout = 'changePractice';
        $group=$this->Group->find('list');

    	if ($this->request->is('post')) {
            $this->User->create();
            debug($this->request->data);

             if ($this->User->save($this->request->data)) {
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

	    $post = $this->User->findById($id);
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
	        $this->request->data = $user;
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

     public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect.');
            }
        }
    }

    public function logout() {
        $this->Auth->logout();
    }

    public function beforeFilter() {
    parent::beforeFilter();
    // ユーザー自身による登録とログアウトを許可する
    $this->Auth->allow('add', 'logout');
}

    public function beforeFilter() {
    parent::beforeFilter();
    // ユーザー自身による登録とログアウトを許可する
    $this->Auth->allow('add', 'logout');
}

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }


}

?>