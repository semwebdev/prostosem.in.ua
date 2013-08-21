<?
 mysql_connect('localhost','root','');
 mysql_select_db('test');
 mysql_query("SET NAMES utf8");
 $query = mysql_query("SELECT * FROM articles WHERE title = '" . $_POST['title'] . "'");
 $result = mysql_fetch_assoc($query);
  echo json_encode($result);
?>