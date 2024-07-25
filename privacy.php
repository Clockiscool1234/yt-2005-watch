<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<?php include "includes/server.php";$r=invidiousGet("/popular"); ?>
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
                        <div class="tableSubTitle">Privacy Policy</div>
                        <p>Users of the frontend is subject to the privacy policies declared in this document.</p>
                        <h4>Cookies</h4>
                        <p>This site does not use any cookies.</p>
                        <h4>Data we collect</h4>
                        <p>We do not collect any form of data from the end user that can be used for malicious purposes or used as a "fingerprint" to identify users.</p>
                        <h4>Content loaded from other sites</h4>
                        <p>This site loads video content from googlevideo.com. Usage of the watch page is subject to googlevideo's terms and conditions.</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <?php include('includes/html/footer.php'); ?>
</body>

</html>