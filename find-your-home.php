		<?php include('bin/head.php');
			//logs into the database to get the rets data
			ini_set('memory_limit', '-1');
			require_once("phpRequests/keys.php");
			$conn = new mysqli("localhost", getDBUser(), getDBPassword(), getDBName());
			$query = "SELECT json_data FROM RetsData";
			$resultQuery = mysqli_query($conn, $query);
			$result = $resultQuery->fetch_assoc()['json_data'];
			$json = json_decode($result, true);
			for ($i = 0; $i < sizeof($json); $i++) {
				//looks through all the data to find the house with the right MLSNumber
				if ($json[$i]['MLSNumber'] == $_GET['id']) {
					$res = $json[$i];
					break;
				}
			}
			//house not found add 404
			if ($res == null) {
				require('404.php');
				die();
			}
		?>
		<link rel="stylesheet" type="text/css" href="/css/find-your-home.css">
		<link rel="canonical" href="https://www.augustassociatesllc.net/find-your-home" />
		<title>August Associates LLC - Find Your Home</title>
		<meta name="description" content="View your new home here. August Associates, your valued guide in real estate." />
	</head>
	<body>
		<?php include('bin/nav.php'); ?>
		<div id="yourHomeSection" class="section">
			<div id="infoWrapper">
				<?php
					//if the are photos, create a slideshow
					if ($res['PhotoCount']) {
						$total = $res['PhotoCount'];
						echo "<div id='houseSlideshow'>";
						//loops through photos to add them to the slideshow
						for ($i = 0; $i < $res['PhotoCount']; $i++) {
							//determines if the photo is a duplicate or doesn't exist
							if (!file_exists('images/largeRets/' . $res['MLSNumber'] . '/' . $i . '.jpg') && !file_exists('testing/images/largeRets/' . $res['MLSNumber'] . '/' . $i . '.jpg') || $i >= 1 && md5(file_get_contents('images/largeRets/' . $res['MLSNumber'] . '/' . ($i-1) . '.jpg')) == md5(file_get_contents('images/largeRets/' . $res['MLSNumber'] . '/' . $i . '.jpg'))) {
								//decreases the total number of photos
								$total--;
								continue;
							}
							//adds the image
							echo "<div class='houseWrapper'>
								<img src='images/largeRets/" . htmlspecialchars($res['MLSNumber']) . "/" . $i . ".jpg' alt='Picture of the House' class='houseImage'/>
							</div>";
						}
						if ($total) {
							echo "<a onclick='plusSlides(-1)' id='prev'>&#10094;</a>
								<a onclick='plusSlides(1)' id='next'>&#10095;</a>
							</div>
							<div id='dots'>";
							//adds a dot for each image
							for ($i = 0; $i < $total; $i++) {
								echo "<span class='dot' onclick='showSlides(" . $i . ")'></span>";
							}
						}
						echo "</div>";
					}
					echo "<h2 id='address'>" . htmlspecialchars(toSentenceCase($res['FullStreetNum'])) . ", " . htmlspecialchars($res['City']) . ", " . htmlspecialchars($res['StateOrProvince']) . ", " . $res['PostalCode'] . "</h2>
					<h2 id='price'>$" . htmlspecialchars(number_format((float) $res['ListPrice'])) . "</h2>
					<div id='tableAndDescription'>
						<p id='description'>" .  htmlspecialchars(toSentenceCase($res['PublicRemarks'])) . "</p>
						<table id='table'>";
						//determines which sqft to use
						$sqftVal = $res['SqFtTotal'] ? $res['SqFtTotal'] : $res['ApproxLotSquareFoot'];
						//adds attribute
						addAttribute("Square Feet", $sqftVal);
						//list of all attributes to use sorted by ['RetsName' => 'Visible name']
						$keys = ["BathsTotal" => "Bathrooms", "NumberOfLevels" => "Stories", "Fireplace"=> "Fireplaces", "HeatingSystem"=> "Heating", "BedsTotal"=> "Bedrooms", "Pool"=> "Pool", "WaterAmenities"=> "Water Amenities", "YearBuilt"=> "Year Built", "GarageSpaces"=> "Garage Spaces"];
						//adds all the attirbutes;
						foreach ($keys as $key => $value) {
							addAttribute($value, $res[$key]);
						}
						//determines the correct list office to use
						$listingOffice = $res['ListOfficeName'] ? $res['ListOfficeName'] : ($res['CoListOfficeName'] ? $res['CoListOfficeName'] : ($res['SellingOfficeName'] ? $res['SellingOfficeName'] : ($res['CoSellingOfficeName'] ? $res['CoSellingOfficeName'] : 'Listing Office Not Found')));
						//adds attribute
						addAttribute("Listing Office", $listingOffice);
						echo "<tr><th class='keys'>Source</th><td class='values'>Rhode Island MLS</td></tr>
						</table>
					</div>";
					echo "<h2 id='interested'>Interested in this Home?</h2>
					<h2 id='interestedContact'>Call us at <a href='tel:4014610700'>(401) 461-0700</a> or Email us at <a href='mailto:jmccarthy@necompass.com'>jmccarthy@necompass.com</a> to get in touch with an agent</h2>";
					$address = $res['FullStreetNum'] . ", " . $res['City'] . ", " . $res['StateOrProvince'];

					//capitolizes the first letter after spaces, ', and "
					function toSentenceCase($str) {
						return str_replace("\" ", "\"", ucwords(str_replace("\"", "\" ", strtolower(str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($str))))))));
					}

					//adds attribute to table
					function addAttribute($keyName, $value) {
						//converts ti int if it is a number and ensures its not 0
						if (is_numeric($value)) {
							$value = (int) $value;
							if (!$value) {
								return;
							}
						}
						//checks if value is valid
						if ($value == null || $value == "None") {
							return;
						}
						echo "<tr><th class='keys'>" . htmlspecialchars($keyName) . "</th><td class='values'>" . htmlspecialchars(str_replace("August Associates,  Llc", "August Associates LLC", toSentenceCase(str_replace(",", ", ", $value)))) . "</td></tr>";
					}
				?>
				<div id="map"></div>
				<div id="useInfoWrapper">
					<h6 id="useInfo">“IDX information is provided exclusively for consumers’ personal, non-commercial use and may not be used for any purpose other than to identify prospective properties consumers may be interested in purchasing. Information is deemed reliable but is not guaranteed.  © 2018 State-Wide Multiple Listing Service. All rights reserved.”</h6>
				</div>
			</div>
		</div>
		<?php include('bin/footer.html'); ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTXHu0_banpDsOMFQSDHOxoqdooVQxreI"></script>
		<script src="/js/find-your-home.js"></script>
		<script>
			//inits map to position
			initMap('<?php echo json_encode([$res['Latitude'], $res['Longitude']]);?>');
		</script>
	</body>
</html>
