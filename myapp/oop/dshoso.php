<a href="">Them khach</a>
<h2>Danh sach khach hang</h2>
<table>
    <tr>
        <td>Ma khach</td>
        <td>Ten khach</td>
        <td>Tuoi</td>
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
                <?php echo $item->mahoso ?>
            </td>
            <td>
                <?php echo $item->hodem ?>
            </td>
            <td>
                <?php echo $item->ten ?>
            </td>
            <td>
                <a href="dskhachhang.php?action=1&mahoso=<?php echo $item->mahoso ?>">Edit</a>
                <span> | </span>
                <a onclick="return confirm('Do you want to delete this customer?');"
                    href="dskhachhang.php?action=2&mahoso=<?php echo $item->mahoso ?>">Delete</a>
            </td>
        </tr>
    <?php
    }

    ?>
</table>