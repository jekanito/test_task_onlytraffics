$(function () {
    bsCustomFileInput.init();

    let select2bs4 = $('.select2bs4');
    let _token = $('input[name="_token"]').val();

    select2bs4.select2({
        theme: 'bootstrap4',
        tags: true,
        createTag: function (tag) {
            return {
                id: tag.term,
                text: tag.term,
                isNew : true
            };
        }
    }).on('select2:select', function (e) {
        if(e.params.data.isNew){
            let el = $(this);
            let old_id = e.params.data.id;
            let tag = e.params.data.id;

            $.ajax({
                method: 'POST',
                url: '/tags',
                data: {
                    name: tag,
                    _token: _token
                },
                success: function(data) {
                    el.find('[value="'+old_id+'"]').replaceWith('<option selected value="'+data.id+'">'+data.name+'</option>');
                }
            });
        }
    });
});
