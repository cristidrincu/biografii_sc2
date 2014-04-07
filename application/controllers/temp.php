<?php
$mainLink = "http://www.dota-vidcasts.ro/live-streams/";

$channel = array(
    "channelName0" => "warbringer81",
    "channelName1" => "wagamamatv",
    "channelName2" => "admiralbulldog"
);

$channelLinks = array(
    $mainLink . 'warbringer81/',
    $mainLink . 'wagamama/',
    $mainLink . 'admiralbulldog/'
);

$json_file = array(
    "jsonInfo0"=> @file_get_contents("http://api.justin.tv/api/stream/list.json?channel={$channel['channelName0']}", 0, null, null),
    "jsonInfo1"=> @file_get_contents("http://api.justin.tv/api/stream/list.json?channel={$channel['channelName1']}", 0, null, null),
    "jsonInfo2"=> @file_get_contents("http://api.justin.tv/api/stream/list.json?channel={$channel['channelName2']}", 0, null, null)
);

$json_array = array(
    "decode0"=>json_decode($json_file['jsonInfo0'], true),
    "decode1"=>json_decode($json_file['jsonInfo1'], true),
    "decode2"=>json_decode($json_file['jsonInfo2'], true)
);

for($i=0;$i<count($channel);$i++){
    if (isset($json_array['decode' . $i][0]) && $json_array['decode'.$i][0]['name'] == "live_user_{$channel['channelName' . $i ]}")
    {
        $channelTitle = $json_array['decode' . $i][0]['channel']['title'];
        $title = $json_array['decode' . $i][0]['channel']['status'];
        $game = $json_array['decode' .$i][0]['meta_game'];
        $viewers = $json_array['decode' .$i][0]['channel_count'];
        $smallPic = $json_array['decode' .$i][0]['channel']['image_url_small'];
        echo "<div class='mainContainerLiveStreams'>
                <div class='channelPicture'>
                    <img class='channelPic' src='$smallPic'/>
                </div>
                <div class='channelInfo'>
                    <h3 class='newFont'> Canalul ".$channelTitle." este <strong style='color:red;'>ONLINE!</strong></h3>
                    <h4 class='newFont gameTextColor' style='margin-bottom:10px; margin-top:10px;'> Se joaca: ".$game."!</h4>
                    <p class='newFont' style='font-size:14px; color:red;'>Are " .$viewers ." viewers!</p>
                    <a class='newFont' href='$channelLinks[$i]' target='_self'>Click aici pentru pagina canalului!</a>
                </div>
                <br class='clearFloats'/>

                <hr style='margin-bottom:10px; margin-top: 10px;'/>
        </div>";
        //echo "<h3>".$title."</h3>";
    }else{
        echo "<div class='mainContainerLiveStreams'>
            <h3 class='newFont' style='margin-bottom:5px;'>Canalul " .$channel['channelName' . $i]." este offline!</h3>
            <a class='newFont' href='$channelLinks[$i]' target='_self'>Click aici pentru pagina canalului!</a>
            <hr style='margin-bottom:10px; margin-top: 10px;'/>
        </div>";

    }
}
?>