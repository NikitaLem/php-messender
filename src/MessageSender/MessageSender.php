<?php 

namespace MessageSender;

class MessageSender
{
  private $endpointUrl;
  private $originator = "";
  private $msisdn = "";
  private $message = "";
  private $apiKey = "";
  private $channels = ['sms'];

  function __construct(string $endpoint = "backend_url")
  {
    $this->endpointUrl = $endpoint;
  }

  public function getOriginator(): string
  {
    return $this->originator;
  }
  
  public function setOriginator(string $originator): void
  {
    if (preg_match("/[a-z0-9]+/ui", $originator))
    {
      $this->originator = $originator;
    } else 
    {
      throw new Exception('Unexpected originator');
    }
  }

  public function getMsisdn(): string
  {
    return $this->msisdn;
  }
  
  public function setMsisdn(string $msisdn): void
  {
    if (preg_match("/[0-9]{6-15}/ui", $msisdn))
    {
      $this->msisdn = $msisdn;
    } else 
    {
      throw new Exception('Unexpected msisdn! Msisdn must be from 6 to 15 digits!');
    }
  }

  public function setMessage(string $message)
  {
    if (strlen($message) > 10) {
      $this->message = $message;
    } else
    {
      throw new Exception('Your message mast be more then 10 letters!');
    }
  }

  public function getMessage(): string
  {
    return $this->message;
  }

  public function setApiKey(string $apiKey)
  {
    if (strlen($apiKey)) {
      $this->apiKey = $apiKey;
    } else
    {
      throw new Exception('Api key too short!');
    }
  }

  public function getApiKey(): string
  {
    return $this->message;
  }

  public function setChannels(array $channels)
  {
    foreach($channels as $channel)
    {
      $this->channels[] = $channel;
    }
  }

  public function getChannels(): array
  {
    return $this->channels;
  }

}
