<?php
$sql = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
$comments = getDataFromDatabase($connection, $sql);

if (isset($_GET['post_id'])) {
    $sqlAuthorID = "SELECT author_id FROM comments";
    $getAuthorID = getDataFromSinglePost($connection, $sqlAuthorID);
}
?>
<div>
    <h4>Comments:</h4><br>
    <ul class="comments-list">
        <?php foreach ($comments as  $comment) { ?>
            <?php
                $sqlCommentAuthor = "SELECT firstname, lastname, gender FROM author WHERE id = '{$comment['author_id']}'";
                $commentAuthor = getDataFromSinglePost($connection, $sqlCommentAuthor);
            ?>
            <li>
                <h5><?php echo ($commentAuthor['firstname']) . ' ' . ($commentAuthor['lastname']) ?></h5>
                <p><?php echo $comment['text'] ?></p>
            </li>
            <hr />
        <?php } ?>
    </ul>
    
</div>