$(document).ready(function() {
    $(document).on('change', '[name="data_auto"]', function () {
        if ($(this).is(':checked')) {
            var now = new Date();
            var formatted = now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + ' ' +
                String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0') + ':' +
                String(now.getSeconds()).padStart(2, '0');

            $('[name="data"]').val(formatted).trigger('change');
        }
    });
});

