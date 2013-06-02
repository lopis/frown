<br/>
<?php foreach ($users as $user_item): ?>

    <h2><a href="view/<?php echo $user_item['id'] ?>"><?php echo $user_item['username'] ?></a></h2>
    <div id="main">
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