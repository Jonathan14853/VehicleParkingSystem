<?php
include('library.php');
$data=  getStreet();
$title="street";
include'manage_head.php';
  ?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <?php
            foreach ($data[0] as $key => $value) {
                ?><th><?= $key; ?></th><?php
                }
                ?>
            <th>Action</th>
        </tr>
    </thead>
    <?php
    $cnt = 1;
    foreach ($data as $row) {
        
    } {
        ?>
        <tr>
            <td><?= $cnt; ?></td>
            <?php
            foreach ($row as $value) {
                ?><td><?= $value; ?></td><?php
            }
            ?>
            <td ><a href="view-<?=$title;?>-detail.php?upid=<?=$row[$title.'_id']; ?>">Update</a>
        </tr>
        <?php
        $cnt = $cnt + 1;
    }
    ?>
</table>
<?php
include 'manage_bottom.php';
?>