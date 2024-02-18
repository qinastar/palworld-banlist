<?php 
include 'core3.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Palworld Server封禁名单</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style2.css">
    <style>
   </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 table-container my-5">
        
           <h1 style='text-align:center;'>Palworld Server封禁名单</h1> 

           <table border="1" class="table table-striped table-bordered mt-5">
               <tr>
                   <th>时间</th>
                   <th>名字</th>
                   <th>IP 地址</th>
                   <th>行为</th>
                   <th>原因</th>

               </tr>

               <?php foreach ($logData as $data): ?>
               
               <?php
                // Determine the row's color based on the action.
                $colorClass = '';
                switch (strtolower($data['action'])) { // Make sure to compare in lowercase
                    case '作弊者':
                        $colorClass = 'cheater';
                        break;
                    case '可疑':
                        $colorClass = 'suspicious';
                        break;
                }
              ?>
              
              <!-- Apply the color class to the row. -->
              <!-- Note that we're applying it on a per-cell basis because of Bootstrap's CSS specificity -->
              <!-- If you're not using Bootstrap or a similar CSS framework, you could apply it directly to the tr element -->

               <tr>

                  <!-- time -->
                  <?php echo "<td class=\"$colorClass\">" . htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['time'])))) . "</td>"; ?>

                  <!-- name -->
                  <?php echo "<td class=\"$colorClass\">" . htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['name'])))) . "</td>"; ?>

                  <!-- ip -->
                  <?php echo "<td class=\"$colorClass\">" . htmlspecialchars(ucwords(strtolower(str_replace('_', '',isset ($data['ip'])?$data['ip']:'')))) . "</td>"; ?>

                  <!-- action -->
                  <?php echo "<td class=\"$colorClass\">" . htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['action'])))) . "</td>"; ?>

                 <!-- reason -->
                 <?php echo "<td class=\"$colorClass\">" . htmlspecialchars(isset ($data['reason'])?$data['reason']:'') . "</td>"; ?>

              </tr>
              <?php endforeach; ?>
           </table>


         </div></div></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html> 
