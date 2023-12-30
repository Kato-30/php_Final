<a href="">Them khach</a>
<h2>Danh sach khach hang</h2>
<table>
    <tr>
        <td>Ma khach</td>
        <td>Ho dem</td>
        <td>Ten</td>
        <td>Chuc nang</td>
    </tr>
    <?php
    include("hoso.php");

    // $kh = new KhachHang('kh09', 'Ănfwa', 20);
    $action = isset($_GET["action"]) ? $_GET["action"] : "0";
    //Xóa khách hàng nếu có yêu cầu
    if ($action == "2") {
        $mahoso = isset($_GET["mahoso"]) ? $_GET["mahoso"] : "";
        if ($mahoso != "") {
            $success = HoSo::Delete($mahoso);
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
                <?php echo $item->ma ?>
            </td>
            <td>
                <?php echo $item->hodem ?>
            </td>
            <td>
                <?php echo $item->ten ?>
            </td>
            <td>
                <a href="dshoso.php?action=1&mahoso=<?php echo $item->ma ?>">Edit</a>
                <span> | </span>
                <a onclick="return confirm('Do you want to delete this customer?');"
                    href="dshoso.php?action=2&mahoso=<?php echo $item->ma ?>">Delete</a>
            </td>
        </tr>
        <?php
    }

    ?>
</table>