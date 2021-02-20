$(document).ready(function () {
    // check admin password is correct or not
    $('#current_pwd').keyup(function () {
        let current_pwd = $("#current_pwd").val();
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
            type:'post',
            url:'/admin/check-current-pwd',
            data:{current_pwd:current_pwd},
            success:function (resp) {
                if(resp === 'false'){
                    $('#chePwd').html('<font color="red"> Current Password is Incorrect</font>')
                }else if(resp === 'true'){
                    $('#chePwd').html('<font color="green"> Current Password is Correct</font>')

                }
            },
            error:function () {
                alert('Error');
            }
        })
    })
});
