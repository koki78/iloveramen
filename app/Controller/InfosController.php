<?php
class InfosController extends AppController {

    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Info');

    public function beforeFilter(){
    	parent::beforeFilter();
         $this->Auth->allow();

    	$this->layout = 'changePractice';
    }

    public function index() {
    	
    	$infos = $this->Info->find('all');
   		

//viewファイルでも関数の中身を使えるようにする
    	$this->set(compact('infos'));
 
    }
//opptions =>array
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $Info = $this->User->findById($id);
        if (!$info) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('info', $info);
    }


     public function add (){
        $this->layout = 'changePractice';

        if ($this->request->is('post')) {
            $this->Info->create();
            debug($this->request->data);

             if ($this->Info->save($this->request->data)) {
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

	    $info = $this->User->findById($id);
	    if (!$info) {
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
	        $this->request->data = $info;
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

    //  public function login() {
    //     if ($this->request->is('post')) {
    //         if ($this->Auth->login()) {
    //             $this->redirect($this->Auth->redirect());
    //         } else {
    //             $this->Session->setFlash('Your username or password was incorrect.');
    //         }
    //     }
    // }

    // public function logout() {
    //     $this->Auth->logout();
    // }
}

?>