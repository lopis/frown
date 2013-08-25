<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->


<?php foreach ($users as $user_item): ?>
    <div id="main">
    <h3><a href="view/<?php echo $user_item['id'] ?>"><?php echo $user_item['username'] ?></a></h3>
        <p><?php echo "Email: ".$user_item['email']; ?></p>
        <p><?php 
        if($user_item['admin']==1)
       	 echo "Status: Admin";
		else
		 echo "Status: User";?></p>
    </div>
    
    <?php 
		$session_data = $this->session->userdata('logged_in');
    	if($session_data['admin']==1){ ?>
    <a href="update/<?php echo $user_item['id'] ?>">edit</a> |

    <a href="delete/<?php echo $user_item['id'] ?>">delete</a>

    <?php } ?>

<?php endforeach ?>

<!--<p><a href="create">create</a></p>-->