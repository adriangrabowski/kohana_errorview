Kohana Error View library
====================

Instalation
====================

To add kohana/errorview to Your composer file please add:

```json
"repositories": [
		{
			"type": "vcs",
			"url":  "https://bitbucket.org/adriangrabowski/kohana_errorview.git"
		}
]
```

and add library in require section:

```json
"kohana/errorview": "dev-master"
```


To enable module paste this code in bootstrap.php

```php
Kohana::modules(array(
    'errorview'   	=> MODPATH.'errorview',
));
```

Example
====================

New Error View from kohana/errorview
![alt text](https://image.ibb.co/nquXbo/2.png "Logo Title Text 1")

Current Kohana Error View
![alt text](https://image.ibb.co/hDu9NT/1.png "Logo Title Text 1")


Make some fun with a bugs
![alt text](https://image.ibb.co/kSMLwo/4.png "Logo Title Text 1")

You can configure background image in error.php file like that:
![alt text](https://image.ibb.co/i9EJhT/5.png "Logo Title Text 1")

