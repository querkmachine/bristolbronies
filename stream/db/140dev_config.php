<?php
/**
* 140dev_config.php
* Constants for the entire 140dev Twitter framework
* You MUST modify these to match your server setup when installing the framework
* 
* Latest copy of this code: http://140dev.com/free-twitter-api-source-code-library/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
* @version BETA 0.30
*/

// OAuth settings for connecting to the Twitter streaming API
// Fill in the values for a valid Twitter app
define('TWITTER_CONSUMER_KEY','Ok8Jj3I2bnhsOCcSY9uvVF4Pz');
define('TWITTER_CONSUMER_SECRET','8gh9Il0kTAOBMMXKwvNnM9pmNtSeiKzp7O6tUaEXjNdnVGFBU1');
define('OAUTH_TOKEN','730239216-oE3TpIUuPMGoKvPIbrKYrJn0dEHJoWdIlJFLBBBf');
define('OAUTH_SECRET','eO0mhaTkIuqBNe6VwG0UrgFXQCK1clyfK2RxveR2zb5dG');

// Settings for monitor_tweets.php
define('TWEET_ERROR_INTERVAL',10);
// Fill in the email address for error messages
define('TWEET_ERROR_ADDRESS','*****');
?>