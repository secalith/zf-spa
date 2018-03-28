# Secalith Single Page Application #

v.: 0.1

Routemap:
* 0.1   Content and Pages
* 0.2   Forms, AJAX content
* 0.3   Auth, RBAC I, Events
* 0.4   Menu and Themes
* 0.5   Admin [basic], RBAC II
* 0.6   Blocks, APIs
* 0.7   Multiple Applications
* 0.8   Multi-source login and Register
* 0.9   Emails
* 0.10  Admin [advanced]
* 0.11  Multi Data Storage
* 0.12  Cache



### Prerequisites ###
* PHP-7.1 installed
* PHP extensions: intl, xml, mbstring, dom
* uses local *sqlite* database by default




## Page Concept ###
### Page Module ###

### Content Concept ###
if content attribute contains href, then in may be parsed with url helper on the servers side. Also, you may definde the data source with matchedRoute parameters;

### Content Module ###


## Form Contept ##

### Form Module ###
There are several ways of using the forms. One invloves the zf2-style factory backed forms, forms from config->forms specification or the secalith-spa way which involves using build-in form wizard/daemon

## TableData Module ##

##### TableData\Action\Delegator\CollectionViewDelegatorFacotry ####
##### TableData\Action\Delegator\ItemViewDelegatorFacotry ####

example configuration:
```php
'data_view' => [
// This one will be picked by ItemViewDelegatorFactory
    'user.list' => [ // name of the Route
        'service' => "User\\Table", // which service to call data from?
        'method' => 'listAll', // which method in the service to call?
        'data_param' => 'users', // index for $dataView, which is accessible accross the templates
    ],
// the following one will be processed by CollectionViewDelegatorFactory
    'user.read' => [
        'service' => "User\\Table",
        'method' => 'getItem',
        'data_param' => 'user',
        'params' => [
            [
                'param_name' => 'uid', // name for the param used to obtain the parameter for the original service
                'param_name_proxy' => 'uid', // the name under which the value is known for the initial service
                'service' => \Common\Helper\RouteHelper::class,
                'method' => 'getMatchedParam',
            ],
        ],
    ],
], // data_view
```
In the example we obtain user data for the user.read page. the database result generated with the config above is accessible inside ALL? templates as $pageData 

There is too much magic going on. As the project is in prototype stage it is kinda of acceptable. Definitely should be broken into dataSource module/submodule.

## User Module ##

### User Create ###
It is possible to create already activated (and reado-to-use) User. Also, it is possible to create user with email address not activated, address in such case should be verified by the owner.
In both cases it is possible to turn on or off the 3D Security.

Emails sent upon manual account creation (by another user):
* (optional) comfirmation email
* (optional) password request email

SMS sent
* (optional) mobile verification


## Custom JS ##
