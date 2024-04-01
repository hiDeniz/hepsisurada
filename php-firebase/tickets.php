<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<table class="table table-striped table-bordered ">
  <thead class="thead-dark">
    <tr>
      <th style="width:100px;">#</th>
      <th style="width:300px;" >Sender</th>
      <th> USER ID </th>
      <th >Message</th>
      <th style="width:300px;">Date</th>
      <th style="width:300px;">Move To Chat</th>
    </tr>

  </thead>
  <tbody>
    <?php 
      include "dbconfig.php";

      $ref_table = "Messages";
      $fetch_data = $database->getReference($ref_table)->getValue();
      if($fetch_data > 0)
      {
        $index = 1;
        foreach($fetch_data as $key=>$row)
        {
          ?>
            <tr>
              
              <td><?=$index?></td>
              <td><?=$row["name"]?></td>
              <td><?=$row["userID"]?></td>
              <td><?=$row["msg"]?></td>
              <td><?=$row["time"]?></td>
              <td><a href="chatAdminPage.php?userID=<?=$row["userID"]?>">Move</a></td>
            </tr>
          <?php
          $index++;
        }
      }
      
    ?>
   
  </tbody>
</table>


<form method="POST" action="send_message.php?sender=admin">
 
    <div class="row" style="padding:3rem;">
    <div class="col-sm-2" style = "width: 50px">
    <select id="uid" name="uid">
      <?php
        include "dbconfig.php";
        $ref_table = "Messages";
        $fetch_data = $database->getReference($ref_table)->getValue();
        
        if($fetch_data > 0)
        {
          $index = 1;
          foreach($fetch_data as $key=>$row)
          {
            ?>
              <option value="<?=$row["userID"]?>"><?=$row["userID"]?></option>

            <?php
            $index++;
          }
        }

      ?>
    </select>

    </div>



  <div class="mb-3 col-sm-10">
    <input type="normal" class="form-control" id="message" name="message">
  </div>
  <div class="col-sm-2">
    <button type="submit" class="btn btn-primary" style="width:100%;">Send</button>
  </div>
  </div>
</form>