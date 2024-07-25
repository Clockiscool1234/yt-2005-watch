<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<?php include "includes/server.php";$r=invidiousGet("/channels/".$_GET["id"]); ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>YouTube - Your Digital Video Repository</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
    <link href="yts/cssbin/styles.css" rel="stylesheet" type="text/css">
    <link rel="alternate" type="application/rss+xml" title="YouTube " recently="" added="" videos="" [rss]="" href="http://www.youtube.com/rss/global/recently_added.rss">
</head>

<body>

    <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
            <tr>
                <td style="padding-bottom: 25px;" bgcolor="#FFFFFF">
                    <?php include("includes/html/header.php"); ?>
                    <div style="padding: 0px 5px 0px 5px;">
        

<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tbody><tr valign="top">
        <td style="padding-right: 15px;">

        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#CCCCCC">
            <tbody><tr>
                <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
            </tr>
            <tr>
                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                <td>
                
                <div class="watchTitleBar">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr valign="top">
                            <td><div class="watchTitle">Public Videos // <span style="text-transform: capitalize;"><?php echo $r["author"];?></span></div></td>
                            <td align="right"> 
                                <div style="font-weight: bold; color: #444; margin-right: 5px;">
                                Videos 1-<?php echo count($r["latestVideos"]);?> of 1                             </div>
                            </td>
                        </tr>
                    </tbody></table>
                </div>

                <?php for ($i=0; $i < count($r["latestVideos"]); $i++) { 
                    echo '<div class="moduleEntry"> 
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr valign="top">
                            <td><a href="watch.php?v='.$r["latestVideos"][$i]["videoId"].'"><img src="'.$r["latestVideos"][$i]["videoThumbnails"][3]["url"].'" class="moduleEntryThumb" width="120" height="90"></a></td>
                            <td width="100%"><div class="moduleEntryTitle"><a href="watch.php?v='.$r["latestVideos"][$i]["videoId"].'">'.$r["latestVideos"][$i]["title"].'</a></div>
                            <div class="moduleEntryDescription">'.$r["latestVideos"][$i]["description"].'</div>
                            <div class="moduleEntryTags">
        
                            Tags // <a href="results.php?search=dance">dance</a> : <a href="results.php?search=break">break</a> : <a href="results.php?search=hollywood">hollywood</a> : <a href="results.php?search=amy">amy</a> : <a href="results.php?search=spear">spear</a> : <a href="results.php?search=breakdance">breakdance</a> : <a href="results.php?search=street">street</a> : <a href="results.php?search=performer">performer</a> :                             </div>
        
                            <div class="moduleEntryDetails">Added: '.gmdate("M d, Y" , $r["latestVideos"][$i]["published"]).' by <a href="profile.php?id='.$r["latestVideos"][$i]["authorId"].'">'.$r["latestVideos"][$i]["author"].'</a></div>
                            <div class="moduleEntryDetails">Views: '.$r["latestVideos"][$i]["viewCount"].' | Comments: 0</div>
                            </td>
        
                        </tr>
                    </tbody></table>
                </div>';
                }?>
                
                </td>
                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
            </tr>
            <tr>
                <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
            </tr>
        </tbody></table>

        </td>
        <td width="180">
        <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="profile.php?id=<?php echo $_GET["id"]?>">Profile</a></div>
        <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» Public Videos</div>
        <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="#">Private Videos</a> (0)</div>
        <!-- only show this link to friends in their network -->
        <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="#">Favorites</a> (0)</div>
        <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» <a href="#">Friends</a> (0)</div>
        </td>
    </tr>
</tbody></table>

        </div>
                </td>
            </tr>
        </tbody>
    </table>

    <?php include('includes/html/footer.php'); ?>
</body>

</html>
