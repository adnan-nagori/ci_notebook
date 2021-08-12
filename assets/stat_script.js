


    $(document).ready(function() {
        // $('#state_sel').on('change', function() {
        //     var stateID = $(this).val();
        //     alert(stateID);
        //     if(stateID) {
        //         $.ajax({
        //             url: '/adnan/ci_projects/ci_notebook/private_area/myformAjax/'+stateID,
        //             type: "GET",
        //             dataType: "json",
        //             success:function(data) {
        //                 alert(data);
        //                 console.log(data);
        //                 $('select[name="user_city"]').empty();
        //                 $.each(data, function(key, value) {
        //                     $('select[name="user_city"]').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
        //                 });
        //             }
        //         });
        //     }else{
        //         $('select[name="user_city"]').empty();
        //     }
        // });

        $('#state_sel').on('change', function() {
            var stateID = $(this).val();
            if(stateID != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>private_area/fetch_city",
                    method:"POST",
                    data:{stateID:stateID},
                    success:function(data)
                    {
                        $('#city_sel').html(data);
                    }
                });
            }
            else
            {
                $('#city_sel').html('<option value="">Select City</option>');
            }
        });
    });

