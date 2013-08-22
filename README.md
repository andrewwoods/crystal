Crystal
=======

A re-usable catalogue of Perl compatible regular expressions for developers, 
that can be used in multiple languages such as Javascript, PHP, Perl, and Ruby. 
I'd like this to start with the most common expressions first - phone number, 
postal codes, hostnames, ip addresses, email addresses, credit card numbers. 
I'd like there also to be data files that contain both known good and bad data 
to be used with automated tests.

**Help me to improve this project. It needs more test data, more regular expressions,
and more people trying them out.**

I'm thinking there should be 2 modes of checking - loose and strict. Emails are 
a good example. A strict email regex would be RFC compliant, while loose would 
check for characters and punctuation in the correct places. 

* expressions
	* commerce.txt 
		* ISBN [needed]
		* UPC [needed]
		* Credit Card Numbers
	* [country code].txt
		* phone
		* postal
	* internet.txt
		* email
		* hostnames
		* ip4 addresses
		* ip6 addresses [needed]
* data
	* commerce  [needed]
		* isbn.csv  [needed]
		* upc.csv [needed]
		* credit-card.csv
	* [country code]  {New countries needed all the time}
		* phone-loose.csv
		* postal.csv
		* currency.csv
	* internet
		* email.csv [needed]
		* hostnames.csv [needed]
		* ip4.csv
		* ip6.csv [needed]


Get some help at the command line. Both long and short options are supported

	$ php test.php -h 
	$ php test.php --help 

This is an example of how to test a regex against a file of test data with US zip codes. 
The single quotes around the regex are important, to prevent any special shell
characters meanings. The / characters around the regex are delimiters. PHP uses
them to determine the beginning and end of the regex.

	$ php test.php --regex '/^\d{5}([\-]\d{4})?$/' --file data/us/postal.csv


