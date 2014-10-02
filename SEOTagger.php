<?php
/**
 * @version		1.0
 * @package		kasey-moore.co.uk
 * @subpackage	system
 * @copyright	Copyright (C) 2013 http://www.kasey-moore.co.uk. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
//Define extension type
jimport('joomla.plugin.plugin');
// Call Class
class plgSystemSEOTagger extends JPlugin {
//Begin plugin calls
    function onAfterRender() {
        $app = JFactory::getApplication();
        $locale = $this->params->get('locale');
		$sitetwit = $this->params->get('sitetwit');
		$image1 = $this->params->get('image1');
		$fbadmin = $this->params->get('fbadmin');
		$appid = $this->params->get('appid');
		$sitename = $this->params->get('sitename');
		$authtwit = $this->params->get('authtwit');
		$twitteryn = $this->params->get('twitteryn');
		$analyticsyn = $this->params->get('analyticsyn');
		$analyticsid = $this->params->get('analyticsid');
		$googleyn = $this->params->get('googleyn');
		$googleid = $this->params->get('googleid');
		$bingyn = $this->params->get('bingyn');
		$bingid = $this->params->get('bingid');
		$yandexyn = $this->params->get('yandexyn');
		$yandexid = $this->params->get('yandexid');
		$canonicalyn = $this->params->get('canonicalyn');
		$publisheryn = $this->params->get('publisheryn');
		$publisherid = $this->params->get('publisherid');
		$contentryn = $this->params->get('contentryn');
		$locationyn = $this->params->get('locationyn');
		$lattitude = $this->params->get('lattitude');
		$longitude = $this->params->get('longitude');
		$streetaddress = $this->params->get('streetaddress');
		$locality = $this->params->get('locality');
		$postcode = $this->params->get('postcode');
		$country = $this->params->get('country');
		$homeurl = $this->params->get('homeurl');
		$phone = $this->params->get('phone');
		$email = $this->params->get('email');
		$robots = $this->params->get('robots');
		$baseyn = $this->params->get('baseyn');


		$locationogyn = $this->params->get('locationogyn');

		$active = JFactory::getApplication()->getMenu()->getActive();
		$description = JFactory::getDocument();
		$currenturl = JURI::current();
		$base = JURI::base();
	// Meta Facebook
		$code = "

		<meta property='og:locale' content='".$locale."'/>
		<meta property='og:type' content='article'/>
		<meta property='og:title' content='".$active->title."'/>
		<meta property='og:description' content='".$description->getDescription()."'/>
		<meta property='og:url' content='".$currenturl."'/>
		<meta property='og:fb:app_id' content='".$appid."'>
		<meta property='fb:admins' content='".$fbadmin."'/>
		<meta property='og:site_name' content='".$sitename."'/>
		<meta property='og:image' content='".$image1."'/>";
		if($twitteryn === "1"){$code2 = ' 
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@'.$sitetwit.'"/>
		<meta name="twitter:domain" content="'.$sitename.'"/>
		<meta name="twitter:image:src" content="'.$image1.'"/>
		<meta name="twitter:creator" content="@'.$authtwit.'"/>
		<meta itemprop="name" content="'.$active->title.'">
		<meta itemprop="description" content="'.$description->getDescription().'">
		<meta itemprop="image" content="'.$image1.'">';}else{$code2 = '';}
		
		if($analyticsyn === "1"){$code3 = "
		<script type='text/javascript'>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '".$analyticsid."']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

	</script>";}else{$code3 = '';};
	if($googleyn === "1"){$code4 = '
		<meta name="google-site-verification" content="'.$googleid.'" />';}else{$code4 = '';};
	if($bingyn === "1"){$code5 = '
		<meta name="msvalidate.01" content="'.$bingid.'" />';}else{$code5 = '';};
	if($yandexyn === "1"){$code6 = "
		<meta name='yandex-verification' content='".$yandexid."' />";}else{$code6 = '';};
	if($canonicalyn === "1"){$code7 = '
		<link rel="canonical" href="'.$currenturl.'" />';}else{$code7 = '';};
	if($publisheryn === "1"){$code8 = '
		<link href="https://plus.google.com/'.$publisherid.'" rel="publisher" />';}else{$code8 = '';};
	if($currenturl === $base && $locationogyn === "1" ){$code10 = '
		<meta property="og:latitude" content="'.$latitude.'">
		<meta property="og:longitude" content="'.$longitude.'">
		<meta property="og:street-address" content="'.$streetaddress.'">
		<meta property="og:locality" content="'.$locality.'">
		<meta property="og:region" content="'.$region.'">
		<meta property="og:postal-code" content="'.$postcode.'">
		<meta property="og:country-name" content="'.$country.'">';}else{$code10 = '';};
	if($currenturl === $base && $locationogyn === "1" ){$code11 = '
		<meta property="og:email" content="'.$email.'">
		<meta property="og:phone_number" content="'.$phone.'">';}else{$code11 ='';};
	if($robots === "none"){$code12 = '';}else{$code12 = '<meta name="robots" content="'.$robots.'">';};
	if($baseyn=== "1"){$code13 = '<base href="'.$base.'" target="_blank">';}else{$code13 = '';};

	if($contentryn === "1"){$code9 = '
		<script type="text/javascript">
    (function() {
      var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
      po.src = "https://apis.google.com/js/plusone.js?publisherid='.$publisherid.'";
      var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>';}else{$code9 = '';};


		
        $html = JResponse::getBody();
        $html = preg_replace("/<\/head>/", "\n\n" .$code12 .  $code .$code10. $code11. $code2. $code4. $code5. $code6. $code7. $code8. $code9. $code3. "\n\n</head>", $html);

        JResponse::setBody($html);      
        return true;
    }

}

?>
