<?php
error_reporting(-1);
ini_set("display_errors", 1);
require("functions.php");

function generate_list($items){
	$additionHTML = "<ul>\n";
	foreach($items as $addition){
		if($addition == "§break§"){
			$additionHTML .= "<br/>";
		}else if($addition == "§line-break§"){
			$additionHTML .= "<br/><hr/>";
		}else{
			$additionHTML .= "<li>$addition</li>";
		}
	}
	$additionHTML .= "</ul>\n";

	return $additionHTML;
}

function generate_topic($baseChanges, $header){
	$versionText = $baseChanges["version"];

	$additionHTML = "<p><b>$header Version</b><br/>$versionText</p>";
	
	if(array_key_exists("additions", $baseChanges)){
		$additionHTML .= "<h3 class=\"left white\">Additions:</h3>\n";
		$additionHTML .= generate_list($baseChanges["additions"]);
	}
	
	if(array_key_exists("fixes", $baseChanges)){
		$additionHTML .= "<h3 class=\"left white\">Fixes:</h3>\n";
		$additionHTML .= generate_list($baseChanges["fixes"]);
	}
	
	if(array_key_exists("changes", $baseChanges)){
		$additionHTML .= "<h3 class=\"left white\">Changes:</h3>\n";
		$additionHTML .= generate_list($baseChanges["changes"]);
	}
	
	if(array_key_exists("improvements", $baseChanges)){
		$additionHTML .= "<h3 class=\"left white\">Improvements:</h3>\n";
		$additionHTML .= generate_list($baseChanges["improvements"]);
	}

	return $additionHTML;
}

function changelog_box($id, $date, $pluginChanges, $assetChanges = null, $additionalChanges = array()){
	$innerText = "<h2>Changelog $date</h2>\n";
	if($pluginChanges != null){
		$innerText .= generate_topic($pluginChanges, "Plugin");
	}

	if($assetChanges != null){
		$innerText .= generate_topic($assetChanges, "Asset");
	}

	foreach($additionalChanges as $change){
		$innerText .= generate_topic($change["data"], $change["header"]);
	}


	box($innerText,$id);
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php siteHeader() ?>
</head>

<body>
    <main>
		<div class="s4-box" id="header">
			<a class="float-left" href="/#downloads">Back</a>
            <h1>Changelogs</h1>
			<p>Welcome to the Settlers 4 HD Patch changelog!</p>
			<p>Overall changelog of the HD Patch:</p>
			<h3 class="left white">HD Patch additions</h3>
			<ul>
				<li>AI upscaled HD textures (units, buildings, ground, many more..)</li>
				<li>Widescreen main menu</li>
				<li>Improved text rendering</li>
				<li>HD ingame menu</li>
				<li>DirectX 11 rendering backend for improved color accuracy and FPS</li>
				<li>Real unit shadows (No checkerboard shadows)</li>
				<li>Improved (particle) effects</li>
				<li>New full color mouse cursor</li>
				<li>Texture pack support (to replace menus or other textures)</li>
				<li>Labels for buildings in the menu</li>
			</ul>
			<h3 class="left white">HD Patch fixes</h3>
			<ul>
				<li>Fixed wrong color of the stats. menu circle of the white player</li>
				<li>Fixed the selection icon of the last trojan beauty building which had a mayan building</li>
                <li>Fixed the selection icon of the maya iron mine which had a older mayan building</li>
			</ul>
			
			<hr/>
			
			<h3 class="left white">Known bugs/Missing features:</h3>
			<ul>
				<li>Not all HDified cursors are implemented yet</li>
				<li>Tutorial assets (Arrows, chat) aren't correctly rendered</li>
            </ul>
		</div>

		<?php
		    changelog_box("CL2023-3", "04.03.2023",
		                            //Plugin
		                            array("version"=>"0.16.0 -> 0.16.1",
	                                    "fixes"=>array(
											"Fixed lobby chat alignment",
											"Fixed mission text not updating correctly when switching missions",
											"Fixed lobbies not correctly clearing in lobby select screen",
											"Fixed time not rendering when activated with Settlers United",
											"Fixed Lite-Mode detection for first run",
										),
									),
                                    null
	        );

		    changelog_box("CL2023-2", "01.03.2023",
		                            //Plugin
		                            array("version"=>"0.15.1 -> 0.16.0",
	                                    "fixes"=>array(
											"Fixed crash on startup for various system configurations (This should be one of the last remaining crash reasons, so if you ever experienced any issues, now would be a great time to play again)",
											"Fixed terrain flicker during zoom out",
											"Fixed player names not getting cleared in lobby screen",
											"Fixed formatting for various text elements in menus",
											"Fixed chat not supporting caret movement",
											"Fixed chat not correctly wrapping text input",
											"Fixed ingame chat text input being in the wrong color (uses now the ingame text input color blue)",
											"Fixed stats divider lines wrapping",
											"Fixed stats header formatting",
										),
										"improvements"=>array(
											"Improved render caching of terrain resulting in more FPS"
										),
										"additions"=>array(
											"Added support for automatic Windows DPI scaling - enable the option for that in the settings (Default setting is 'enabled')",
											"Added option for bigger font for 'Round Timer' - which can be enabled in the settings menu"
										)
									),
                                    null
	        );

		    changelog_box("CL2022-8", "14.08.2022",
		                            //Plugin
		                            array("version"=>"0.15.0 -> 0.15.1",
	                                    "fixes"=>array(
	                                        "Fixed wrong minimap color on some occasions when flood filling eco sectors",
	                                        "Fixed wrong colors in the stats screen (Settlers United only)",
	                                        "Fixed CTD when changing to Non-HD in the main menu",
	                                        "Fixed possible CTD on startup",
	                                        "Removed default active vsync setting")),
                                    null,
                                    array(//Additionals:
										array(//Installer
											"header"=>"Installer",
											"data"=> array(
												"version"=>"0.12.4 -> 0.13.0",
												"additions"=>array(
												    "Added a 'current installer version' info"
												),
												"fixes"=>array(
													"Fixed bug where the installer would corrupt the install, if a previous, larger, download was still in the cache"
												)
											)
										)
									)
	        );
		
			changelog_box("CL2022-7", "01.08.2022",
									//Plugin
									array("version"=>"0.14.1 -> 0.15.0",
										"additions"=>array(
											"Improved performance on systems with a NVIDIA gpu",
											"Added experimental support for v-sync and frame limiting",
											"Custom Team color is also now applied to the stats graph and minimap",
											"Added new system to color individual textures - this enables the custom team color for elements like border stones, flags and the team ui elements<br/><img style='margin-right:50px' height=\"300px\" src=\"img/changelog/borderStones.png\"/><img style='margin-right:50px' width=\"500px\" src=\"img/changelog/teamIcons.png\"/><img height='250px' src='img/changelog/minimapColor.gif'/>",
											"§line-break§",
											"Added new effect system",
											"Added new ambient occlusion effect",
											"Added new sharpening effect <br/><div style='width:650px' class='zoom-container'> <img class='left-zoom' width='650px' src='img/changelog/effects.gif'/></div>",
											"§line-break§",
											"Added new settings to change the team colors with sliders",
											"Added full settings menu to the ingame menu (can be found under Settings -> Graphics <br/>- only the color is updated while being changed, for other settings to take effect, close the menu again) <br/><br/><img width='500px' src='img/changelog/ingameMenu.png'>"
										),
										"fixes"=>array(
											"Fixed possible CTD on startup on various systems",
											"Fixed build progress not correctly displaying for ships and war machines",
											"Fixed text color of enemies in the player overview menu ingame"
										)
									),
									//Assets
									array("version"=>"0.9.1-Beta -> 0.10.0-Beta",
										"additions"=>array(
											"Added more cursors",
											"Changed the team color preview icon to a more refined version<img style='position:relative;top:10px;left:10px' width='40px' src='img/changelog/teamColorPreviewNew.png'/>"
										)
									)
								);
											
			changelog_box("CL2022-6", "20.02.2022",
									//Plugin:
									array("version"=>"0.14.0 -> 0.14.1",
										"additions"=>array(
											"Added option to disable the orange chat text color of game notifications",
											"Added C API to add your custom plugin settings to the main menu HD settings menu"),
										"fixes"=>array(
											"Fixed a possible CTD on startup",
											"Added error message when an unsupported GPU is being used"
										),
										"changes"=>array(
											"Crash handler now always shows the 'additional information' panel before sending a crash report"
										)
									)
								);

			changelog_box("CL2022-5", "14.02.2022", null, null, 
									array(//Additionals:
										array(//Installer
											"header"=>"Installer",
											"data"=> array(
												"version"=>"0.12.3 -> 0.12.4",
												"fixes"=>array(
													"Fixed bug where the installer wouldn't correctly apply a delta patch when the base download was corrupt/missing"
												)
											)
										)
									)
								);
		?>
	    <div class="s4-box" id="CL2022-6">
		    <h2>Changelog 20.02.2022</h2>
		    <p><b>Plugin Version</b><br/>0.14.0 -> 0.14.1</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>Added option to disable the orange chat text color of game notifications</li>
				<li>Added C API to add your custom plugin settings to the main menu HD settings menu</li>
			</ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Fixed a possible CTD on startup</li>
				<li>Added error message when an unsupported GPU is being used</li>
			</ul>
			<h3 class="left white">Changes:</h3>
			<ul>
				<li>Crash handler now always shows the 'additional information' panel before sending a crash report</li>
			</ul>
		</div>
	    <div class="s4-box" id="CL2022-5">
		    <h2>Changelog 14.02.2022</h2>
		    <p><b>Installer Version</b><br/>0.12.3 -> 0.12.4</p>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Fixed bug where the installer woulnd't correctly apply a delta patch when the base download was corrupt/missing</li>
			</ul>
		</div>
	    <div class="s4-box" id="CL2022-4">
            <h2>Changelog 13.02.2022</h2>
            <p><b>Plugin Version</b><br/>0.13.1 -> 0.14.0</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>New crash reporting tool - this should help me help you with (voluntary) automatic crash report sending
				    <ul>
				        <li>This is still very experimental, please report any bugs or error messages related to this!</li>
				    </ul>
				</li>
				<li>New and improved settings menu (WIP game settings added aswell - toggle audio settings directly in the main menu!)</li>
				<li>Automatic lite mode activation</li>
				<li>Added sounds for custom HD patch buttons</li>
			</ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Fixed rare CTD reason when skipping videos</li>
				<li>Possible fix for a CTD on some GPUs</li>
				<li>Fixed wrong settler team color mask calculation leading to misaligned colors on some viking settlers</li>
				<li>Fixed S4 not closing in a timely manner</li>
				<li>Videos that are not yet HD should now be visible (Bug: only sound when watching campaign videos)</li>
			</ul>
			<hr/>
            <p><b>Asset Version</b><br/>0.8.1-Beta -> 0.9.0-Beta</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>Added old world ground textures</li>
				<li>Improved main menu visuals (New HD Patch logo and cleaner background image)</li>
			</ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Fixed shadows on dark tribe</li>
			</ul>
	        <p><b>Installer Version</b><br/>0.9.2 -> 0.12.3</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>Added resumable downloads (even after closing the installer)</li>
				<li>Added delta patching support (if you already have a downloaded version installed and a delta patch is available, then you only download the much smaller delta)</li>
			</ul>
        </div>
	    <div class="s4-box" id="CL2022-3">
            <h2>Changelog 15.01.2022</h2>
            <p><b>Asset Version</b><br/>0.8-Beta -> 0.8.1-Beta</p>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Added missing dark tribe texture</li>
			</ul>
		</div>
		
		<h1>Open Beta Release 14.01.2022</h1>
		<hr style="max-width: 1500px;"/>
		
	    <div class="s4-box" id="CL2022-2">
            <h2>Changelog 12.01.2022</h2>
            <p><b>Plugin Version</b><br/>CLOSED BETA 0.13.1 -> OPEN BETA 0.13.3</p>
			<h3 class="left white">Fixes:</h3>
			<ul>
				<li>Fixed video flickering regression bug</li>
				<li>Fixed missing sprite behind game over ui element</li>
				<li>Fixed various ui bugs due to missing/broken clearing</li>
				<li>Fixed red lines on beaches on NVIDIA hardware</li>
				<li>Fixed tooltip hidden under minimap/miniview (also asset change)</li>
			</ul>
		</div>
	    <div class="s4-box" id="CL2022-1">
            <h2>Changelog 09.01.2022</h2>
            <p><b>Plugin Version</b><br/>CLOSED BETA 0.11.3 -> CLOSED BETA 0.13.1</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>New lite mode for Intel HD/Xe, or GPUs with less than 2GB VRAM systems</li>
				<li>New settings menu in the main menu</li>
				<li>New credits menu in the main menu [kdsystem1337]</li>
				<li>New setting to disable the new selection box</li>
				<li>New subtle emboss effect for the minimap</li>
                <li>Added steps to f.o.w. levels (the deeper the object is in the f.o.w., the darker the object gets)</li>
                <li>New DX11 direct HWND rendering instead of the (legacy) S4 rendering<br/>
					This change brings the following improvements:
					<ul>
					<li>Better overall FPS</li>
					<li>No more color banding due to RGB565 limitations</li>
					</ul>
				</li>
            </ul>
			<h3 class="left white">Changes:</h3>
			<ul>
                <li>New FPS counter algorithm</li>
                <li>Changed language detection to use the game's language [kdsystem1337]</li>
            </ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
                <li>Fixed music/sound setting slider and pinned slider clearing too much</li>
                <li>Fixed missing team colors on some units while in the f.o.w.</li>
                <li>Fixed black terrain flickering on first zoom out</li>
                <li>Fixed wrong terrain texture lines</li>
                <li>Fixed black line on right side of menu</li>
                <li>Fixed 2 button zoom wrongfully triggering the selection box draw</li>
                <li>Improved Non-HD -> HD mode change (no longer black terrain)</li>
                <li>Fixed wrong font color/style of unit/building selection menu header</li>
                <li>Fixed menu loading state showing wrong assets on the blackscreen [kdsystem1337]</li>
            </ul>
			<hr/>
            <p><b>Asset Version</b><br/>CLOSED BETA 0.6-RC -> CLOSED BETA 0.7-RC</p>
			<h3 class="left white">Additions:</h3>
			<ul>
				<li>A new Settlers 3 inspired ingame UI was added (WIP and feedback is much appreciated!)</li>
			</ul>
			<h3 class="left white">Changes:</h3>
			<ul>
				<li>New, more discrete water waves</li>
			</ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
                <li>Fixed double shadow (too black) of the roman and trojan lookout tower</li>
                <li>Fixed miniview background bleed on some tribe menus</li>
                <li>Fixed dots under all rome menu items</li>
                <li>Added missing chat backgrounds</li>
                <li>Removed broken shadow on 'pinned slider' [kdsystem1337]</li>
            </ul>
        </div>
	
	    <div class="s4-box" id="CL2021-2">
            <h2>Changelog 19.12.2021</h2>
            <p><b>Plugin Version</b><br/>CLOSED BETA 0.11.2 -> CLOSED BETA 0.11.3</p>
			<h3 class="left white">Additions:</h3>
			<ul>
                <li>Added experimental support for DX 11.0 feature level</li>
                <li>Halved RAM usage of application</li>
                <li>Added background loading of the most important packages while in the menu</li>
                <li>Limited the package loader to stay within the RAM limits or else wait until space is free</li>
            </ul>
			<h3 class="left white">Changes:</h3>
			<ul>
                <li>Adapted AtlasGFXCollection to the .apak -> folder change (should improve loading times by ~35%)</li>
            </ul>
			<hr/>
            <p><b>Asset Version</b><br/>CLOSED BETA 0.5-RC -> CLOSED BETA 0.6-RC</p>
			<h3 class="left white">Additions:</h3>
			<ul>
                <li>Embedded menu assets like the tree and flower into the background [kdsystem1337]</li>
            </ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
                <li>Fixed the selection icon of the last trojan beauty building which had a mayan building (UBISOFT ERROR) [kdsystem1337]</li>
                <li>Fixed the selection icon of the maya iron mine which had a older mayan building (UBISOFT ERROR) [kdsystem1337]</li>
            </ul>
			<h3 class="left white">Changes:</h3>
			<ul>
                <li>Upgraded the ingame menu assets to a newer AI revision</li>
                <li>.apak files are now distributed as folders</li>
            </ul>
        </div>
	
        <div class="s4-box" id="CL2021">
            <h2>Changelog 11.12.2021</h2>
            <p><b>Plugin Version</b><br/>CLOSED BETA 0.11.1 -> CLOSED BETA 0.11.2</p>
			<h3 class="left white">Additions:</h3>
			<ul>
                <li>Added minimap camera rectangle</li>
                <li><b>BREAKING CHANGE</b> Transitioned the language setting from "LANG-CULTURE" to just "LANG" ("de-DE" -> "de")</li>
            </ul>
			<h3 class="left white">Fixes:</h3>
			<ul>
                <li>Fixed non HD movies being overdrawn from the menu</li>
                <li>Fixed the missing color on vehicles</li>
                <li>Updated the wording on a few text elements [kdsystem1337]</li>
                <li>Updated the default color of purple and cyan to better match the original [kdsystem1337]</li>
            </ul>
			<hr/>
            <p><b>Asset Version</b><br/>CLOSED BETA 0.4-RC -> CLOSED BETA 0.5-RC</p>
			<h3 class="left white">Additions:</h3>
			<ul>
                <li>Added the dark tribe vehicles</li>
                <li>Added motion blur to the dark tribe copters<br/><img width="350px" src="/img/changelog/motion-blur.png"/></li>
            </ul>
			
			<h3 class="left white">Fixes:</h3>
			<ul>
                <li>Fixed the wrong color of the team color circle on the stats. menu (UBISOFT ERROR) [kdsystem1337]</li>
                <li>Fixed wrong sizing of butterflies</li>
                <li>Removed old/unused files</li>
            </ul>
        </div>
    </main>
</body>

</html>
