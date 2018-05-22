<script language="JavaScript">
var submitting = false;
$(document).ready(function()
{
    $('.waiting').hide();

    $('#profit_option').on('click','a.detach-option', function(e) {
        e.preventDefault();
        $('#profit_form').ajaxSubmit({target: "#profit_container", beforeSubmit: optionBeforeSubmit});
    });

    $('#profit_option').on('click','.choose-option', function(e) {
        e.preventDefault();

        if (!$('input[name="SettingsForm[ProfitOptions]"]').is(':checked')) {
            alert('Please choose the option!')
        }
        else {
            if($('#win_percentage').val()==='')
            {
                alert('Please field in the minimum percentage!')
            }else{
                $('#select-profit-form').ajaxSubmit({target: "#profit_container", beforeSubmit: optionBeforeSubmit});
            }
        }
    });


    $("#win_percentage").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

function optionBeforeSubmit(formData, jqForm, options)
{
    if (submitting)
    {
        return false;
    }
    submitting = true;
    $('.waiting').show();
}

</script>

