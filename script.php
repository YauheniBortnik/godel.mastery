<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$tpl = fopen('template.tpl', 'r');
$tpl = file('template.tpl');

if ($_GET) {
  $month_num = $_GET["monthnum"];
  $exec_date = date('d.m.Y H:i');
   $end_date =date_create();
   date_modify($end_date, $month_num."month");
    $end_date = date_format($end_date, "d.m.y");
    $file = fopen("template.tpl","r");
    $text = file("template.tpl");
    if (!empty($_GET["username"]) && !empty($_GET["number"]) && !empty($_GET["monthnum"])){
      foreach ($tpl as $value) {
        $value = str_replace("%USERNAME%", $_GET["username"], $value);
        $value = str_replace("%NUMBER%", $_GET["number"], $value);
        $value = str_replace("%MONTHNUM%", $month_num, $value);
        $value = str_replace("%EXECDATE%", $exec_date, $value);
        $value = str_replace("%ENDDATE%", $end_date, $value);
        echo $value . "<br/>";
      }
    }
   else {
     echo "Variables are not defined!";
   }
}
  elseif (isset($argv)) {
    $user_name = $argv[1];
    $_number = $argv[2];
    $month_num = $argv[3];

    $exec_date = date('d.m.Y H:i');
     $end_date =date_create();
     date_modify($end_date, $month_num."month");
      $end_date = date_format($end_date, "d.m.y");
      $file = fopen("template.tpl","r");
      $text = file("template.tpl");

      $main_text="";
      if (!empty($argv[1]) && !empty($argv[2]) && !empty($argv[3])){
        foreach ($tpl as $value) {
          $value = str_replace("%USERNAME%", $user_name, $value);
          $value = str_replace("%NUMBER%", $_number, $value);
          $value = str_replace("%MONTHNUM%", $month_num, $value);
          $value = str_replace("%EXECDATE%", $exec_date, $value);
          $value = str_replace("%ENDDATE%", $end_date, $value);
          echo $main_text = $value;
        }
      }
     else {
       echo "Variables are not defined!";
     }
  }
?>
