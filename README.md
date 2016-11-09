# Social-Statistic-Counter-Class
Social Statistic Counter Class  is a lightweight PHP script, allowing you to display the social media statistics counters of a site.

Sostic.class.php currently supports 9 social media sites:
- Google+
- Stumbleupon
- Facebook
- Linkedin
- Pinterest
- Bufferapp
- Reddit
- Vk
- Pocket

<h3>EXAMPLE:</h3>
<pre>&lt;?php

/* Param */
// url which will be seen statistics
$url = "http://whatever.com/bla/bla";
// your facebook access_token
$facebook_access_token = "12345xxxxxxxxxxxxxxx";
// user_agent
$user_agent = "#Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36";

/* Include Social Statistic Counter Class */
include_once("lib/Sostic.class.php");

/* Create object Social Statistic Counter */
$sostic = new Sostic($url, $facebook_access_token, $user_agent);

/* Get counter by social media name */
//$counter = $sostic-&gt;google_plus();
//$counter = $sostic-&gt;vk();
//$counter = $sostic-&gt;stumbleupon();
//$counter = $sostic-&gt;pocket();
//$counter = $sostic-&gt;bufferapp();
//$counter = $sostic-&gt;linkedin();
//$counter = $sostic-&gt;pinterest();
//$counter = $sostic-&gt;reddit();
$counter = $sostic-&gt;facebook();

/* Output counter */
echo 'Facebook share count: ' .$counter;
</pre>
