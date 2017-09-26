$(document).ready(function(){
  
    $(document).on('submit','#frm-add',function(){
        var frm = $(this);
        var type = frm.attr('method');
        var url = frm.attr('action');

        $.ajax({
            type:type,
            url:url,
            data:frm.serialize(),
            dataType:"json",
            success:function(data){
                if(data != false){
                    var table = $('#tbl-info-list');
                    var row = table.find('tbody');
                    row.append(data);
                    swal("success", "Info Added Successfully", "success");
                }else{
                    swal("error", "Info Already Exist", "error");
                }
            }
        });

    });


    $(document).on('click','.email-list',function(){
        var td = $(this);
        var id = td.data('id');
         $.ajax({
            type:"POST",
            url:"info.php",
            data:{id:id,"method":"view"},
            dataType:"json",
            success:function(data){
                if(data != false){
                    $('.modal-title').html('<b>Update Info<b>');
                    $('.input-id').val(data['id']);
                    $('.input-firstname').val(data['firstname']);
                    $('.input-lastname').val(data['lastname']);
                    $('.input-email').val(data['email']);
                    
                }else{
                    swal("error", "No Match ID Found", "error");
                }
            }
        });
        $('#modal-update').modal('show');
    });

    $(document).on('submit','#frm-update',function(){
        var frm = $(this);
        var id = $('.input-id').val();
        var type = frm.attr('method');
        var url = frm.attr('action');
        var table = $('#tbl-info-list');
        var row = table.find('tr th[data-id="'+id+'"]');
        
        $.ajax({
            type:type,
            url:url,
            data:frm.serialize(),
            dataType:"json",
            success:function(data){
                if(data != false){
                    row.closest('tr').replaceWith(data);
                    swal("success", "Info Added Successfully", "success");
                    $('#modal-update').modal('hide');
                }else{
                    swal("error", "Info Already Exist", "error");
                }
            }
        });
    });
    
});