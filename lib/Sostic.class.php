<?php

/***********************************************************
* #### Social Statistic Counter Class v0.0.1 ####
* Coded by Ican Bachors 2016.
* http://ibacor.com/labs/social-statistic-counter-class
* Updates will be posted to this site.
***********************************************************/
	
class Sostic
{

	function __construct($url, $facebook_access_token, $user_agent)
    {
		$this->user_agent = $user_agent;
		$this->url = rawurlencode($url);
		$this->facebook_access_token = $facebook_access_token;
    }
	
	private function yql($url)
	{
		$query = 'SELECT content FROM data.headers WHERE url="' . $url . $this->url . '" and ua="' . $this->user_agent . '"'; 		
		$yql = 'http://query.yahooapis.com/v1/public/yql?q=' . urlencode($query) . '&format=xml&env=http://datatables.org/alltables.env';		
		return file_get_contents($yql);
	}
	
	function google_plus()
	{
		$url = "https://plusone.google.com/_/+1/fastbutton?url=";
		$data = $this->yql($url);
		$counter = 0;
		if(preg_match('/window\.__SSR[\s*]=[\s*]{c:[\s*](\d+)/is', $data, $find))
		{
			$counter = $find[1];
		}		
		return $counter;
	}
	
	function vk()
	{
		$url = "http://vk.com/share.php?act=count&index=1&url=";
		$data = $this->yql($url);
		$counter = str_replace(array('VK.Share.count(1, ', ');'), '', $data);
		return $counter;
	}
	
	function pocket()
	{		
		$url = "https://widgets.getpocket.com/v1/button?label=pocket&count=horizontal&v=1&url=";
		$data = $this->yql($url);
		$counter = 0;
		if(preg_match("/&lt;em id=\"cnt\"&gt;(.*?)&lt;\/em&gt;/", $data, $find))
		{
			$counter = $find[1];
		}
		return $counter;
	}
	
	function stumbleupon()
	{		
		$url = "http://www.stumbleupon.com/services/1.01/badge.getinfo?url=";
		$json = file_get_contents($url . $this->url);
		$data = json_decode($json);		
		$counter = 0;
		if(!empty($data->result->views))
		{
			$counter = $data->result->views;
		}
		return $counter;
	}

    function bufferapp()
	{		
		$url = "https://api.bufferapp.com/1/links/shares.json?url=";
		$json = file_get_contents($url . $this->url);
		$data = json_decode($json);
		$counter = $data->shares;
		return $counter;
	}

    function facebook()
	{		
		$url = "https://graph.facebook.com/v2.7/?id=";
		$json = file_get_contents($url . $this->url . '&access_token=' . $this->facebook_access_token);
		$data = json_decode($json);		
		$counter = 0;
		if(!empty($data->share))
		{
			$counter = $data->share->share_count;
		}
		return $counter;
	}

    function linkedin()
	{		
		$url = "http://www.linkedin.com/countserv/count/share?url=";
		$json = file_get_contents($url . $this->url . '&format=json');
		$data = json_decode($json);		
		$counter = $data->count;
		return $counter;
	}

    function pinterest()
	{		
		$url = "https://api.pinterest.com/v1/urls/count.json?url=";
		$json = file_get_contents($url . $this->url);
		$json = str_replace('receiveCount(', '', $json);
		$json = str_replace('})', '}', $json);
		$data = json_decode($json);		
		$counter = $data->count;
		return $counter;
	}

    function reddit()
	{		
		$url = "http://www.reddit.com/api/info.json?url=";
		$json = file_get_contents($url . $this->url);
		$data = json_decode($json);		
		$counter = count($data->data->children);
		return $counter;
	}
	
}
