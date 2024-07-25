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
                    <table class="page-profile" width="795" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
            <tr valign="top">
                <td width="180">

                    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E5ECF9" align="center">
                        <tbody>
                            <tr>
                                <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                            </tr>
                            <tr>
                                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                <td style="padding: 5px;" align="center">


                                    <div style="font-size: 14px; font-weight: bold; color:#003366; margin-bottom: 5px;">Do you know
                                        <?php echo $r["author"];?>?</div>
                                    <a href="signup.php">Sign up</a>
                                    or
                                    <a href="login.php">log in</a>
                                    to add
                                    <?php echo $r["author"];?>
                                    as friend.<br><br>

                                    <div style="font-size: 14px; font-weight: bold; color:#003366; margin-bottom: 5px;">Question? Comment?</div>
                                    <form method="post" action="outbox.php?user=<?php echo $r["author"];?>">
                                        <input type="submit" value="Contact Me!"><br>
                                    </form>

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

                <td style="padding: 0px 10px 0px 10px;">

                    <table width="100%" cellspacing="0" cellpadding="5" border="0">
                        <tbody>
                            <tr>
                                <td width="120" align="right">
                                    <span class="label">User Name:</span>
                                </td>
                                <td><?php echo $r["author"];?></td>
                            </tr>

                            <!-- Personal Information: -->


                            <tr>
                                <td align="right">
                                    <span class="label">Gender:</span>
                                </td>
                                <td>N/A</td>
                            </tr>


                            <tr valign="top">
                                <td style="text-align: Right;">
                                    <span class="label">About Me:</span>
                                </td>
                                <td><?php echo $r["descriptionHtml"];?></td>
                            </tr>


                            <!-- Location Information (get doxxed uwu owo) -->


                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>


                            <!-- Random Information -->
                        </tbody>
                    </table>

                </td>


                <td width="180">

                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">» Profile</div>
                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">»
                        <a href="profile_videos.php?id=<?php echo $_GET["id"];?>">Public Videos</a>
                        (<?php echo count($r["latestVideos"]);?>)</div>
                    <!-- only show this link to friends in their network -->
                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">»
                        <a href="#">Private Videos</a>
                        (0)</div>
                    <!-- only show this link to friends in their network -->
                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #444;">»
                        <a href="#">Favorites</a>
                        (0)</div>
                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #444;">»
                        <a href="#">Friends</a>
                        (0)</div>

                    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
                        <tbody>
                            <tr>
                                <td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
                                <td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
                                <td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
                            </tr>
                            <tr>
                                <td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
                                <td>
                                    <div class="moduleTitleBar">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="moduleTitle">My Latest Video</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="moduleFeatured">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <a href="watch.php?v="><img src="<?php echo $r["latestVideos"][0]["videoThumbnails"][3]["url"];?>" class="moduleFeaturedThumb" width="120" height="90"></a>
                                                        <div class="moduleFeaturedTitle">
                                                            <a href="watch.php?v=<?php echo $r["latestVideos"][0]["videoId"];?>"><?php echo $r["latestVideos"][0]["title"];?></a>
                                                        </div>
                                                        <div class="moduleFeaturedDetails">Added: <?php echo gmdate("M d, Y" , $r["latestVideos"][0]["published"]);?>
                                                            <br>by
                                                            <a href="profile.php?id=<?php echo $_GET["id"];?>"><?php echo $r["author"];?></a>
                                                        </div>
                                                        <div class="moduleFeaturedDetails">Views: <?php echo $r["latestVideos"][0]["viewCount"];?></div>
                                                        <div class="moduleFeaturedDetails">Comments: 0</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

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

                    <div style="font-size: 12px; color: #444; margin: 10px 0px 0px 0px; text-align: center;">
                        <strong>Like my videos?</strong><br>
                        <a href="#">Subscribe to my RSS Feed.</a>
                    </div>

                </td>


            </tr>
        </tbody>
    </table>

</div></td></tr></tbody></table>

                </td>
            </tr>
        </tbody>
    </table>

    <?php include('includes/html/footer.php'); ?>
</body>

</html>
