<script>
	/**
	 * A simple video player.
	 * @author Jayden Seric
	 * @param  {Object}      options                  - Options object.
	 * @param  {HTMLElement} options.element          - Container.
	 * @param  {string}      [options.playClass=play] - Container class name when video is playing.
	 * @param  {string}      [options.muteClass=mute] - Container class name when video is mute.
	 */
	function VideoPlayer(options) {
		var self = this;
		// Options
		self.element = options.element;
		self.playClass = options.playClass || 'play';
		self.muteClass = options.muteClass || 'mute';
		// Derived
		self.video = this.element.querySelector('video');
		self.playToggleButton = this.element.querySelector('.play-toggle');
		self.muteToggleButton = this.element.querySelector('.mute-toggle');
		// Handle play
		self.video.addEventListener('play', function() {
			self.element.classList.add(self.playClass);
		});
		// Handle pause
		self.video.addEventListener('pause', function() {
			self.element.classList.remove(self.playClass);
		});
		// Handle mute
		self.video.addEventListener('volumechange', function() {
			if (self.video.muted) self.element.classList.add(self.muteClass);
			else self.element.classList.remove(self.muteClass);
		});
		// Enable play toggle button
		self.playToggleButton.addEventListener('click', function() {
			self.togglePlay()
		});
		// Enable mute toggle button
		self.muteToggleButton.addEventListener('click', function() {
			self.toggleMute()
		});
        // Video bar
        self.video.addEventListener("timeupdate", function(){
            var percent = self.video.currentTime / self.video.duration * 100;
            document.getElementsByClassName("bar")[0].style.backgroundImage = "linear-gradient(to right, #2c2c2c "+ percent.toString()+"% , #acacac  "+ percent.toString()+"%)"
        })
        document.getElementsByClassName("bar")[0].onclick = function(e) {
          var rect = e.target.getBoundingClientRect();
          var x = self.video.duration * ((e.clientX - rect.left) / rect.width);
          self.video.currentTime = x;
        }
	}
	/**
	 * Toggles video play/pause.
	 */
	VideoPlayer.prototype.togglePlay = function() {
		if (this.video.paused) this.video.play();
		else this.video.pause();
	};
	/**
	 * Toggles video mute/unmute.
	 */
	VideoPlayer.prototype.toggleMute = function() {
		this.video.muted = !this.video.muted;
	};
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"> <?php include "includes/server.php";$r=invidiousGet("/videos/".$_GET['v']);$comments=invidiousGet("/comments/".$_GET['v']); ?> <html>

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
						<iframe id="invisible" name="invisible" src="" scrolling="yes" marginheight="0" marginwidth="0" width="0" height="0" frameborder="0"></iframe>
						<table class="page-watch" width="795" cellspacing="0" cellpadding="0" border="0" align="center">
							<tbody>
								<tr valign="top">
									<td style="padding-right: 15px;" width="515">
										<div class="tableSubTitle"><?php echo $r["title"]; ?></div>
										<div style="font-size: 13px; font-weight: bold; text-align:center;">
											<a href="mailto:?subject=<?php echo $r["title"]; ?>&body=http://www.youtube.com/watch?v=<?php echo $r["videoId"]; ?>">Share</a> // <a href="#comment">Comment</a> // <a href="add_favorites.php?video_id=<?php echo $r["videoId"]; ?>" target="invisible" onclick="return FavoritesHandler();">Add to Favorites</a> // <a href="outbox.php?user=<?php echo $r["authorId"]; ?>&subject=Re: <?php echo $r["title"]; ?>">Contact Me</a>
										</div>
										<figure class="video-player" id="flashcontent" class="videoPlayerHolder">
												<div id="googlevideo-e">
													<video id="googlevideo-holder" preload="none" poster="//i.ytimg.com/vi/<?php echo $r["videoId"]; ?>/hqdefault.jpg" src="<?php echo $r["formatStreams"][0]["url"]; ?>"></video>
													<div class="controller">
														<button class="play-toggle"></button>
														<button class="bar"></button>
														<button class="mute-toggle"></button>
													</div>
												</div>
											</figure>
											<script>
												// Initialize video player
												new VideoPlayer({
													element: document.querySelector('.video-player')
												});
											</script>
										</div>
										<table width="425" cellspacing="0" cellpadding="0" border="0" align="center">
											<tbody>
												<tr>
													<td>
														<div class="watchDescription"><?php echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$r["descriptionHtml"]);?>
															<div class="watchAdded" style="margin-top: 5px;"></div>
														</div>
														<div class="watchTags">Tags // </div>
														<div class="watchAdded"> Added: <?php echo gmdate("M d, Y" , $r["published"]); ?> by <a href="profile.php?id=<?php echo $r["authorId"]; ?>"><?php echo $r["author"]; ?></a> // <a href="profile_videos.php?id=<?php echo $r["authorId"]; ?>">Videos</a> (64) | <a href="profile_favorites.php?user=<?php echo $r["authorId"]; ?>">Favorites</a> (0) | <a href="profile_friends.php?user=<?php echo $r["authorId"]; ?>">Friends</a> (16) </div>
														<div class="watchDetails"> Views: <?php echo $r["viewCount"]; ?> | <a href="#comment">Comments</a>: <?php echo $comments["commentCount"]; ?>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- watchTable -->
										<div style="padding: 15px 0px 10px 0px;">
											<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E5ECF9" align="center">
												<tbody>
													<tr>
														<td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
														<td width="100%"><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
														<td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
													</tr>
													<tr>
														<form name="linkForm" id="linkForm"></form>
														<td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
														<td align="center">
															<div style="font-size: 11px; font-weight: bold; color: #CC6600; padding: 5px 0px 5px 0px;">Share this video! Copy and paste this link:</div>
															<div style="font-size: 11px; padding-bottom: 15px;">
																<input name="video_link" type="text" onclick="this.select();" value="http://www.youtube.com/watch?v=<?php echo $r["videoId"]; ?>" size="50" readonly="true" style="font-size: 10px; text-align: center;">
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
										</div>
										<a name="comment"></a>
										<div style="padding-bottom: 5px; font-weight: bold; color: #444;">Comment on this video:</div>
										<form name="comment_form" id="comment_form" method="post" action="add_comment.php" target="invisible" onsubmit="return CommentHandler();">
											<input type="hidden" name="video_id" value="vy8evhya_9E">
											<textarea name="comment" cols="55" rows="3"></textarea>
											<br>
											<input type="submit" name="comment_button" value="Add Comment">
										</form>
										<br>
										<div dummy="true">
											<div class="commentsTitle">Comments:</div> 
                                            <?php if (!$comments["commentCount"] == 0){ 
                                                for ($i=0; $i < count($comments["comments"])-1; $i++) { 
                                                    echo' <div class="commentsEntry">'.preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments["comments"][$i]["contentHtml"]).'<br> - <a href="profile.php?id='.$comments["comments"][$i]["authorId"].'">'.$comments["comments"][$i]["author"].'</a> // <a href="profile.php?id='.$comments["comments"][$i]["authorId"].'">Videos</a> | <a href="profile.php?id='.$comments["comments"][$i]["authorId"].'">Favourites</a> | <a href="profile.php?id='.$comments["comments"][$i]["authorId"].'">Friends</a> '.''.' </div>';
                                                }
                                                }else{
                                                echo '<div class="commentsEntry">No comments or comments disabled.</div>';
                                                }?>
										</div>
									</td>
									<td width="280">
										<table width="280" cellspacing="0" cellpadding="0" border="0" bgcolor="#CCCCCC" align="center">
											<tbody>
												<tr>
													<td><img src="yts/imgbin/box_login_tl.gif" width="5" height="5"></td>
													<td><img src="yts/imgbin/pixel.gif" width="1" height="5"></td>
													<td><img src="yts/imgbin/box_login_tr.gif" width="5" height="5"></td>
												</tr>
												<tr>
													<td><img src="yts/imgbin/pixel.gif" width="5" height="1"></td>
													<td width="270">
														<div class="moduleTitleBar">
															<table width="270" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr valign="top">
																		<td>
																			<div class="moduleFrameBarTitle">Related Videos (1 of <?php echo count($r["recommendedVideos"]);?>)</div>
																		</td>
																		<td align="right">
																			<div style="font-size: 11px; margin-right: 5px;">
																				<a href="results.php?search=<?php echo $r["title"]; ?>" target="_parent">See All Results</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<div id="side_results" name="side_results">
															<div class="moduleFrameEntrySelected">
																<table width="235" cellspacing="0" cellpadding="0" border="0">
																	<tbody>
																		<tr valign="top">
																			<td width="90">
																				<a href="watch.php?v=<?php echo $r["videoId"]; ?>" class="bold" target="_parent"><img src="<?php echo $r["videoThumbnails"][3]["url"]; ?>" class="moduleEntryThumb" width="80" height="60"></a>
																			</td>
																			<td>
																				<div class="moduleFrameTitle">
																					<a href="watch.php?v=<?php echo $r["videoId"]; ?>" target="_parent"><?php echo $r["title"]; ?></a>
																				</div>
																				<div class="moduleFrameDetails"> by <a href="profile.php?id=<?php echo $r["authorId"]; ?>" target="_parent"><?php echo $r["author"]; ?></a>
																				</div>
																				<div class="moduleFrameDetails"> Runtime: <?php echo gmdate("H:i:s" , $r["lengthSeconds"]); ?><br> Views: <?php echo $r["viewCount"]; ?><br> Comments: 1 </div>
																				<div style="font-size: 10px; font-weight:bold; color: #CC6600; padding: 3px 6px; background-color:#FFCC66;">
																					<nobr>&lt;&lt;&lt; NOW PLAYING!</nobr>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
                                                            <?php 
                                                            for ($i=0; $i < count($r["recommendedVideos"])-1; $i++) { 
                                                                echo '<div class="moduleFrameEntry">
                                                                <table width="235" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr valign="top">
                                                                            <td width="90">
                                                                                <a href="watch.php?v='.$r["recommendedVideos"][$i]["videoId"].'" class="bold" target="_parent"><img src="https://i.ytimg.com/vi/'.$r["recommendedVideos"][$i]["videoId"].'/hqdefault.jpg" class="moduleEntryThumb" width="80" height="60"></a>
                                                                            </td>
                                                                            <td>
                                                                                <div class="moduleFrameTitle">
                                                                                    <a href="watch.php?v='.$r["recommendedVideos"][$i]["videoId"].'" target="_parent">'.$r["recommendedVideos"][$i]["title"].'</a>
                                                                                </div>
                                                                                <div class="moduleFrameDetails"> by <a href="profile.php?id='.$r["recommendedVideos"][$i]["authorId"].'" target="_parent">'.$r["recommendedVideos"][$i]["author"].'</a>
                                                                                </div>
                                                                                <div class="moduleFrameDetails"> Runtime: '.gmdate("H:i:s", $r["recommendedVideos"][$i]["lengthSeconds"]).'<br> Views: '.$r["recommendedVideos"][$i]["viewCount"].'<br> Comments: 1 </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>';
                                                            }
                                                            ?>
													</td>
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
						<!--<div style="font-weight: bold; color: #333; margin: 10px 0px 5px 0px;">Related tags:</div> {% for tag in videoTags %} <div style="padding: 0px 0px 5px 0px; color: #999;">»<a href="results.php?search={{ tag }}" target="_blank">{{ tag }}</a>
						</div> {% endfor %} --></td>
			</tr>
		</tbody>
	</table>
	</div>
	</td>
	</tr>
	</tbody>
	</table>
	<style>
		#flashcontent.video-player {
			width: 425px;
			height: auto;
		}

		#googlevideo-holder {
            width: 425px;
            height: 318px;
            background: black;
        }

		.controller {
			height: 16px;
			background-image: linear-gradient(#d9d9d9, #fff);
			display: flex;
			justify-content: space-between;
			align-items: center;
			border: 1px solid #000;
			border-radius: 4px;
			margin: 3px;
		}

		.controller .bar {
			background-color: #2c2c2c;
			border: 0;
			height: 3.3px;
			width: 100%;
		}

		.controller .play-toggle {
			background-image: url("yts/imgbin/player/play.png");
			background-color: transparent;
			background-position: center;
			border: 0;
			margin-left: 4px;
			margin-right: 2px;
			height: 14px;
			width: 14px;
		}

		.play .controller .play-toggle {
			background-image: url("yts/imgbin/player/pause.png");
		}

		.controller .mute-toggle {
			background-image: url("yts/imgbin/player/unmuted.png");
			background-color: transparent;
			background-position: center;
			border: 0;
			margin-left: 2px;
			margin-right: 4px;
			height: 14px;
			width: 14px;
		}

		.mute .controller .mute-toggle {
			background-image: url("yts/imgbin/player/muted.png");
		}
	</style></td>
	</tr>
	</tbody>
	</table> <?php include('includes/html/footer.php'); ?>
</body>

</html>