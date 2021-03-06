<script src="build/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="build/mediaelementplayer.min.css" />


<div id="player" style="position: fixed; bottom: 0; right: 0; background: #000; width: 100%">
</div>

<script type="text/javascript">
function playsong()
{
	var player = new MediaElementPlayer('#player2',{
	startVolume: 1,
	success: function (mediaElement, domObject) {
        
        mediaElement.addEventListener('ended', function(e) {

			$('.me-plugin').remove();
			$('.mejs-container').remove();
			$('info').remove();
			
			var song = get_song();
			var obj = jQuery.parseJSON(song);

			$('<audio>').attr('id','player2').attr('width','100%').attr('type','audio/mp3').attr('controls','controls').attr('autoplay','').attr('src',obj.url).prependTo('#player');
			playsong();

			$('<info>').attr('style','color: #fff').prependTo('#player');
			$('info').html('Bài Hát: ' + obj.song + '  &bull; Ca Sĩ: '+obj.singer+' &bull; <a href="'+obj.url+'" target="_blank">Tải Về</a>' + ' &bull; <a href="s/'+obj.share+'" >Link</a> &bull; <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=http://mp3.familug.org/s/'+obj.share+'">Gửi lên Facebook</a>');
			document.title = 'Bài Hát: '+obj.song + ' | Ca Sĩ: '+obj.singer+' | Lite Music | mp3.familug.org';
        });

    },
	});
}

function get_song()
{
	var song_list = Array();
	<?
		for($i = 0; $i < count($data['song']); $i++)
		{
			echo 'song_list['.$i.'] =  \' {"song":"'.str_replace('\'', '&#39;', $data['song'][$i]).'","url":"'.$data['url'][$i].'","share":"'.$data['share'][$i].'","singer":"'.$data['singer'][$i].'"} \';';
		}
	?>

	var ran = ( Math.floor(Math.random() * <?= count($data['song']) ?>) + 0 );

	return song_list[ran];
}

$(document).ready(function(){

var song = get_song();
var obj = jQuery.parseJSON(song);


$('<audio>').attr('id','player2').attr('width','100%').attr('type','audio/mp3').attr('controls','controls').attr('autoplay','').attr('src',obj.url).prependTo('#player');
playsong();
$('<info>').attr('style','color: #fff').prependTo('#player');
$('info').html('Bài Hát: ' + obj.song + '  &bull; Ca Sĩ: '+obj.singer+' &bull; <a href="'+obj.url+'" target="_blank">Tải Về</a>' + ' &bull; <a href="s/'+obj.share+'" >Link</a> &bull; <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=http://mp3.familug.org/s/'+obj.share+'">Gửi lên Facebook</a>');
document.title = 'Bài Hát: '+obj.song + ' | Ca Sĩ: '+obj.singer+' | Lite Music | mp3.familug.org';
});
</script>
