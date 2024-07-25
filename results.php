<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html> <?php include "includes/server.php";$r=invidiousGet("/search?q=".urlencode($_GET['search'])); ?>

<head>
    <title>YouTube - Broadcast Yourself.</title>
    <link rel="stylesheet" type="text/css" href="yts/cssbin/styles.css">
    <link rel="icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="yts/imgbin/favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="YouTube - Recently Added Videos [RSS]" href="http://www.youtube.com/rss/global/recently_added.rss">
    <meta name="description" content="Share your videos with friends and family">
    <meta name="keywords" content="video,sharing,camera phone,video phone">
</head>

<body>
    <table width="800" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
            <tr>
                <td style="padding-bottom: 25px;" bgcolor="#FFFFFF"> <?php include("includes/html/header.php"); ?> <table style="margin-bottom: 10px;" cellspacing="0" cellpadding="0" border="0" align="center">
                </td>
            </tr>
        </tbody>
    </table>
    <div style="color: #333; margin-bottom: 10px;">Related Tags:
        <?php $related=invidiousGet("/search/suggestions?q=".urlencode($_GET['search']));
        for ($i=0; $i < count($related["suggestions"])-1; $i++) { 
            echo '<a href="/results.php?search='.$related["suggestions"][$i].'">'.$related["suggestions"][$i].'</a>&nbsp;';
        }
        ?>

    </div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
        <tbody>
            <tr>
                <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
            </tr>
            <tr>
                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                <td> <div class="moduleTitleBar">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr valign="top">
            <td><div class="moduleTitle">Search // <?php echo htmlspecialchars($_GET['search']);?></div></td>
            <td align="right">
            <div style="font-weight: color: #444; margin-right: 5px;">
                    Results
                <b>1</b>-<b>20</b> of <b>472</b> for <b>'<?php echo htmlspecialchars($_GET['search']);?>'</b>
                <b>0.24</b> seconds
            </div>
            </td>
        </tr>
    </tbody></table>
    </div><?php for ($i=0; $i < count($r)-1; $i++) { 
                    echo ($r[$i]["type"]=="video")?'<div class="moduleEntry">
                    <table width="565" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr valign="top">
                    <td><a href="watch.php?v='.$r[$i]["videoId"].'"><img src="'.$r[$i]["videoThumbnails"][4]["url"].'" class="moduleEntryThumb" width="120" height="90"></a></td>
                    <td width="100%">
                    <div class="moduleEntryTitle"><a href="watch.php?v='.$r[$i]["videoId"].'">'.$r[$i]["title"].'</a></div>
                    <div class="moduleEntryDescription">'.$r[$i]["description"].'</div>
                    <div class="moduleEntryDetails">Added: '.gmdate("F d, Y", $r[$i]["published"]).' by <a href="profile.php?id='.$r[$i]["authorId"].'">'.$r[$i]["author"].'</a></div>
                    <div class="moduleEntryDetails">Views: '.$r[$i]["viewCount"].' | Comments: 0</div>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>':"";
                    } ?> <!-- begin paging -->
                    <div style="font-size: 13px; font-weight: bold; color: #444; text-align: right; padding: 5px 0px 5px 0px;"> Results Page: <span style="color: #444; background-color: #FFFFFF; padding: 1px 4px 1px 4px; border: 1px solid #999; margin-right: 5px;">1</span>
                    </div>
                    <!-- end paging -->
                </td>
                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
            </tr>
            <tr>
                <td><img src="yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                <td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                <td><img src="yts/imgbin/box_login_br.gif" width="5" height="5"></td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table> <?php include("includes/html/footer.php") ?>
</body>

</html>