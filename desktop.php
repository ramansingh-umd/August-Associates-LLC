		<?php include('bin/head.php'); ?>
		<link rel="stylesheet" type="text/css" href="/css/home.css">
		<!-- <link rel="canonical" href="https://www.augustassociatesllc.net/" /> -->
		<link rel="amphtml" href="https://www.m.augustassociatesllc.net/">
		<title>August Associates LLC - Rhode Island Real Estate</title>
		<meta name="description" content="August Associates is a real estate agency looking to help you buy or sell a home. North, South, East, West, your valued guide in real estate" />
	</head>
	<body>
		<?php include('bin/nav.php'); ?>
		<div id="homesSection" class="section">
			<div id='bigImage'>
				<img id="largeImage" src='/images/augustLargeLogo.png' alt='August Associates Logo'/>
				<img id='arrow' src='/images/arrow.png' alt='Arrow'/>
			</div>
			<div id="linkButtons">
				<a class="linkButton button" href="/find-homes">Find Your Perfect Home</a>
				<a class="linkButton button" href="/sell-your-home">Find Out What Your Home is Worth</a>
				<a class="linkButton button" href="/testimonials">See Our Testimonials</a>
			</div>
			<div id="houses">
				<div class="houseImageWrapper" onclick="window.location.href='/find-homes?searchCities=Cranston'">
					<img class="houseLink" alt="Cranston Image" src="/images/cranston.jpg"/>
					<p class="caption">Cranston</p>
				</div>
				<div class="houseImageWrapper" onclick="window.location.href='/find-homes?searchCities=Warwick'">
					<img class="houseLink" alt="Warwick Image" src="/images/warwick.jpg"/>
					<p class="caption">Warwick</p>
				</div>
				<div class="houseImageWrapper" onclick="window.location.href='/find-homes?searchCities=North-Kingstown'">
					<img class="houseLink" alt="North Kingstown Image" src="/images/nk.jpg"/>
					<p class="caption">North Kingstown</p>
				</div>
				<div class="houseImageWrapper" onclick="window.location.href='/find-homes?searchCities=East-Greenwich'">
					<img class="houseLink" alt="East Greenwich Image" src="/images/east.jpg"/>
					<p class="caption">East Greenwich</p>
				</div>
				<div class="houseImageWrapper" onclick="window.location.href='/find-homes?searchCities=Providence'">
					<img class="houseLink" alt="Providence Image" src="/images/providence.jpg"/>
					<p class="caption">Providence</p>
				</div>
			</div>
			<div id="whoMissionInfo">
				<div id='whoWrapper' class="whoSection">
					<h2 id='whoTitle'>Who We Are</h2>
					<p id='whoInfo'>Lorem ipsum nam porta nibh non arcu aliquet lobortis. Integer a egestas sem. Suspendisse lacinia erat sit amet turpis tempus auctor. Pellentesque cursus augue sapien, vitae consectetur diam lobortis ut. Pellentesque cursus augue sapien, vitae consectetur diam lobortis ut.</p>
				</div>
				<div id='missionWrapper' class="whoSection">
					<h2 id='missionTitle'>Our Mission</h2>
					<p id='missionInfo'>Lorem ipsum nam porta nibh non arcu aliquet lobortis. Integer a egestas sem. Suspendisse lacinia erat sit amet turpis tempus auctor. Pellentesque cursus augue sapien, vitae consectetur diam lobortis ut. Pellentesque cursus augue sapien, vitae consectetur diam lobortis ut.</p>
				</div>
			</div>
			<div id="searchBox">
				<h2 id="searchHomes">Search Homes</h2>
				<form id= "searchForm" method="POST" action="phpRequests/submitSearchForm">
					<div class="searchFormLine">
						<input name="searchAddresses" type="text" title="Addresses" id="searchAddresses" placeholder="Addresses" class="searchElement">
						<input name="searchCities" type="text" title="Cities" id="searchCities" placeholder="Cities" class="searchElement">
						<input name="searchZips" type="text" title="Zipcodes" id="searchZips" placeholder="Zipcodes" class="searchElement">
						<select name="searchPropertyType" id="searchPropertyType" title="Property Type" class="searchElement">
							<option title="Property Type" value="" selected>Property Type</option>
							<option title="Single Family" value="Single Family">Single Family</option>
							<option title="Rental" value="Rental">Rental</option>
							<option title="Multi Family" value="	2-4 Units Multi Family">Multifamily	</option>
							<option title="Condo" value="Condominium">Condo</option>
							<option title="Vacant Land" value="Vacant Land">Vacant Land</option>
						</select>
					</div>
					<div class="searchFormLine">
						<input name="searchMinPrice" type="text" title="Min Price" id="searchMinPrice" placeholder="Min Price" class="searchElement">
						<input name="searchMaxPrice" type="text" title="Max Price" id="searchMaxPrice" placeholder="Max Price" class="searchElement">
						<input name="searchBeds" type="number" title="Min Bedrooms" id="searchBeds" placeholder="Min Bedrooms" class="searchElement">
						<input name="searchBaths" type="number" title="Min Bathrooms" id="searchBaths" placeholder="Min Bathrooms" class="searchElement">
						<input name="searchMinFeet" type="number" title="Min Square Feet" id="searchMinFeet" placeholder="Min Square Feet" class="searchElement">
						<input name="searchMaxFeet" type="number" title="Max Square Feet" id="searchMaxFeet" placeholder="Max Square Feet" class="searchElement">
					</div>
					<div id="searchSubmitWrapper" class="searchFormLine">
						<button id="searchSubmit" class="searchElement">Search</button>
					</div>
				</form>
			</div>
			<iframe id="video" src="https://www.youtube.com/embed/l3QDvupOIbY?rel=0" allowfullscreen></iframe>
			<div id="infoContact">
				<div id="infoWrapper" class="infoSection">
					<h2 id="infoTitle">Our Info</h2>
					<div id="infoText">
						<p class="infoElement"><b>Phone: </b> (401) 461-0700</p>
						<p class="infoElement"><b>Email: </b><a href="mailto:jmccarthy@necompass.com">jmccarthy@necompass.com</a></p>
						<p class="infoElement"><b>Address: </b><a href="https://www.google.com/maps/place/946+Park+Ave,+Cranston,+RI+02910/@41.7808564,-71.4423498,17z/data=!3m1!4b1!4m5!3m4!1s0x89e44f0e74f416a7:0x9bb4c58a58a98e90!8m2!3d41.7808564!4d-71.4401611">946 Park Avenue, Cranston, RI</a></p>
					</div>
				</div>
				<div id="contactWrapper" class="infoSection">
					<h2 id="contactTitle">Contact Us</h2>
					<form id="contactForm" action="javascript:submitContactForm()">
						<input type="text" title="Name" id="contactFormName" placeholder="Name" class="contactFormElement" required>
						<input type="email" title="Email" id="contactFormEmail" placeholder="Email" class="contactFormElement">
						<input type="tel" title="Phone" id="contactFormPhone" placeholder="Phone Number" class="contactFormElement">
						<textarea rows="10" title="Text" id="contactFormText" placeholder="Enter your Message Here" class="contactFormElement" required></textarea>
						<button id="contactFormSubmit" class="contactFormElement">Submit</button>
					</form>
				</div>
				<div id="facebookWrapper" class="infoSection">
					<iframe id="facebookFrame" title="Facebook Page" src="https://www.facebook.com/plugins/page?href=https%3A%2F%2Fwww.facebook.com%2FJoseph-McCarthy-Real-Estate-Broker-642396402607701%2F&tabs=timeline&width=500&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId"></iframe>
				</div>
			</div>
		</div>
		<?php include('bin/footer.html'); ?>
		<script src="/js/home.js" async></script>
	</body>
</html>
