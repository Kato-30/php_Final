<a href="themkhachhang.php">Them khach</a>
<h2>Danh sach khach hang</h2>
<table>
    <tr>
        <td>Ma khach</td>
        <td>Ten khach</td>
        <td>Tuoi</td>
        <td>Chuc nang</td>
    </tr>
    <?php
    include("khachhang.php");

    // $kh = new KhachHang('kh09', 'Ănfwa', 20);
    $action = isset($_GET["action"]) ? $_GET["action"] : "0";
    //Xóa khách hàng nếu có yêu cầu
    if ($action == "2") {
        $makhach = isset($_GET["makhach"]) ? $_GET["makhach"] : "";
        if ($makhach != "") {
            $success = HoSo::Delete($makhach);
            if ($success) {
                echo "<script> alert('Delete success!');</script>";
            } else {
                echo "<script> alert('Delete failed!');</script>";
            }
        }
    }
    //Lấy danh sách khách hàng
    $ds = HoSo::GetAll();
    foreach ($ds as $item) {
        ?>
        <tr>
            <td>
                <?php echo $item->makhach ?>
            </td>
            <td>
                <?php echo $item->tenkhach ?>
            </td>
            <td>
                <?php echo $item->tuoi ?>
            </td>
            <td>
                <a href="dskhachhang.php?action=1&makhach=<?php echo $item->makhach ?>">Edit</a>
                <span> | </span>
                <a onclick="return confirm('Do you want to delete this customer?');"
                    href="dskhachhang.php?action=2&makhach=<?php echo $item->makhach ?>">Delete</a>
            </td>
        </tr>
        <?php
    }

    echo "Đá";
    ?>
</table>