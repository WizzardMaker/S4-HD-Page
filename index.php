<?php
error_reporting(-1);
ini_set("display_errors", 1);
require("functions.php");
?>

<!DOCTYPE html>
<html>

<head>
	<?php siteHeader() ?>
</head>

<body>
    <main>
		<!--<div class="s4-box banner">
			We are currenlty working on a known bug regarding the installer, please be patient while we fix the error
		</div>-->
        <div class="s4-box">
            <header>
				<img src="img/S4 HD EN Logo REV2 Made By SMALL.png" width="70%">
            </header>
            <p>Welcome to the Settlers 4 HD Patch page!</p>
            <p>This project aims to upscale every texture in Settlers 4 to HD using AI technology</p>
			<p>Only the Settlers 4 History Edition is supported</p>
            <hr />
            <table>
                <tr>
                    <th>Table of Contents:</th>
                </tr>
                <tr>
                    <td><a href="#screenshots">Screenshots</a></td>
                </tr>
                <tr>
                    <td><a href="#features">New Features</a></td>
                </tr>
                <tr>
                    <td><a href="#downloads">Download &amp; Requirements</a></td>
                </tr>
                <tr>
                    <td><a href="#credits">Credits</a></td>
                </tr>
            </table>
			
            <table>
                <tr>
                    <th>Other links:</th>
                </tr>
                <tr>
                    <td><a href="changelog.html">Changelog</a></td>
                </tr>
            </table>
        </div>

        <div class="s4-box" id="screenshots">
            <h1>Screenshots:</h1>
            <div class="image-grid">
                <div class="flex-center">
                    <h3>
                        Before:
                    </h3>
                    <h3>
                        After:
                    </h3>
                </div>
                <div class="flex-center">
                    <div class="zoom-container">
                        <img class="original-img" src="img/before/00-MainMenu.png">
                    </div>
                    <div class="zoom-container">
                        <img src="img/after/00-MainMenu.png">
                    </div>
                </div>
                <div class="flex-center">
                    <div class="zoom-container">
                        <img class="original-img" src="img/before/01-RandomMap.png">
                    </div>
                    <div class="zoom-container">
                        <img src="img/after/01-RandomMap.png">
                    </div>
                </div>
                <div class="flex-center">
                    <div class="zoom-container">
                        <img class="original-img" src="img/before/16-UI-HD.png">
                    </div>
                    <div class="zoom-container">
                        <img src="img/after/16-UI-HD.png">
                    </div>
                </div>
                <div class="flex-center">
                    <div class="zoom-container">
                        <img class="original-img" src="img/before/02-Map1.png">
                    </div>
                    <div class="zoom-container">
                        <img src="img/after/02-Map1.png">
                    </div>
                </div>
                <div class="flex-center">
                    <div class="zoom-container">
                        <img class="original-img" src="img/before/23-T-01.png">
                    </div>
                    <div class="zoom-container">
                        <img src="img/after/23-T-01.png">
                    </div>
                </div>
            </div>
        </div>


        <div class="s4-box" id="features">
            <h1>New Features:</h1>
            <p>The HD Patch comes with a few <span class="comment">(optional)</span> quality of life features, that will
                help newcomers and improve readability</p>
            <div class="feature-grid">

                <div>Custom UI Themes (per tribe setting):
                    <br>
                    <img width="400px" src="img/features/S3-UI.png">
                </div>
                <div>Custom font support:
                    <br>
                    <img src="img/features/Fonts.gif">
                </div>
                <div>Custom team color* support:
                    <br>
                    <img width="500px" src="img/features/Custom-Teams.png">
                    <br>
                    <span class="comment">*(local only)</span>
                </div>
                <div>Full color custom cursor:
                    <br>
                    <img width="500px" style="image-rendering: pixelated;" src="img/cursor.gif">
                </div>
                <div>New settings menu:
                    <br>
                    <img width="500px" src="img/features/Settings-UI.png">
                </div>
            </div>
        </div>

        <div class="s4-box" id="downloads">
            <h1>Download &amp; Requirements</h1>
			<p>Current versions:<br/>[Plugin] <?php echo getVersion("plugin")?><br/>[Assets] <?php echo getVersion("assets")?></p>
			<p>Check out the changelogs <a href="changelog.html">here</a></p>
			
			<hr/>
            <div>
                Download for the HD Patch Launcher (Current Version <?php echo getVersion("launcher")?>):
                <a href="https://settlers4-hd.com/data/patch/launcher/0.13.0/The_Settlers_IV_HD-Patch_Installer_Setup.exe"><button class="s4-button">Download</button></a><br>
                You do not need to download this if you have Settlers United, check your S4 settings to start the download!
            </div>
            <br>
            <hr />
            <p>
                The following minimum PC specs are needed:
            <ul>
                <li>OS: Windows 64bit</li>
                <li>Free Hard Drive Space: 10 GB</li>
                <li>GPU: DirectX 11 support with 2GB dedicated VRAM or higher*</li>
                <li>RAM: 8GB or higher</li>
                <li>Settlers 4 History Edition</li>
            </ul>
			<p class="comment">* If your card supports DirectX 11 but doesn't have 2GB dedicated VRAM (Like a Intel HD/Xe)
			then you can still download the HD Patch but you have to use the Lite mode, which can be toggled in the main menu settings</p>
            </p>

        </div>

        <div class="s4-box" id="support">
            <h1>Contact & Support</h1>
            <p>
                Did you experience any problems? Write us an email at
                <br/> <a href="mailto:support@settlers4-hd.com">support@settlers4-hd.com</a><br/>
                If you experienced a crash, try to include the settlers 4 hd patch log file and a crashdump, if available, in the game folder under /plugins/HDPatch
            </p>
        </div>
        <div class="s4-box" id="credits">
            <h1>Credits</h1>
            <p>The Settlers 4 HD Patch would not be possible without these people:
            <ul>
                <li><a target="_blank" href="https://github.com/WizzardMaker">WizzardMaker</a><br>Lead Developer of this
                    patch
                <li><a target="_blank" href="https://github.com/Cydra">Cydra</a><br>DirectX 11 Graphics Engineer of this
                    patch</li>
                <li><a target="_blank" href="https://github.com/kdsystem1337">kdsystem1337</a><br>Tester, motivational support, made SU HD Patch installer</li>
                <li><a target="_blank" href="https://github.com/nyfrk">nyfrk</a><br>His Mod API and help laid the
                    foundation this patch
                    rests on</li>
                <li><a target="_blank" href="https://discord.gg/6Tu7MMQVXh">The Settler 4 Community Patch
                        Team</a><br>They helped with beta testing and motivating &amp; thanks to Litze for starting the spark for this project</li>
					<li><a target="_blank" href="https://settlers-united.com/">Settlers United [SU]</a><br>The new home for a bug free Settlers 3 &amp; Settlers 4</li>
                <li>Thanks to all beta tester that helped me remove all bugs</li>
            </ul>
            </p>
			<br/> Want to say thank you? Sponsor the lead developer WizzardMaker:<br/> <iframe src="https://github.com/sponsors/WizzardMaker/button" title="Sponsor WizzardMaker" height="35" width="116" style="border: 0;"></iframe></li>
        </div>
    </main>
</body>

</html>