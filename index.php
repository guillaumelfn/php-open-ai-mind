<?php

// Fairly easy implementation of openAI in PHP. enjoy !
// PS- Thats the beauty of PHP. its easy !

// include this and you have completion !
require_once 'OpenAI.php';

$openai = New OpenAI();

// Please configure parameters of temperature, top p, frequency and presence penalty, best of, in includes/openAI.php, function configuration
// This is the prompt..

echo "You have an empty mind at disposal. Please state who this mind is.\n";
echo "In the form of MIND:You are a robot that knows everything about IT. You will answer any of my questions.\n\n";
$mind = readline("MIND:");

$prompt="";

while(1) {

  echo "Now, please Ask your question.\n";
  $question = (string)readline("Q:");

  $prompt .= "
  Q:".$question."
  A:";

// LEt's get a response.
// Usage : completion(model,start of question, length);
  $response = $openai->completion("text-davinci-003", $mind."\n".$prompt, 512);

// Let's get the answer from openAI within the response.
  $answer =(json_decode($response)->choices[0]->text);

  $prompt .=  $answer;

// Let's print both prompt and answer.
  echo "A:".$answer."\n";

}

?>
