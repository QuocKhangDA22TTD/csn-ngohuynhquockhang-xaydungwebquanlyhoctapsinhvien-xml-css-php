<?php
foreach($xml->children() as $gv) 
{
?>
<tr>
<td><?php echo $gv->magv ?></td>
<td><?php echo $gv->tengv ?></td>
<td><?php echo $gv->matkhau ?></td>
<td><?php echo $gv->gioitinh ?></td>
<td><?php echo $gv->namsinh ?></td>
<td><?php echo $gv->noisinh ?></td>
<td><?php echo $gv->sdt ?></td>
<td>
    <form class="d-inline-block" action="index.php?controller=giangvien&action=updateGiangVienForm" method="post">
        <button type="submit" class="btn btn-warning" name="updateID" value="<?php echo $gv->magv ?>"><i class="bi bi-pencil"></i>Sửa</button>
    </form>
    <form class="d-inline-block" action="index.php?controller=giangvien&action=delGiangVien" method="post">
        <button type="submit" class="btn btn-danger" name="delID" value="<?php echo $gv->magv ?>"><i class="bi bi-trash"></i>Xóa</button>
    </form>
</td>
</tr>
<?php
}
?>