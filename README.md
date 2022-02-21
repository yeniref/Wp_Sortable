# Wp_Sortable
Wordpress sortable özel alan örneği

Frontend kodu

//
$ozel_alan_seti = get_post_meta($post->ID, 'ozel_alan_seti', true);
foreach($ozel_alan_seti as $ozel => $deger):
echo $deger['kolon_1']."<br>";
echo $deger['kolon_2']."<br>";
echo $deger['kolon_3']."<br>";
endforeach;
//
