<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<br/>
<?php foreach ($types as $user_item): ?>

    <h2><a href="view/<?php echo $user_item['id'] ?>"><?php echo $user_item['name'] ?></a></h2>
    <!--<div id="main">-->
        <!--<?php echo $user_item['layer'] ?>-->
        <!--<?php echo $user_item['color'] ?>-->
        <!--<?php echo $user_item['svg'] ?>-->
        <!--<?php echo $user_item['type'] ?>-->
    <!--</div>-->
    <a href="update/<?php echo $user_item['id'] ?>">edit</a> |

    <a href="delete/<?php echo $user_item['id'] ?>"> delete</a>

<?php endforeach ?>
<p/>
<br/>

<p><a href="create">Create</a></p>