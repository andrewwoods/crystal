Crystal
=======

A re-usable catalogue of Perl compatible regular expressions for developers, 
that can be used in multiple languages such as Javascript, PHP, Perl, and Ruby. 
I'd like this to start with the most common expressions first - phone number, 
postal codes, hostnames, ip addresses, email addresses, credit card numbers. 
I'd like there also to be data files that contain both known good and bad data 
to be used with automated tests.

I'm thinking there should be 2 modes of checking - loose and strict. Emails are 
a good example. A strict email regex would be RFC compliant, while loose would 
check for characters and punctuation in the correct places. 

* expressions
	* commerce.txt 
		* ISBN
		* UPC
		* Credit Card Numbers
	* [country code].txt
		* phone
		* postal
	* internet.txt
		* email
		* hostnames
		* ip4 addresses
		* ip6 addresses
* data
	* commerce  [needed]
		* isbn.csv  [needed]
		* upc.csv [needed]
		* credit-card.csv [needed]
	* [country code]  {New countries needed all the time}
		* phone-loose.csv
		* postal.csv
		* currency.csv
	* internet
		* email.csv [needed]
		* hostnames.csv [needed]
		* ip4.csv 
		* ip6.csv [needed]



