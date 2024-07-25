<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"> <?php include "includes/server.php";$r=invidiousGet("/trending"); ?> <html>

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
                <td style="padding-bottom: 25px;" bgcolor="#FFFFFF"> <?php include("includes/html/header.php"); ?> <div style="padding: 0px 5px 0px 5px;">
                        <table align="center" cellpadding="5" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="bold">Trending</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table width="795" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#CCCCCC">
                            <tbody>
                                <tr>
                                    <td><img src="/yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                    <td><img src="/yts/imgbin/pixel.gif" width="1" height="5"></td>
                                    <td><img src="/yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                                </tr>
                                <tr>
                                    <td><img src="/yts/imgbin/pixel.gif" width="5" height="1"></td>
                                    <td width="785">
                                        <div class="moduleTitleBar">
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tbody>
                                                    <tr valign="top">
                                                        <td>
                                                            <div class="moduleTitle"> Trending </div>
                                                        </td>
                                                        <td align="right">
                                                            <div style="font-weight: bold; color: #444; margin-right: 5px;"> Videos 1-20 of 100 </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="moduleFeatured">
                                            <table width="775" cellpadding="0" cellspacing="0" border="0">
                                                <tbody>
                                                    <tr valign="top">
                                                         <?php for ($i=0; $i < 5; $i++) { 
                                                            echo '
                                                            <td width="20%" align="center"><a href="watch.php?v='.$r[$i]["videoId"].'"><img src="'.$r[$i]["videoThumbnails"][4]["url"].'" width="120" height="90" class="moduleFeaturedThumb"></a>
                                                                <div class="moduleFeaturedTitle"><a href="watch.php?v='.$r[$i]["videoId"].'">'.$r[$i]["title"].'</a></div>
                                                                <div class="moduleFeaturedDetails">Added: '.gmdate("M d, Y", $r[$i]["published"]).'<br>by <a href="profile.php?id='.$r[$i]["authorId"].'">'.$r[$i]["author"].'</a></div>
                                                                <div class="moduleFeaturedDetails" style="padding-bottom: 5px;">Views: '.$r[$i]["viewCount"].' | Comments: 0</div>
                                                            </td>';
                                                        } ?>
                                                    </tr>
                                                    <tr valign="top">
                                                         <?php for ($i=6; $i < 11; $i++) { 
                                                            echo '
                                                            <td width="20%" align="center"><a href="watch.php?v='.$r[$i]["videoId"].'"><img src="'.$r[$i]["videoThumbnails"][4]["url"].'" width="120" height="90" class="moduleFeaturedThumb"></a>
                                                                <div class="moduleFeaturedTitle"><a href="watch.php?v='.$r[$i]["videoId"].'">'.$r[$i]["title"].'</a></div>
                                                                <div class="moduleFeaturedDetails">Added: '.gmdate("M d, Y", $r[$i]["published"]).'<br>by <a href="profile.php?id='.$r[$i]["authorId"].'">'.$r[$i]["author"].'</a></div>
                                                                <div class="moduleFeaturedDetails" style="padding-bottom: 5px;">Views: '.$r[$i]["viewCount"].' | Comments: 0</div>
                                                            </td>';
                                                        } ?>
                                                    </tr>
                                                    <tr valign="top">
                                                         <?php for ($i=12; $i < 17; $i++) { 
                                                            echo '
                                                            <td width="20%" align="center"><a href="watch.php?v='.$r[$i]["videoId"].'"><img src="'.$r[$i]["videoThumbnails"][4]["url"].'" width="120" height="90" class="moduleFeaturedThumb"></a>
                                                                <div class="moduleFeaturedTitle"><a href="watch.php?v='.$r[$i]["videoId"].'">'.$r[$i]["title"].'</a></div>
                                                                <div class="moduleFeaturedDetails">Added: '.gmdate("M d, Y", $r[$i]["published"]).'<br>by <a href="profile.php?id='.$r[$i]["authorId"].'">'.$r[$i]["author"].'</a></div>
                                                                <div class="moduleFeaturedDetails" style="padding-bottom: 5px;">Views: '.$r[$i]["viewCount"].' | Comments: 0</div>
                                                            </td>';
                                                        } ?>
                                                    </tr>
                                                    <tr valign="top">
                                                         <?php for ($i=18; $i < 23; $i++) { 
                                                            echo '
                                                            <td width="20%" align="center"><a href="watch.php?v='.$r[$i]["videoId"].'"><img src="'.$r[$i]["videoThumbnails"][4]["url"].'" width="120" height="90" class="moduleFeaturedThumb"></a>
                                                                <div class="moduleFeaturedTitle"><a href="watch.php?v='.$r[$i]["videoId"].'">'.$r[$i]["title"].'</a></div>
                                                                <div class="moduleFeaturedDetails">Added: '.gmdate("M d, Y", $r[$i]["published"]).'<br>by <a href="profile.php?id='.$r[$i]["authorId"].'">'.$r[$i]["author"].'</a></div>
                                                                <div class="moduleFeaturedDetails" style="padding-bottom: 5px;">Views: '.$r[$i]["viewCount"].' | Comments: 0</div>
                                                            </td>';
                                                        } ?>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- begin paging -->
                                        <div style="font-size: 13px; font-weight: bold; color: #444; text-align: right; padding: 5px 0px 5px 0px;">Browse Pages: <span style="color: #444; background-color: #FFFFFF; padding: 1px 4px 1px 4px; border: 1px solid #999; margin-right: 5px;">1</span>
                                        </div>
                                        <!-- end paging -->
                                    </td>
                                    <td><img src="/yts/imgbin/pixel.gif" width="5" height="1"></td>
                                </tr>
                                <tr>
                                    <td><img src="/yts/imgbin/box_login_bl.gif" width="5" height="5"></td>
                                    <td><img src="/yts/imgbin/pixel.gif" width="1" height="5"></td>
                                    <td><img src="/yts/imgbin/box_login_br.gif" width="5" height="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> <?php include('includes/html/footer.php'); ?>
</body>

</html>