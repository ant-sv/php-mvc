;'use strict';
document.addEventListener( 'DOMContentLoaded', Ready );

function Ready() {
    
    const d = document;
    const w = window;
    const log = console.log.bind(console);

    try {

        var id;

        $('#upload-modal').on('show.bs.modal', function (e) {

            var button = $(e.relatedTarget),
                address = button.data('address'),
                modal = $(this);

            id = button.data('id');

            modal.find('h6').text('Добавить файл к объекту ' + address);
        });

        $('#file-to-upload').on('change', function(e) {
            // get the file name
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass('selected').text(fileName);
        });

        $('form#upload-form').submit(function(e) {

            e.preventDefault();
            
            var formData = new FormData(this), // $(this)
                submit = $(this).find('input[type=submit]'),
                submitValue = submit.val();

            formData.append('id', id);
            // submit.prop('disabled', true);
            // submit.attr('value', 'Загрузка..'); // submit.val('Загрузка..');
            sendFormData('/manage/upload', formData);

            return false;
        });
    }
    catch(ex) {

        log(ex.stack);
    }

    // info
    try {

        var id;
        
        $('#edit-info-modal').on('show.bs.modal', function (e) {

            var button = $(e.relatedTarget),
                tds = button.closest('tr').find('td'),
                modal = $(this);

            modal.find('#edit-title').html(tds[1].innerHTML);
            modal.find('#edit-value').html(tds[2].innerHTML);

            id = button.data('id');

            button.data('sub') ?
                modal.find('#sub').addClass('d-none') :
                modal.find('#sub').removeClass('d-none');
        });

        $('form#edit-info-form').submit(function(e) {

            e.preventDefault();
            var input = $('input[type=submit][clicked=true]')[0];

            if (!input) return;

            var action = $('input[type=submit][clicked=true]')[0].name;

            if ( action === 'delete' && !confirm('Удалить запись?')) return;

            var formData = new FormData(this);
            formData.append('id', id);
            formData.append('action', action);
            sendFormData('/info/edit', formData);

            return;
        });

        $('form#add-info-form').submit(function(e) {

            e.preventDefault();
            var formData = new FormData(this);
            sendFormData('/info/add', formData);

            return;
        });

        $('form#add-subinfo-form').submit(function(e) {

            e.preventDefault();
            var formData = new FormData(this);
            formData.append('id', id);

            sendFormData('/info/add', formData);

            return;
        });

        $('#sub').click(function() {

            $('#edit-info-modal').modal('hide');
        });

        $('form#edit-info-form input[type=submit]').click(function() {

            $('input[type=submit]', $(this).parents('form')).removeAttr('clicked');
            $(this).attr('clicked', 'true');
        });
    }
    catch(ex) {

        log(ex.stack);
    }

    // contacts
    try {

        var id;

        $('#edit-cont-modal').on('show.bs.modal', function (e) {

            var button = $(e.relatedTarget), // Button that triggered the modal
                tds = button.closest('tr').find('td'),
                modal = $(this);

            id = button.data('id');

            modal.find('#cont-title').html(tds[1].innerHTML);
            modal.find('#cont-value').html(tds[2].innerHTML);

            // modal.find('h6').text('Добавить файл к объекту ' + address);
            // modal.find('.modal-title').text('New message to ' + recipient);
            // modal.find('.modal-body input').val(recipient);
        });

        $('form#edit-cont-form').submit(function(e) {

            e.preventDefault();
            var action = $('input[type=submit][clicked=true]')[0].name;

            if ( action === 'delete' && !confirm('Удалить запись?')) return false;

            var formData = new FormData(this);
            formData.append('id', id);
            formData.append('action', action);
            sendFormData('/contacts/edit', formData);

            return;
        });

        $('form#add-cont-form').submit(function(e) {

            e.preventDefault();
            var formData = new FormData(this);
            sendFormData('/contacts/add', formData);

            return;
        });

        $('form#edit-cont-form input[type=submit]').click(function() {

            $('input[type=submit]', $(this).parents('form')).removeAttr('clicked');
            $(this).attr('clicked', 'true');
        });
    }
    catch(ex) {

        log(ex.stack);
    }

    try {

        d.getElementById('ae').addEventListener('click', clickEvent);
    }
    catch(ex) {

    	log(ex.stack);
    }

    try {

        d.getElementById('accordion').addEventListener('click', deleteElement);
    }
    catch(ex) {

        log(ex.stack);
    }

    function sendFormData(url, formData)
    {
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                location.reload();
                // log(data);
            },
            error: function(data) {
                // submit.attr('value', submitValue);
                // submit.prop('disabled', false);
                log(data);
                alert('Ошибка загрузки');
            },
            // complete: function(data) { log(data.responseText) },
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function deleteElement(e) {

        if (e.target.classList.contains('del-address') && confirm('Удалить адрес?')) {

            location.replace('/manage/del_address/' + e.target.getAttribute('data-id'));
        }

        if (e.target.classList.contains('del-file') && confirm('Удалить файл?')) {

            location.replace('/manage/del_file/' + e.target.getAttribute('data-file'));
        }
    }

    var clickNum, timeout;

    function clickEvent(e) {
        // e = Mouse click event.
        var rect = e.target.getBoundingClientRect();
        var h = e.target.clientHeight;
        var w = e.target.clientWidth;
        var x = e.clientX - rect.left; //x position within the element.
        var y = e.clientY - rect.top;  //y position within the element.

        if (w-h < x) {

            if (timeout)
            	clearTimeout(timeout);
            else
            	clickNum = 0;
            
            if (clickNum++ === 10) {

                try {

                    d.getElementById('af').classList.remove('h-0');
                    $('#inputPassword').focus();
                }
                catch(ex) {

                    log(ex.stack);
                }
                
                e.target.removeEventListener('click', clickEvent);
                return;
            }

        timeout = setTimeout(function() { timeout = false; }, 1000);

        }
    }
}
