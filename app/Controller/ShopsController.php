<?php

class ShopsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');
	
	//カテゴリーモデルも使えるようになる！
    public $uses = array('Shop','Ramen','Category','Info','Category','Area');

    public $paginate = array(
            'Shop' => array(
                'limit' =>10,                        //1ページ表示できるデータ数の設定
                'order' => array('id' => 'asc'),  //データを降順に並べる
            )

        );

    public function beforeFilter(){
    	parent::beforeFilter();
        $this->layout = 'shoppage_layout';
    }

    public function index() {
    $this->layout = 'shoppage_layout';
    $shops = $this->Shop->find('all');
    $ramens = $this->Ramen->find('all');
    $categories = $this->Category->find('all');
    $infos = $this->Info->find('all');
    $areas = $this->Area->find('all');


    	$this->set(compact('shops','ramens','categories','infos','areas'));
        $this->set('Shop',$this->paginate());


 
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
        $this->layout = 'shoppage_layout';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $shop = $this->Shop->findById($id);
        if (!$shop) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('shop', $shop);

    $this->layout = 'shoppage_layout';
    $shops = $this->Shop->find('all',array('conditions' => array('id' => $id)));
    $ramens = $this->Ramen->find('all');
    $categories = $this->Category->find('all');
    $infos = $this->Info->find('all');
    $areas = $this->Area->find('all');


        $this->set(compact('shops','ramens','categories','infos','areas'));
        $this->set('Shop',$this->paginate());
   
    }


    public function add (){
    	// $this->layout = 'shoppage';

    	if ($this->request->is('post')) {
            $this->Shop->create();
            debug($this->request->data);

             if ($this->Shop->save($this->request->data)) {
             $this->Session->setFlash(__('Your post has been saved.'));


              //idでファイルを作成
            $last_id = $this->Shop->getLastInsertID();

            $new_file_name = 'P'.str_pad($last_id, 5, "0", STR_PAD_LEFT);

            if(is_uploaded_file($this->request->data['Shop']['upfile']['tmp_name'])){
                if(move_uploaded_file($this->request->data['Shop']['upfile']['tmp_name'], '/var/www/html/iloveramen/app/webroot/files/'.$new_file_name)){
                    echo 'アップロードしました！';
                }else{
                    echo 'ファイルをアップロードできません。';
                }
            }else{
                        echo 'ファイルが選択されていません。';
            }

            $this->Session->setFlash(__('Unable to add your post.'));
            }
        }
    }
    

    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $shop = $this->User->findById($id);
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
	        $this->request->data = $shop;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Shop->delete($id)){
	        $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'index'));
    	}
    }
    

    public function shoppage() {
        $this->layout = 'shoppage_layout';
        $infos = $this->Info->find('all');
        $categories = $this->Category->find('all');
        $areas = $this->Area->find('all');
        $ramens = $this->Ramen->find('all');
        $shops = $this->Shop->find('all');

        $this->set(compact('infos'));
        $this->set(compact('areas'));
        $this->set(compact('categories'));
        $this->set(compact('ramens'));
        $this->set(compact('shops'));
    }

     function list_shops() {
    // findAll() に類似したデータを1ページ分取得する
    $data = $this->paginate('Shop');
    $this->set('shop', $shop);
}


}

?>