<?php
$dir = './logs/';
$files = scandir($dir);
$logData = [];
$translations = [
    // "Attempting to spawn item" => "试图刷取道具",
];

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) == 'txt') {
        $handle = fopen($dir . $file, 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                preg_match('/(.*?) \[(.*?)\] (.*?) is a cheater! Reason: (.*)/', $line, $cheatMatches);

                if (!empty($cheatMatches)) {
                    // 翻译原因
                    $reason = trim(substr(trim($cheatMatches[4]), 0));
                    foreach ($translations as $english => $chinese) {
                        if (strpos($reason, $english) !== false) {
                            $reason = str_replace($english, $chinese, $reason);
                            // break;
                        }
                    }

                    array_push(
                        $logData,
                        [
                            'time' => substr(trim($cheatMatches[1]), 0, 8),
                            'name' => trim($cheatMatches[2]),
                            'ip' => trim(substr(trim($cheatMatches[3]), 0)),
                            'reason' => $reason,
                            'action' => 'Cheating'
                        ]
                    );
                }
            }
            fclose ($handle);
        } else {
            // error opening the file.
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Palworld Server</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./style.css">-->
    <style>
        body {
            background: url('https://t.mwm.moe/pc/') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .table-container {
          background-color: rgba(255,255,255,0.9);
          padding: 20px;
          border-radius: 10px;
       }

       .table th, .table td {
           text-align:center; 
           vertical-align:middle;
       }
   </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 table-container my-5">
        
           <h1 style='text-align:center;'>Palworld Server</h1> 

           <table border="1" class="table table-striped table-bordered mt-5">
               <tr>
                   <th>time</th>
                   <th>IP</th>
                   <th>name</th>
                   <th>action</th>
                   <th>reason</th>

               </tr>

               <?php foreach ($logData as $data): ?>
               <tr>

               <td><?php echo htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['time'])))); ?></td>

               <td><?php echo htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['name'])))); ?></td>

               <td><?php echo htmlspecialchars(ucwords(strtolower(str_replace('_', '',isset ($data['ip'])?$data['ip']:'')))); ?></td>

               <td><?php echo htmlspecialchars(ucwords(strtolower(str_replace('_', '',$data['action'])))); ?></td>

               <td><?php echo htmlspecialchars(isset ($data['reason'])?$data['reason']:''); ?></td>

              </tr>
              <?php endforeach; ?>
           </table>


         </div></div></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html> 
