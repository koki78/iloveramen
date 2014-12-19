<?php

class RamensController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Ramen','Category','Info','Category','Area','Shop');

    public function beforeFilter(){
    	parent::beforeFilter();
        $this->set(compact('ramens','categories','infos','ramens','areas','shops'));
    	
    }

    public function index() {
    	
        $ramens = $this->Ramen->find('all');
   		//Categoryモデルを使ってデータを取得する
        $categories = $this->Category->find('all');
        $infos = $this->Info->find('all');
        $areas = $this->Area->find('all');

        $this->set(compact('ramens','categories','infos','ramens','areas','shops'));
 
    }

        public function view($id = null) {
            $this->layout = 'shoppage_layout';
            if (!$id) {
                throw new NotFoundException(__('Invalid postA'));
            }

            $ramen = $this->Ramen->findById($id);
            if (!$ramen) {
                throw new NotFoundException(__('Invalid postB'));
            }

            $this->layout = 'shoppage_layout';
            $shops = $this->Shop->find('all',array('conditions' => array('id' => $id)));
            $shops = $this->Shop->find('all');
            $ramens = $this->Ramen->find('all');
            $categories = $this->Category->find('all');
            $infos = $this->Info->find('all');
            $areas = $this->Area->find('all');

            // $this->set('shop', $shop);
            $this->set(compact('shops','ramens','categories','infos','areas'));
            $this->set('Shop',$this->paginate());

        }

    public function add (){
    	    $categories = $this->Category->find('list');
            $this->set(compact('categories'));
            $areas = $this->Area->find('list');
            $this->set(compact('areas'));
            $shops = $this->Shop->find('list');
            $this->set(compact('shops'));


    	if ($this->request->is('post')) {
            $this->Ramen->create();
            debug($this->request->data);

            if ($this->Ramen->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));

              //idでファイルを作成
                $last_id = $this->Ramen->getLastInsertID();

                $new_file_name = 'P'.str_pad($last_id, 5, "0", STR_PAD_LEFT);

                if(is_uploaded_file($this->request->data['Ramen']['upfile']['tmp_name'])){
                    if(move_uploaded_file($this->request->data['Ramen']['upfile']['tmp_name'], '/var/www/html/iloveramen/app/webroot/files/'.$new_file_name)){
                        echo 'アップロードしました！';
                    }else{
                        echo 'ファイルをアップロードできません。';
                    }
                }else{
                        echo 'ファイルが選択されていません。';
                }
            }

             $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

           
    

    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $ramen = $this->User->findById($id);
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
	        $this->request->data = $ramen;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Ramen->delete($id)) {
	        $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'index'));
    	}
    }

    public function toppage() {
        $this->layout = 'toppage_layout';
        $infos = $this->Info->find('all');
        $categories = $this->Category->find('all');
        $areas = $this->Area->find('all');
        $ramens = $this->Ramen->find('all');

        $this->set(compact('infos'));
        $this->set(compact('areas'));
        $this->set(compact('categories'));
        $this->set(compact('ramens'));
    }
}

?>