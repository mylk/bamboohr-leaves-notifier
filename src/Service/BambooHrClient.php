<?php

namespace BambooHrLeavesNotifier\Service;

class BambooHrClient
{
	private $parameterBag;

	public function __construct($parameterBag)
	{
		$this->parameterBag = $parameterBag;
	}

	public function getEmployees()
	{
		$curl = curl_init();

		$headers = array(
			"Accept: application/json",
			"Authorization: Basic " . base64_encode(sprintf("%s:x", $this->parameterBag->get("bamboo_hr")["api_key"]))
		);

		$url = sprintf(
			"https://api.bamboohr.com/api/gateway.php/%s/v1/employees/directory",
			$this->parameterBag->get("bamboo_hr")["company_name"]
		);

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_FOLLOWLOCATION => true,
		]);

		// @TODO: do some error handling
		$content = json_decode(curl_exec($curl), true)["employees"];

		return $content;
	}
}
