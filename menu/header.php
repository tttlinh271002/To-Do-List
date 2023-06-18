<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="new.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<link href="../cs/style.css" rel="stylesheet">

<?php
    include 'database.php';
    $sql3 = "SELECT * FROM list WHERE complet = '0' ORDER BY id DESC";
    $total_task = 0;
    $res = mysqli_query($conn , $sql3) or die("SQL Query Fail");
    if (mysqli_num_rows($res) > 0) {
         while($row = mysqli_fetch_assoc($res)) {
            $total_task = $total_task + 1;
         }  
    }

    $sql4 = "SELECT * FROM list WHERE complet = '1' ORDER BY id DESC";
        $total_completed = 0;
        $res = mysqli_query($conn , $sql4) or die("SQL Query Fail");
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                $total_completed = $total_completed + 1;
            }
        }

?>

<div class="app-header header-shadow">
    <div class="app-header__logo">
        <img src="assets/images/logo.png" class="w-50">
    </div>
    
    <div class="app-header__content">
        <div class="app-header-left">
            <a href="#tasklist" class="mb-2 mr-2 btn btn-primary">Total Task<span class="badge badge-pill badge-light"><?php echo $total_task; ?></span></a>
            <a href="#tasklist" class="mb-2 mr-2 btn btn-success">Completed Task<span class="badge badge-pill badge-light"> <?php echo $total_completed; ?></span></a>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


