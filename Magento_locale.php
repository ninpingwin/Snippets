<?php
	// Do stuff according to the locale
	
  // Find the locale
	$locale = Mage::app()->getLocale()->getLocaleCode();
	if ($locale == 'it_IT') {
	  // do stuff if on Italian Store
	} else {
	 // do stuff if on other store views
	}
?>
