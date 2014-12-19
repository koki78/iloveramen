<div style = "float:bottom;">
<table>  

    <?php foreach ($infos as $info): 
        //debug($post);
    ?>

    <!-- <tr>
        <td>
            <?php

            //以下の文章は何をやっているのか？issetは関数があるかないかを確かめる関数

            // if (isset($selected_info)){

            // if ($selected_info[0]['Info']['id']==$info['Info']['id']){
                // echo $info['Info']['name'];
            // }else{
             // echo $this->Html->link($info['Info']['name'],
// array('controller' => 'infos', 'action' => 'info_index',$info['Info']['id'])); 
                  }

            // }else{
            // echo $this->Html->link($info['Info']['name'],
// array('controller' => 'infos', 'action' => 'info_index',$info['Info']['id'])); 

            }

?>
        </td>
    </tr> -->
        <?php endforeach; ?>
    <?php unset($info); ?>
</table>