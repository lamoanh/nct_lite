<?
$dom = new DOMDocument();
@$dom->loadXML(file_get_contents('http://www.nhaccuatui.com/flash/xml?key2=358bd7a57f4e58990ee4f95a5fae0118'));

$data = array();
foreach($dom->getElementsByTagName('title') as $v)
	$data['song'][] = str_replace('\'', '', trim($v->textContent));
foreach($dom->getElementsByTagName('location') as $v)
	$data['url'][] = str_replace('\'', '', trim($v->textContent));
foreach($dom->getElementsByTagName('creator') as $v)
	$data['singer'][] = str_replace('\'', '', trim($v->textContent));

foreach($dom->getElementsByTagName('info') as $v)
{
	$url = trim($v->textContent);
	$ex = explode('.', $url);
	$song_key = $ex[count($ex) - 2];

	$data['share'][] = $song_key;
}

include "player_list.php";
?>
