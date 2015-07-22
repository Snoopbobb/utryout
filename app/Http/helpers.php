<?php 

/****************************************************************************************
					Function to remove spaces and replace with dashes for URL
	****************************************************************************************/	
	function seoUrl($string) {
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    
	    return $string;
	}

	function stateName($state_ab) {
		switch ($state_ab) {
			case "AL":
				return "Alabama";
				break;
			case "AK":
				return "Alaska";
				break;
			case "AZ":
				return "Arizona";
				break;
			case "AR":
				return "Arkansas";
				break;
			case "CA":
				return "California";
				break;
			case "CO":
				return "Colorado";
				break;
			case "CT":
				return "Connecticut";
				break;
			case "DE":
				return "Delaware";
				break;
			case "FL":
				return "Florida";
				break;
			case "GA":
				return "Georgia";
				break;
			case "HI":
				return "Hawaii";
				break;
			case "ID":
				return "Idaho";
				break;
			case "IL":
				return "Illinois";
				break;
			case "IN":
				return "Indiana";
				break;
			case "IA":
				return "Iowa";
				break;
			case "KS":
				return "Kansas";
				break;
			case "KY":
				return "Kentucky";
				break;
			case "LA":
				return "Louisana";
				break;
			case "ME":
				return "Maine";
				break;
			case "MD":
				return "Maryland";
				break;
			case "MA":
				return "Massachusetts";
				break;
			case "MI":
				return "Michigan";
				break;
			case "MN":
				return "Minnesota";
				break;
			case "MS":
				return "Mississippi";
				break;
			case "MO":
				return "Missouri";
				break;
			case "MT":
				return "Montana";
				break;
			case "NE":
				return "Nebraska";
				break;
			case "NV":
				return "Nevada";
				break;
			case "NH":
				return "New Hampshire";
				break;
			case "NJ":
				return "New Jersey";
				break;
			case "NM":
				return "New Mexico";
				break;
			case "NY":
				return "New York";
				break;
			case "NC":
				return "North Carolina";
				break;
			case "ND":
				return "North Dakota";
				break;
			case "OH":
				return "Ohio";
				break;
			case "OK":
				return "Oklahoma";
				break;
			case "OR":
				return "Oregon";
				break;
			case "PA":
				return "Pennsylvania";
				break;
			case "RI":
				return "Rhode Island";
				break;
			case "SC":
				return "South Carolina";
				break;
			case "SD":
				return "South Dakota";
				break;
			case "TN":
				return "Tennessee";
				break;
			case "TX":
				return "Texas";
				break;
			case "UT":
				return "Utah";
				break;
			case "VT":
				return "Vermont";
				break;
			case "VA":
				return "Virginia";
				break;
			case "WA":
				return "Washington";
				break;
			case "DC":
				return "Washington D.C.";
				break;
			case "WV":
				return "West Virginia";
				break;
			case "WI":
				return "Wisconsin";
				break;
			case "WY":
				return "Wyoming";
				break;
			case "Alberta":
				return "AB";
				break;
			case "British Columbia":
				return "BC";
				break;
			case "Manitoba":
				return "MB";
				break;
			case "New Brunswick":
				return "NB";
				break;
			case "Newfoundland & Labrador":
				return "NL";
				break;
			case "Northwest Territories":
				return "NT";
				break;
			case "Nova Scotia":
				return "NS";
				break;
			case "Nunavut":
				return "NU";
				break;
			case "Ontario":
				return "ON";
				break;
			case "Prince Edward Island":
				return "PE";
				break;
			case "Quebec":
				return "QC";
				break;
			case "Saskatchewan":
				return "SK";
				break;
			case "Yukon Territory":
				return "YT";
				break;
			default:
				return $state_name;
		}
	}