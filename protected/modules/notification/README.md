notification
========

    If you want to use notification with roles, extensions like "rights" or RBAC are required.

    Be sure to have the same 'db' configuratiion in these files:
    protected/config/main.php
    protected/config/console.php
Now you just need to add module to confi file:

    'modules'=>array(
        'notification',
    ),

