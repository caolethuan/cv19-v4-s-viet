<?php
include('../conn.php');
?>
<style>
    .red {
        background-image: linear-gradient(to left, rgba(255, 0, 0, 0.4), rgba(255, 0, 0, 1));
        border: none;
    }

    .blue {
        background-image: linear-gradient(to left, rgba(15, 144, 242, 0.4), rgba(15, 144, 242, 1));
        border: none;
    }

    .pink {
        background-image: linear-gradient(to left, rgba(255, 22, 84, 0.4), rgba(255, 22, 84, 1));
        border: none;
    }

    .orange {
        background-image: linear-gradient(to left, rgba(255, 88, 1, 0.4), rgba(255, 88, 1, 1));
        border: none;
    }

    .green {
        background-image: linear-gradient(to left, rgba(0, 128, 0, 0.4), rgba(0, 128, 0, 1));
        border: none;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-footer a {
        text-decoration: none;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thống Kê</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Đơn hàng</li>
        </ol>
        <!-- <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="blue card text-white mb-4">
                    <?php
                    // $sql_sl = "SELECT * FROM `order-info` WHERE `status` = 1";
                    // $count_rsl = mysqli_query($connect, $sql_sl);
                    // $count = mysqli_num_rows($count_rsl);
                    ?>
                    <div class="card-body flex">Đang xử lý</div> <span style="text-align: center; font-size: 50px; color:#fff; padding-bottom: 5px; "><?php echo $count ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?module=listorder&set=1">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="pink card text-white mb-4">
                    <?php
                    // $sql_sl2 = "SELECT * FROM `order-info` WHERE `status` = 2";
                    // $count_rsl2 = mysqli_query($connect, $sql_sl2);
                    // $count2 = mysqli_num_rows($count_rsl2);
                    ?>
                    <div class="card-body flex">Đã xử lý</div> <span style="text-align: center; font-size: 50px; color:#fff; padding-bottom: 5px; "><?php echo $count2 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?module=listorder&set=2">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="orange card text-white mb-4">
                    <?php
                    // $sql_sl3 = "SELECT * FROM `order-info` WHERE `status` = 3";
                    // $count_rsl3 = mysqli_query($connect, $sql_sl3);
                    // $count3 = mysqli_num_rows($count_rsl3);
                    ?>
                    <div class="card-body flex">Đang vận chuyển</div> <span style="text-align: center; font-size: 50px; color:#fff; padding-bottom: 5px; "><?php echo $count3 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?module=listorder&set=3">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="green card text-white mb-4">
                    <?php
                    // $sql_sl4 = "SELECT * FROM `order-info` WHERE `status` = 4";
                    // $count_rsl4 = mysqli_query($connect, $sql_sl4);
                    // $count4 = mysqli_num_rows($count_rsl4);
                    ?>
                    <div class="card-body flex">Đã giao hàng</div> <span style="text-align: center; font-size: 50px; color:#fff; padding-bottom: 5px; "><?php echo $count4 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?module=listorder&set=4">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="red card text-white mb-4">
                    <?php
                    // $sql_sl5 = "SELECT * FROM `order-info` WHERE `status` = 0";
                    // $count_rsl5 = mysqli_query($connect, $sql_sl5);
                    // $count5 = mysqli_num_rows($count_rsl5);
                    ?>
                    <div class="card-body flex">Đã Hủy</div> <span style="text-align: center; font-size: 50px; color:#fff; padding-bottom: 5px; "><?php echo $count5 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?module=listorder&set='0'">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Doanh thu</li>
            </ol>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card mb-4">
                        <?php
                        // $sql_sum = "SELECT SUM(`total`) as value_sum FROM `order-info` WHERE `status` = 4";
                        // $total_rsl = mysqli_query($connect, $sql_sum);
                        // $row = mysqli_fetch_assoc($total_rsl);
                        // $sum = $row['value_sum'];
                        ?>
                        <div class="card-body">Tổng doanh thu</div> <span style="text-align: center; font-size: 50px; color:#FF4A52; "><?php echo number_format($sum, 0, '', ','); ?> VNĐ</span>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</main>