
$(document).on('click', '.filter-btns', function (e) {
    
    var param1 = param2 = '';
    var filterFlag = '1';

    $(".filter-btns").removeClass('active');
    $(this).addClass('active');
    $("#filter_dateRange").val('');

    var flag = $(this).attr('data-filter');
    if(flag == 'today'){

        param1 = moment().format('YYYY-MM-DD');
    
    }else if(flag == 'yesterday'){
    
        param1 = moment().subtract(1, 'days').format('YYYY-MM-DD');
    
    }
    console.log(filterFlag);
    console.log(param1);
    getAnalyticsFilteredData (filterFlag, param1, param2);
});
$(document).on('change', '#filter_month', function (e) {
    
    var param1 = param2 = '';
    var filterFlag = '2';

    $(".filter-btns").removeClass('active');
    $("#filter_dateRange").val('');

    param1 = $("#filter_month").val();
    
    console.log(filterFlag);
    console.log(param1);
    getAnalyticsFilteredData (filterFlag, param1, param2);
});



var flag = false;
$(document).on('change', '#filter_dateRange', function (e) {
    if(flag){
        var param1 = param2 = '';
        var filterFlag = '3';   // for date range

        $(".filter-btns").removeClass('active');
        $("#filter_month").val('')

        var dateString = $(this).val();
        var dateArray = dateString.split(" - ");
        // Extract start and end dates from the array
        var startDateFormatted = moment(dateArray[0], 'DD-MM-YYYY').format('YYYY-MM-DD');
        var endDateFormatted = moment(dateArray[1], 'DD-MM-YYYY').format('YYYY-MM-DD');
        
        param1 = startDateFormatted;
        param2 = endDateFormatted;
      
        console.log(filterFlag);
        console.log(param1);
        console.log(param2);
        getAnalyticsFilteredData (filterFlag, param1, param2);
    }
    flag = true;
});


function getAnalyticsFilteredData(filterFlag='0', param1='', param2=''){

    let type = 'POST';
    let url = '/admin/getAnalyticsPageData';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("filterFlag", filterFlag);
    data.append("param1", param1);
    data.append("param2", param2);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getAnalyticsFilteredResponse, '', 'submit_button');
}

function getAnalyticsFilteredResponse(response){

    var data = response.data;
    
    $("#c_pending_user").html(data['pending_users']);
    $("#c_active_user").html(data['active_users']);
    $("#c_puc_2w").html(data['puc_2w']);
    $("#c_puc_2w_fine").html(data['puc_2w_fine']);
    $("#c_puc_3w").html(data['puc_3w']);
    $("#c_puc_3w_fine").html(data['puc_3w_fine']);
    $("#c_puc_4w").html(data['puc_4w']);
    $("#c_puc_4w_fine").html(data['puc_4w_fine']);

    $("#c_puc_2w_am").html('&#8377;'+data['puc_2w_am']);
    $("#c_puc_2w_fine_am").html('&#8377;'+data['puc_2w_fine_am']);
    $("#c_puc_3w_am").html('&#8377;'+data['puc_3w_am']);
    $("#c_puc_3w_fine_am").html('&#8377;'+data['puc_3w_fine_am']);
    $("#c_puc_4w_am").html('&#8377;'+data['puc_4w_am']);
    $("#c_puc_4w_fine_am").html('&#8377;'+data['puc_4w_fine_am']);
    
    $("#c_challans_qty").html(data['puc_challan_qty']);
    $("#c_challan_amount").html('&#8377;'+data['puc_challan_am']);
}

$(document).ready(function () {
    
    getAnalyticsFilteredData();
    
    $('#filter_dateRange').daterangepicker({
        // startDate: moment().startOf('month'),
        // endDate: moment().endOf('month'),
        autoApply: false,
        locale: {
            format: 'DD-MM-YYYY' // Set the date format
        }
    });

    $("#filter_dateRange").val('');
});
