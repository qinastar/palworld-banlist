<?php
$dir = './logs/';
$files = scandir($dir);
$logData = [];
$translations = [
    "Attempting to give himself" => "试图获得",
    "experience" => "经验",
    "AddPlayerCharacterStatusPoint_ToServer StatusPoint" => "试图获得技能点",
    "Attempting to spawn item" => "试图刷取道具",
    "Attempted to damage player owned Pal" => "试图伤害玩家拥有的帕鲁",
    "senderGuid: FGuid" => "发送者GUID",
    "BP_Player_Female_C" => "女性玩家角色C",
    "senderPlayerCharacter" => "发送者角色",
    "Attempted to pickup object from a significant distance" => "试图从很远的地方拾取物体",
    "target" => "目标",
    "ReviveCharacter_ToServer requested with HP higher than max." => "试图修改血量",
    "Attempted to pickup CommonDropItem3D from too far away" => "试图从太远处拾取 CommonDropItem3D",
    "Not taking any actions, since this requires human judgement" => "不采取任何行动，因为这需要人工判断",
    "Dealt quite a lot of damage" => "造成大量伤害",
    "Attempted to deal negative damage" => "试图造成负伤害",
    "Attempted to join someones guild, while not being invited" => "试图强制加入其他玩家工会"
    
    
];
$processedTexts = []; // array to store processed texts

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) == 'txt') {
        $handle = fopen($dir . $file, 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                preg_match('/(.*?) \[(.*?)\] (.*?) (\*may be\* a|is a) cheater! Reason: (.*)/', $line, $cheatMatches);

                if (!empty($cheatMatches)) {

                    // Check if the text has been processed before
                    if (in_array($line, $processedTexts)) continue; // skip this iteration if the text has been processed before

                    // Add the text to the list of processed texts
                    array_push($processedTexts, $line);

                    // 翻译原因
                    $reason = trim(substr(trim($cheatMatches[5]), 0));
                    foreach ($translations as $english => $chinese) {
                        if (strpos($reason, $english) !== false) {
                            $reason = str_replace($english, $chinese, $reason);
                            // break;
                        }
                    }

                    // 判断行动类型
                    if (strpos(trim(str_replace('*', '',$cheatMatches[4])), 'may be') !== false){
                        $actionType ='可疑';
                    } else{
                        $actionType ='作弊者';
                    }

                   array_push(
                      	$logData,
                      	[
                          	'time' => substr(trim($cheatMatches[1]), 0, 8),
                          	'name' => trim(substr(trim($cheatMatches[3]), 0)),
                          	'ip' => trim(substr(trim($cheatMatches[2]), 0)),
                          	'reason' =>  	$reason,
                          	'action' =>  	$actionType,
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
