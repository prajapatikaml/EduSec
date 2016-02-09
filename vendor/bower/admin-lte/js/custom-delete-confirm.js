yii.allowAction = function ($e) {
    var message = $e.data('confirm');
    return message === undefined || yii.confirm(message, $e);
};
yii.confirm = function (message, ok, cancel) {
    bootbox.confirm(message, function (confirmed) {
       if (confirmed) {
         !ok || ok();
       } else {
         !cancel || cancel();
       }
    });
    return false;
}
