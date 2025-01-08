<?php
foreach($xml->children() as $mh) 
{
?>
<tr>
<td><?php echo $mh->maMonHoc ?></td>
<td><?php echo $mh->tenMonHoc ?></td>
<td><?php echo $mh->soTCLT ?></td>
<td><?php echo $mh->soTCTH ?></td>
<td>
    <form class="d-inline-block" action="index.php?controller=subject&action=updateSubjectForm" method="post">
        <button type="submit" class="btn btn-warning" name="updateID" value="<?php echo $mh->maMonHoc ?>"><i class="bi bi-pencil"></i>Sửa</button>
    </form>
    <form class="d-inline-block" action="index.php?controller=subject&action=delSubject" method="post">
        <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $mh->maMonHoc ?>"><i class="bi bi-trash"></i>Xóa</button>
    </form>
</td>
</tr>
<?php
}
?>