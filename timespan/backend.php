<?php
$postDate = strtotime($_POST['date']);
$now = time();
$result = timespan($postDate,$now);
$str = '';
for($i = 0; $i < $_POST['number']; $i++){
  $str .= $result[$i] . ' ';
}
$str .= ' назад';
echo json_encode($str);

function get_date($date,$first,$second,$third){
    if((($date % 10) > 4 && ($date % 10) < 10) || ($date > 10 && $date < 20)){
        return $second;
    }
    if(($date % 10) > 1 && ($date % 10) < 5){
        return $third;
    }
    if(($date%10) == 1){
        return $first;
    }
    else{
        return $second;
    }
}

function timespan($seconds = 1, $time = '')
{
    if ( ! is_numeric($seconds))
    {
    	$seconds = 1;
    }
    if ( ! is_numeric($time))
    {
    	$time = time();
    }
    if ($time <= $seconds)
    {
    	$seconds = 1;
    }
    else
    {
    	$seconds = $time - $seconds;
    }

    $str = array();
    $years = floor($seconds / 31536000);

    if ($years > 0)
    {
    	$str[] = $years.' '.get_date($years,'год','лет','года');
    }

      	$seconds -= $years * 31536000;
    $months = floor($seconds / 2628000);

    if ($years > 0 OR $months > 0)
    {
    	if ($months > 0)
    	{
    		$str[] = $months.' '.get_date($months,'месяц','месяцев','месяца');
    	}

              $seconds -= $months * 2628000;
    }

    $weeks = floor($seconds / 604800);

    if ($years > 0 OR $months > 0 OR $weeks > 0)
    {
    	if ($weeks > 0)
    	{
    		$str[] = $weeks.' '.get_date($weeks,'неделю','недель','недели');
    	}

              $seconds -= $weeks * 604800;
    }

    $days = floor($seconds / 86400);

    if ($months > 0 OR $weeks > 0 OR $days > 0)
    {
    	if ($days > 0)
    	{
    		$str[] = $days.' '.get_date($days,'день','дней','дня');
    	}

              $seconds -= $days * 86400;
    }

    $hours = floor($seconds / 3600);

    if ($days > 0 OR $hours > 0)
    {
    	if ($hours > 0)
    	{
    		$str[] = $hours.' '.get_date($hours,'час','часов','часа');
    	}

              $seconds -= $hours * 3600;
    }

    $minutes = floor($seconds / 60);

    if ($days > 0 OR $hours > 0 OR $minutes > 0)
    {
    	if ($minutes > 0)
    	{
    		$str[] = $minutes.' '.get_date($minutes,'минута','минут','минуты');
    	}

              $seconds -= $minutes * 60;
    }

    if ($str == '')
    {
       $str[] = $seconds.' '.get_date($seconds,'секунда','секунд','секунды');
    }

    return $str;
}
?>