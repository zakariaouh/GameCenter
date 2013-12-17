<?php


$content = "";
$_instance = mysql_connect("localhost", "root", "");
mysql_select_db('dbagamecenter', $_instance);


//$query = "SELECT  `name_game` ,  `description_game`,  `gameID` " .
//        "FROM  `game` ".
//        "WHERE  `gameID` " .
//        "IN (".
//            "SELECT DISTINCT (`gameID`)" .
//        "FROM `party`" .
//        "ORDER BY `beginning_party` DESC " .
//         ")" .
//        "LIMIT 0, 4";
$query="SELECT  DISTINCT g.`gameID` as `gameID`,`name_game` ,  `description_game`, p.`beginning_party`"  
         ." FROM  `game` as g ,`party` as p"
        ." WHERE   g.`gameID`=p.`gameID`"         
        ." ORDER BY p.`beginning_party` DESC"         
        ." LIMIT 0, 4";
$result = mysql_query($query, $_instance);
while ($row = mysql_fetch_assoc($result)) {
    $name_game = $row['name_game'];
    $description_game = $row['description_game'];
    //array_push($list, array($name_game=>$description_game));
$line=$description_game;
$idgame=$row['gameID'];
$date=$row['beginning_party'];

$link='/ZendProject/gamecenter/public/index/gameinfo?idgame='.$idgame;//a changer par la suit $this->BaseUrl().
if (preg_match('/^.{1,54}\b/s', $description_game, $match))
{
    $line=$match[0];
}
  $jours=date("d", strtotime($date));;
    $content = $content .
            '<li>' .
            '<figure><strong>' .
            $jours.
            '</strong>'.date("M", strtotime($date)).'</figure>' .
            '<h3><a href="'.$link.'">' .
            $name_game .
            '</a></h3>' .
            $line .
            '<a href='.$link.'>...</a>' .
            '</li>';
}
mysql_close();

echo $content;
?>
