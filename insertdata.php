<?php
include("hoso.php");

$arrIndexDiem = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="modal-open" style="overflow: hidden; padding-right: 0px;">

    <div class=" container row">
        <form action="insertdata.php" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ma Nganh</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="txtMaNganh">
            </div>
            <button name="btnSearch" type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <?php


    ?>
    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">manganh</th>
                    <th scope="col">matohop</th>
                    <th scope="col">diem</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $action = isset($_GET["action"]) ? $_GET["action"] : "0";
                if ($action == 1) {
                    $manganh = isset($_GET["manganh"]) ? $_GET["manganh"] : "";
                    $matohop = isset($_GET["matohop"]) ? $_GET["matohop"] : "";
                    if ($manganh != "" && $matohop != "") {
                        DiemNganhHoc::Delete($manganh, $matohop);
                        $ds = DiemNganhHoc::GetAll($manganh);

                        indanhsach($ds);
                    }
                } elseif ($action == 2) {
                    $manganh = isset($_GET["manganh"]) ? $_GET["manganh"] : "";
                    $matohop = isset($_GET["matohop"]) ? $_GET["matohop"] : "";
                    $ds = DiemNganhHoc::GetAll($manganh);

                    indanhsach($ds);
                    ?>
                    <div class="modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: block;" aria-modal="true"
                        role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="insertdata.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa điểm</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            onclick="closemodal()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            name="txtUpdateDiem">
                                    </div>
                                    <div class="modal-footer">
                                        <button name="btnSaveChanges" type="submit" class="btn btn-primary">
                                            Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                if (isset($_POST['btnSearch'])) {
                    if ($_POST['txtMaNganh'] != "") {
                        $ds = DiemNganhHoc::GetAll($_POST['txtMaNganh']);
                        indanhsach($ds);
                    }
                }

                if (isset($_POST['btnSaveChanges'])) {
                    if ($_POST['txtUpdateDiem'] != "") {
                        DiemNganhHoc::Update($_POST['txtUpdateDiem'], $manganh, $matohop);

                        $ds = DiemNganhHoc::GetAll($manganh);
                        indanhsach($ds);

                    }
                }
                function indanhsach($ds)
                {
                    $i = 0;
                    foreach ($ds as $item) {
                        $arrIndexDiem[$i] = $item->matohop;
                        ?>
                        <tr>
                            <td>
                                <?php echo $item->manganh ?>
                            </td>
                            <td>
                                <?php echo $item->matohop ?>
                            </td>
                            <td>
                                <?php echo $item->diem ?>
                            </td>
                            <td>
                                <button name="<?php echo $item->matohop ?>" type="button" class="btn btn-danger">
                                    <a style="color: #fff; text-decoration: none;"
                                        href="insertdata.php?action=2&manganh=<?php echo $item->manganh ?> &matohop=<?php echo $item->matohop ?>">Edit</a>
                                </button>
                                <span> | </span>
                                <button type="button" class="btn btn-danger">
                                    <a style="color: #fff; text-decoration: none;"
                                        href="insertdata.php?action=1&manganh=<?php echo $item->manganh ?> &matohop=<?php echo $item->matohop ?>">Delete</a>
                                </button>

                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>


            </tbody>
        </table>
    </form>
</body>

</html>