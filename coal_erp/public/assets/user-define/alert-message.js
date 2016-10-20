function msg_danger(header,message)
{
    var retrun_data = "";
    retrun_data += "<div class='alert alert-danger alert-dismissable'>";
    retrun_data += "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
    retrun_data += "<h4><i class='icon fa fa-ban'></i>"+ header +"</h4>";
    if(message != null || message !="" ) {
        retrun_data += message;
    }

    retrun_data += "</div>";

    return retrun_data;
}

function msg_info (header,message)
{
    var retrun_data = "";
    retrun_data += "<div class='alert alert-info  alert-dismissable'>";
    retrun_data += "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
    retrun_data += "<h4><i class='icon fa fa-ban'></i>"+ header +"</h4>";
    if(message != null || message !="" ) {
        retrun_data += message;
    }
    retrun_data += "</div>";

    return retrun_data;
}

function msg_warning (header,message)
{
    var retrun_data = "";
    retrun_data += "<div class='alert alert-warning   alert-dismissable'>";
    retrun_data += "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
    retrun_data += "<h4><i class='icon fa fa-ban'></i>"+ header +"</h4>";
    if(message != null || message !="" ) {
        retrun_data += message;
    }
    retrun_data += "</div>";

    return retrun_data;
}

function msg_success (header,message)
{
    var retrun_data = "";
    retrun_data += "<div class='alert alert-success alert-dismissable'>";
    retrun_data += "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
    retrun_data += "<h4><i class='icon fa fa-check'></i>"+ header +"</h4>";
    if(message != null || message !="" ) {
        retrun_data += message;
    }
    retrun_data += "</div>";

    return retrun_data;
}

$(function() {

    var url = window.location;
    var element = $('ul.sub a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().addClass('active').parent().parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});
