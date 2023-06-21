<!doctype html>
<html lang="en">
<?php include 'database.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="cs/main.css" rel="stylesheet">
<link href="cs/style.css" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       
        <?php include('menu/header.php'); ?>
        <?php include('menu/theme.php'); ?>
        <div class="app-main">
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <h1 style="margin:auto">To Do List</h1>
                            </div>
                        </div> 
                       
            <!--------------------------- Menu -------------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 card">
                                    <div class="card-body">
                                        <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link show" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0" aria-selected="true">
                                                    <span class="nav-text">Add Task</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link active show" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1" aria-selected="false">
                                                    <span class="nav-text">View Task</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link show" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2" aria-selected="false">
                                                    <span class="nav-text">Completed Task</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-5"> 

                                        <?php
                                            if (isset($_POST['submit'])) {
                                                $title = $_POST['title'];
                                                $desc = $_POST['description'];
                                                $odate = $_POST['odate'];
                                                $piority = $_POST['piority'];

                                                $sql = "INSERT INTO `list` (`id`, `title`, `description`, `user_id`, `odate`, `piority`) VALUES (NULL, '$title', '$desc', '01', '$odate', '$piority')";
                                                if (mysqli_query($conn, $sql)) {
                                                  echo '<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Task is set</div><div class="toast-message">Good luck!</div></div></div>';
                                                } else {
                                                   echo '<div id="toast-container2" class="toast-top-right"><div class="toast toast-danger" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Task is set</div><div class="toast-message">Good luck!</div></div></div>';
                                                }
                                            }

                                        ?>




                <!------------ Task form ------------------------------->
                                            <div class="tab-pane" id="tab-animated1-0" role="tabpanel">
                                               
                                               <form class="col-md-6 offset-md-3" method="post" action="home.php">
                                                    <div class="position-relative row form-group">
                                                        <label  class="col-sm-3 col-form-label">Task Title</label>
                                                        <div class="col-sm-9">
                                                            <input name="title" id="" placeholder="Add new task" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="position-relative row form-group">
                                                        <label class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="description" rows="10" id="" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="position-relative row form-group">
                                                        <label class="col-sm-3 col-form-label">Due Date</label>
                                                        <div class="col-sm-9">
                                                            <input name="odate" style="width: 60%" type="date" min="<?php echo date("Y-m-d") ?>" max="2023-08-26" step="1" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="position-relative row form-group">
                                                        <label class="col-sm-3 col-form-label">Piority</label>
                                                        <div class="col-sm-9">
                                                            <select style="width: 60%" name ="piority" class="form-control">
                                                                <option value="0">Normal</option>
                                                                <option value="1">Low</option>
                                                                <option value="2">High</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                        <input type="hidden" name="user_id" value="1">
                                                      
                                                    <div class="position-relative row form-check">
                                                        <div class="col-sm-9 offset-sm-3 pr-4" >
                                                            <button name="submit" class="mb-2  btn btn-primary btn-lg btn-block ">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>


                <!----------------------------- Task View ----------------------------------->
                                            <div class="tab-pane  active show" id="tab-animated1-1" role="tabpanel">
                                                <div class="table-responsive">

                                                    <table id="clint_tbl" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            
                                                            <th>Task</th>
                                                            <th>Task Description</th>
                                                            <th>Piority</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $sql1 = "SELECT * FROM list WHERE complet = '0' ORDER BY odate ASC";

                                                                $res = mysqli_query($conn , $sql1) or die("SQL Query Fail");
                                                                if (mysqli_num_rows($res) > 0) {
                                                                while($row = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                            <tr>
                                                                
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading"><?php echo $row["title"] ; ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-subheading"><?php echo $row["description"] ; ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-subheading">
                                                                                    <?php if($row['piority'] == 0){
                                                                                        echo 'Normal';
                                                                                    }elseif($row['piority'] == 1) {
                                                                                        echo 'Low';
                                                                                    }else{
                                                                                        echo 'High';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            
                                                                <td class="text-center">

                                                                    <?php 
                                                                    echo "<a data-id=".$row["id"]." class='mr-2 btn-icon btn-icon-only btn btn-outline-info edittask'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                                                                    ?>

                                                                
                                                                    <?php 
                                                                    echo "<a href='module/delete.php?id=" . $row["id"] . "' class='mr-2 btn-icon btn-icon-only btn btn-outline-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                                                                    ?>

                                                                    <?php 
                                                                    echo "<a href='module/complet.php?id=" . $row["id"] . "' class='mr-2 btn-icon btn-icon-only btn btn-outline-success'><i class='fa fa-check-circle'> </i></a>";
                                                                    ?>
                
                                                                </td>
                                                            </tr>

                                                            <?php   } }?>
                                                        
                                                       </tbody>
                                                    </table>
                                                </div>
                                            </div>


                <!---------------------------- Complet task ----------------------------------->
                                            <div class="tab-pane show" id="tab-animated1-2" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table id="clint_tbl1" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            
                                                            <th>Task</th>
                                                            <th>Task Description</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php 
                                                            $sql2 = "SELECT * FROM list WHERE complet = '1' ORDER BY odate ASC";

                                                            $res = mysqli_query($conn , $sql2) or die("SQL Query Fail");
                                                               if (mysqli_num_rows($res) > 0) {
                                                             while($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                        <tr>
                                                            
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading"><?php echo $row["title"] ; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                             <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-subheading"><?php echo $row["description"] ; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-subheading">
                                                                                <?php if($row['piority'] == 0){
                                                                                    echo 'Normal';
                                                                                }elseif($row['piority'] == 1) {
                                                                                    echo 'Low';
                                                                                }else{
                                                                                    echo 'High';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                           
                                                            <td class="text-center">
                                                                <?php 
                                                                    echo "<a href='module/reopen.php?id=" . $row["id"] . "' class='mr-2 btn-icon btn-icon-only btn btn-outline-info'>Reopen</a>";
                                                                ?>
                                                                <?php 
                                                                    echo "<a href='module/delete.php?id=" . $row["id"] . "' class='mr-2 btn-icon btn-icon-only btn btn-outline-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                                                                ?>
                                                            </td>
                                                        </tr>

                                                          <?php   } }?>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>                        

                        <?php 
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

                        <div class="row">   
                            <div class="col-md-6 ">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading mr-3">Total Task</div>
                                                <div class="widget-subheading"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">
                                                    <?php  echo $total_task; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading mr-3">Completed Task</div>
                                                <div class="widget-subheading"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">
                                                    <?php echo $total_completed; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br><br>
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>

<!-- model edit task -->
    <div class="modeledit">
        <div class="modelformedit">
            <div class="editform">
            </div>
            <a href="home.php?edit=taskclose"><div class="closebtn">X</div></a>
        </div>
    </div>
               
    <?php                  
        if (isset($_GET['delete-success'])) {
            echo '<div id="toast-container" class="toast-top-right"><div class="toast toast-danger" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Delete</div><div class="toast-message">Delete Successful!</div></div></div>';
        } else {
            echo '<div id="toast-container2" class="toast-top-right"><div class="toast toast-danger" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Delet</div><div class="toast-message">Try again..</div></div></div>';
        }

        if (isset($_GET['complet-success'])) {
            echo '<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">COMPLETED</div><div class="toast-message">Complet Successful!</div></div></div>';
        } else {
            echo '<div id="toast-container2" class="toast-top-right"><div class="toast toast-danger" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Delet</div><div class="toast-message">Try again..</div></div></div>';
        }

        if (isset($_GET['reopen-success'])) {
            echo '<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">REOPEN</div><div class="toast-message">Reopen Successful!</div></div></div>';
        } else {
            echo '<div id="toast-container2" class="toast-top-right"><div class="toast toast-danger" aria-live="polite" style=""><div class="toast-progress" style="width: 0%;"></div><div class="toast-title">Delet</div><div class="toast-message">Try again..</div></div></div>';
        }
    ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
    <!------------------------------ UPDATE ----------------------------------------->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#clint_tbl').DataTable();
        });

        setTimeout(function(){ $('#toast-container').hide() }, 5000);
        setTimeout(function(){ $('#toast-container2').hide() }, 5000);

        $(".closebtn").on('click',function (){
            $('.modeledit').fadeOut(800);
        });

        $('.edittask').click(function () {
            $('.modeledit').fadeIn(800); 
            var id = $(this).data('id');
            $.ajax({
                url : 'module/update.php',
                type : 'POST',
                data : {id:id},
                success : function (data) {
                    $(".editform").html(data);
                }
            })
        });

        $(document).on('click','.save',function (e){
            var id = $('#id').val();
            var title = $('#title').val();
            var description = $('#description').val();
            var odate = $('#odate').val();
            var piority = $('#piority').val();
            $.ajax({
                url : 'module/updaterec.php',
                type : 'POST',
                data : {id:id,title:title,description:description,odate:odate,piority:piority},
                success : function (data) {
                    if (data == 1) {
                        location.reload();
                        window.location.replace("home.php?complet-success");
                        $("#model").hide(800);
                    } 
                    if (data == 0) {
                        alert("data not add")
                    }
                }
            })
        });
    </script>
</body>
</html>
