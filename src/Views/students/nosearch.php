<?php

foreach($xml->children() as $sv) 
{
?>
<tr>
    <td><?php echo $sv->masv ?></td>
    <td><?php echo $sv->tensv ?></td>
    <td><?php echo $sv->matkhau ?></td>
    <td><?php echo $sv->gioitinh ?></td>
    <td><?php echo $sv->namsinh ?></td>
    <td><?php echo $sv->noisinh ?></td>
    <td><?php echo $sv->nganh ?></td>
    <td>
        <form class="d-inline-block" action="index.php?controller=student&action=updateStudentForm" method="post">
            <button type="submit" class="btn btn-warning" name="updateID" value="<?php echo $sv->masv ?>"><i class="bi bi-pencil"></i>Sửa</button>
        </form>
        <form class="d-inline-block" action="index.php?controller=student&action=delStudent" method="post">
            <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $sv->masv ?>"><i class="bi bi-trash"></i>Xóa</button>
        </form>
    </td>
</tr>
<?php
}
?>