<?php
  $xml = simplexml_load_file('./xml/ketquahoctap.xml') or die("lỗi");

  $phancong = $xml->phancong;
  $lastItem = $xml->phancong[count($xml->phancong) - 1];
?>

    <div class="content">
      <div class="notice_board">
        <div class="notice_title text-center">THÔNG BÁO</div>
        <div class="news_layout">
        <?php
        if($phancong->children() > 0)
        {
        ?>
          <div class="latest_news_thumbnail">
            <a class="latest_news_link text-center" href="index.php?controller=home&action=diemsinhvien&maphancong=<?php echo $phancong->maphancong ?>">
              <i class="bi bi-file-earmark-text-fill"></i>
              <div class="latest_news_title">Điểm môn <?php echo $lastItem->monhoc; ?> Lớp <?php echo $lastItem->lop ?> của giảng viên <?php echo $lastItem->giangvien ?> <?php echo $lastItem->namhoc.' '.$lastItem->hocky;?></div>
              <div class="posting_date"><?php echo $lastItem->time ?></div>
            </a>
          </div>
        <?php
        }
        ?>
          <div class="news_list">
            <?php
            if($phancong->children() > 0)
            {
              for($i = count($phancong) - 1; $i >= 0; $i--)
              {
                $pc = $phancong[$i];
            ?>
            <div class="news_list_link">
              <a href="index.php?controller=home&action=diemsinhvien&maphancong=<?php echo $pc->maphancong ?>"><i class="bi bi-file-earmark-text-fill"></i>Điểm môn <?php echo $pc->monhoc; ?> Lớp <?php echo $pc->lop ?> của giảng viên <?php echo $pc->giangvien ?> năm học <?php echo $pc->namhoc.' '.$pc->hocky;?></a>
              <div class="posting_date text-center"><?php echo $pc->time ?></div>
            </div>

            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>