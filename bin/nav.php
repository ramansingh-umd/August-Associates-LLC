<?php
	require_once '../vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ($detect->isMobile() || substr($_SERVER[HTTP_HOST], 0, 5) == "www.m" || $_SERVER[HTTP_HOST][0] == 'm') {
		echo "<nav id='mobileNav'><div id='mobileAugustSloganWrapper'><h1 id='mobileAugustName'>August Associates LLC</h1><h2 id='mobileAugustSlogan'>Your Valued Guide in Real Estate</h2></div><div id='menuToggle'><input type='checkbox'/><span id='span1'></span><span id='span2'></span><span id='span3'></span><div id='menuBackground'></div><div id='menu'><a href='/' id='homeNav' class='mobileNavitem'>Home</a><a href='/find-homes' id='findNav'class='mobileNavitem'>Find Homes</a><a href='/sell-your-home' id='sellNav' class='movileNavitem'>Sell Your Home</a><a href='/mortgage' id='mortgageNav' class='mobileNavitem'>Mortgage Calculator</a><div id='mobileAgentsWrapper'><a href='#' id='mobileAgentsNav' class='mobileNavitem'>Agents</a><div id='mobileAgentsList'><a href='/agents/joseph' id='josephNav' class='mobileSubNavitem'>Joseph McCarthy</a><a href='/agents/wendy' id='wendyNav' class='mobileSubNavitem'>Wendy Grave</a></div></div><a href='/testimonials' id='testimonialsNav' class='mobileNavitem'>Testimonials</a><a href='/contact' id='contactNav' class='mobileNavitem'>Contact Us</a></div></div></nav>";
	} else {
		echo "<nav id='desktopNav'><div id='augustSloganWrapper'><h1 id='augustName'>August Associates LLC</h1><h2 id='augustSlogan'>Your Valued Guide in Real Estate</h2></div><div id='menuItems'><a href='/' id='homeNav' class='desktopNavitem'>Home</a><a href='/find-homes' id='findNav' class='desktopNavitem'>Find Homes</a><a href='/sell-your-home' id='sellNav' class='desktopNavitem'>Sell Your Home</a><a href='/mortgage' id='mortgageNav' class='desktopNavitem'>Mortgage Calculator</a><div id='agentsWrapper'><a href='#' id='agentsNav' class='desktopNavitem'>Agents</a><div id='agentsList'><a href='/agents/joseph' id='josephNav' class='desktopSubNavitem'>Joseph McCarthy</a><a href='/agents/wendy' id='wendyNav' class='desktopSubNavitem'>Wendy Grave</a></div></div><a href='/testimonials' id='testimonialsNav' class='desktopNavitem'>Testimonials</a><a href='/contact' id='contactNav' class='desktopNavitem'>Contact Us</a></div></nav>";
	}
?>
