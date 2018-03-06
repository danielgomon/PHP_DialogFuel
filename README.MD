### What is PHP DialogFuel?
PHP DialogFuel is a small API service to connect ChatFuel (Chatbot) to Dialogflow (AI). This service is a middle man than gets user input from ChatFuel, send it to Natural-language process in Dialogflow and get an answer in return.

- Supports PHP version 5.0+
- Only works with SSL hosting (https://)
- This include [**unirest-php**](https://github.com/Kong/unirest-php "**unirest-php**") for request service
- This is free for everyone

### How to setup
1. Pull requests or download PHP-Dialogfuel as zip.

2. Open the **Config.php** file and Change **ClientToken** and **DevToken** with your key (you can get it from your Dialogflow settings page).

```php
        <?php
    	$qversion = "20170712"; 
    	$lang = "en";
    	$ClientToken = "Client access token Here"; //Change this
    	$DevToken = "Developer access token Here"; // Change this
        ?>
```
	
3. Upload all the files in the folder **PHP_DialogFuel** to your SLL hosting.

4. You can test the connection to Dialogflow typing https://yoursite.com/filepath/DialogFuel.php?txttodialogflow=Hello&messenger_user_id=123456 in your web browser. If it's ok, it will show a greeting from the default welcome intent, something like this: `    {"messages":[{"text":"Hello!"}]}`

### Connect to ChatFuel bot
1. Go to your bot and select the **Default Answer** block.

2. Click **Chatfuel Plugins** and add the **User Input** plugins.

3. In the **User Input** card, find **SAVE ANSWER TO ATTRIBUTE** and type **{{txttodialogflow}}**

4. Click in **Chatfuel Plugins** and add **JSON API** plugin.

5. In the JSON API Card, select **GET** and in the **URL** enter the path to your DialogFuel.php file. (Ex. https://yoursite.com/filepath/DialogFuel.php) 

6. Finally, in the JSON API Card set **USER ATTRIBUTES** to **{{txttodialogflow}}** and **{{messenger user id}}**

7. If you want to use contexts from DialogFlow just add them in yor Chatfuel blocks as user attributes, exactly the same as they appear in DialogFlow (case sensitive). (Ex. **{{geo-country}}** or **{{given-name}}**).

8. Let's test!

[![](https://opdev.men/wp-content/uploads/2018/03/php-dialogfuel-chatfuel-connect.jpg)](https://opdev.men/wp-content/uploads/2018/03/php-dialogfuel-chatfuel-connect.jpg)

### Other
- [unirest-php](https://github.com/Kong/unirest-php "unirest-php")
- [Chatfuel](https://chatfuel.com "Chatfuel")
- [Dialogflow](https://dialogflow.com/ "Dialogflow")
- [OPDEV.MEN ](https://opdev.men "OPDEV.MEN ") (My site's)
- [Filólogos de Costa Rica](https://www.boreacr.com "Filólogos de Costa Rica ")
