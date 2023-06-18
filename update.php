<?php

include 'database.php';

$id = $_POST["id"];
$sql = "SELECT * FROM list WHERE id = '$id'";
$res = mysqli_query($conn , $sql) or die("SQL Query Fail");
$data = "";
if (mysqli_num_rows($res)) {
    while ($row = mysqli_fetch_assoc($res)) {
?>
   <div class="position-relative row form-group">
       <label  class="col-sm-3 col-form-label">Task Title</label>
       <div class="col-sm-9">
           <input name="title" id="title" value=<?php echo $row['title'] ?> placeholder="with a placeholder" type="text" class="form-control">
       </div>
   </div>
   
   
   <div class="position-relative row form-group">
       <label class="col-sm-3 col-form-label">Description</label>
       <div class="col-sm-9">
           <textarea name="description" id="description" rows="10" id="" class="form-control"><?php echo $row["description"] ?></textarea>
       </div>
   </div>

   <div class="position-relative row form-group">
       <label class="col-sm-3 col-form-label">Due Date</label>
       <div class="col-sm-9">
       <input name="date" style="width: 60%" type="date" value="<?php echo $row["date"] ?>" min="<?php echo date("Y-m-d") ?>" max="2023-08-26" step="1" class="form-control">
       </div>
   </div>

   <div class="position-relative row form-group">
       <label class="col-sm-3 col-form-label">Piority</label>
       <div class="col-sm-9">

            <select name ="piority" id="piority" rows="10" id="" class="form-control">
                <?php
                if($row['piority']==0) {
                ?>
                <option value="0" selected>Normal</option>
                <option value="1">Low</option>
                <option value="2">High</option>
                <?php
                }elseif($row['piority']==1){
                ?>
                <option value="0">Normal</option>
                <option value="1" selected>Low</option>
                <option value="2">High</option>
                <?php
                }else{
                ?>
                <option value="0">Normal</option>
                <option value="1">Low</option>
                <option value="2" selected>High</option>
                <?php
                }
                ?>
            </select>
           </textarea>
       </div>
    </div>
     
    <input type="hidden"  id="id" value = "<?php echo $row["id"] ?>">

    <div class="position-relative row form-check">
        <div class="col-sm-9 offset-sm-3 pr-4" >
            <a name="submit" class="mb-2  btn btn-primary btn-lg btn-block save">Submit</a>
        </div>
    </div>
   
<?php
}
// echo $data;
       
        mysqli_close($conn);
       
}else{
   echo "<script>alert('else part')</script>";
}

?>