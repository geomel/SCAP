
var url = "http://localhost:5000/record/";
// _/php/_startProjectSession.php?pname=pname&githubpath=purl&versions=pversions

var resultHTML = "";

$(document).ready(function () {
    $('#wiz').hide();
    $('#project_analysis').hide();
    $('#ajax-timeline').hide();
    $('#loading').hide();
    $("input:radio[name=results-filter]").click(function () {
        var value = $(this).val();
        switch (value) {
            case("0"):
                $('#ajax-timeline').hide();
                $("#search-project").attr("placeholder", "Search project or enter git repository (e.g. https://git-repo.com/user/example-project.git)");
                $('#search-res').show();
                $("#search-project").removeAttr("disabled");
                $("#search-project").focus();
                getAllProjects(0); // 0 means show all projects pressed
                break;
            case("1"):
                $('#ajax-timeline').hide();
                $("#search-project").removeAttr("disabled");
                $("#search-project").attr("placeholder", "Enter the minimum number of versions a project must have (e.g. 20)");
                $("#search-project").focus();
                break;
            case ("2"):
                $('#search-res').hide();
                getAllProjects(1); // 1 means show timeline pressed
                $('#ajax-timeline').show();
                $("#search-project").attr("disabled", "disabled");
                break;
        }
    });

    $("#search-project").focus();
    $('#search-project').keypress(function (e) {
        if (e.which == 13) {
            searchQuery();
        }
    });

    $("#search-button").click(function () {
        searchQuery();
    });
})

function searchQuery() { // query based searching by url or project name
    var url = "http://localhost:5000/";
    //('#project_analysis').hide();
    var isgit = 1;
    $('#search-res').show();
    if ($('#search-project').val() != "") {
      //  if ($('#search-project').val().toLowerCase().indexOf(".git") >= 0) { // if is a git url
        //    url += 'project?purl=' + $('#search-project').val();
        //    isgit = 1;
        //    console.log("aaa: " + url)
       // }
       // else
            url += 'record/' + $('#search-project').val();
            console.log(url);
        $.ajax({
            datatype: "json",
            url: url,
            success: function (response) {
                /*
                resultHTML = "<h1 class='font-md'> Search Results for <span class='semi-bold'>Projects</span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >(" + response.projects.length + " results) </span></small></h1><p> ";
                if (isgit) {                
                    if (response.projects.length > 0) {
                        displaySearchResults(response.projects[0].name, response.projects[0].url, response.projects[0].versionCount);
                    } else
                        runWizard();
                } else {
                    for (var i = 0; i < response.projects.length; i++) {
                        if (response.projects.length > 0) {
                            displaySearchResults(response.projects[i].name, response.projects[i].url, response.projects[i].versionCount);
                        }
                    }
                }
                $('div#search-res').html(resultHTML);
                */
               if(response){
                resultHTML = "<h1 class='font-md'> Search Results for <span class='semi-bold'>Contract:</span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >(" + response._id + " results) </span></small></h1><p> ";    
                //console.log("results: " + response.totals.ast.IfStatement);
                console.log("if " + response._id);
                displaySearchResults(response._id, response._id, response.totals.ast.IfStatement);
                $('div#search-res').html(resultHTML);
                adr = $('#search-project').val();
                getContractCode(adr, response);
               }else{
                // console.log("else "+response._id);
                resultHTML = "<h1 class='font-md'> Server Responded as: <span class='semi-bold'></span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >(0 results) </span></small></h1><p> ";
                //	displayError(er_response.status, er_response.message );
                $('div#search-res').html(resultHTML);
                $('div#contract-code').html("");
                return; 
               }

            },
            error: function (er_response) {
                resultHTML = "<h1 class='font-md'> Server Responded as: <span class='semi-bold'></span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >(0 results) </span></small></h1><p> ";
                //	displayError(er_response.status, er_response.message );
                $('#search-res').html(resultHTML);
            }
        });
    } else {
        resultHTML = "<h1 class='font-md'> Server Responded as: <span class='semi-bold'></span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >Enter a valid project name or git repository. </span></small></h1><p> ";
        $('div#search-res').html(resultHTML);
    }
}

function getAllProjects(flag) {
    $.ajax({
        dataType: "json",
        url: url + 'project',
        success: function (response) {
            resultHTML = "<h1 class='font-md'> Search Results for <span class='semi-bold'>Contracts</span><small class='text-danger'> &nbsp;&nbsp;<span id='numresults' >( " + response.length + " results) </span></small></h1><p> ";
            for (var i = 0; i < response.projects.length; i++) {
                var project = response.projects[i];
                if (flag == 0)  // 0 means show all projects pressed
                    displaySearchResults(project.name, project.url, project.versionCount);
                else
                    displayTimeLine(project.analyzed, project.name, project.url, project.versionCount);
            }
            $('div#search-res').html(resultHTML);
            $('div#ajax-timeline').html(resultHTML);
        },
        error: function (er_response) {
            console.log("On error: " + JSON.stringify(er_response))
        }
    });
}


function displaySearchResults(pname, purl, pversions) {
    $('#project_analysis').hide();
    $('#completion_message').hide();
    resultHTML += "<h3><i class='fa fa-plus-square txt-color-blue'></i>&nbsp;&nbsp;<u><a href='_/php/_startProjectSession.php?pname=" + pname + "&githubpath=" + purl + "&versions=" + pversions + "' onclick='storeResults(\"" + pname + "\",\"" + purl + "\");'>" + pname + "</a></u>&nbsp;&nbsp;<a href='javascript:void(0);'></a></h3>" +
            "<span class='sparkline txt-color-blueLight' data-sparkline-type='line' data-sparkline-width='150px' data-sparkline-height='25px> 10,3,8,4,3,10,7,8,4,6,4,6,8,3 </span>";
           
}

function getContractCode(adr, resp){

    var url = "https://api.etherscan.io/api?module=contract&action=getsourcecode&address=" + adr + "&apikey=4BMDMBIP8VCA9MDWINZDCI9Z7DIM6ASU6K%22";

    $.ajax({
        datatype: "json",
        url: url,
        success: function (response) {
            if(response){
            
            code = JSON.stringify(response.result[0].SourceCode);
            cname = JSON.stringify(response.result[0].ContractName);
            compiler = resp.totals.capabilities.solidityVersions;
            loc = resp.totals.sloc.total;
            num_contracts = resp.totals.num.contracts;
            num_libraries = resp.totals.num.libraries;
            num_interfaces = resp.totals.num.interfaces;
            num_abstract = resp.totals.num.absract;
            variableDeclaration = resp.totals.ast.VariableDeclaration;
            functionCall = resp.totals.ast.FunctionCall;
            ifStatement = resp.totals.ast.IfStatement;
            functionDefinitionView = resp.totals.ast['FunctionDefinition:View'];
            functionDefinition = resp.totals.ast.FunctionDefinition;
            stateVariableDeclarationPrivate = resp.totals.ast['stateVariableDeclaration:Private'];
            codeHTML = "<div class='url text-success'>" +
            "<i class='fa fa-code'></i> <b>Contract Name:&nbsp </b> <a href='" + cname + "' target='_blank'>" + cname + "&nbsp;&nbsp;</a>" +
            "</div>" +
            "<span class='display-inline note font-lg semi-bold'><small><i class='fa fa-file-code-o'></i> LOC &nbsp;" + loc + "</small></span>" +
            "<p class='note'>" +
                "<a href='javascript:void(0);'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;Contracts</span>&nbsp;&nbsp;" + num_contracts + "&nbsp;</a></br>" +
                "<a href='javascript:void(0);'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;Libraries</span>&nbsp;&nbsp;" + num_libraries + "&nbsp;</a></br>" +
                "<a href='javascript:void(0);'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;Interfaces</span>&nbsp;&nbsp;" + num_interfaces + "&nbsp;</a></br>" +
                "<a href='javascript:void(0);'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;Abstract</span>&nbsp;&nbsp;" + num_abstract + "&nbsp;</a>" +
            "</p>" +
            "<p style='margin-bottom: 0px'>" +
            "<div>" +
            "<p class='note'>" +
            "<i class='fa fa-qrcode'></i> <b>Compiler Version:&nbsp</span> </b>" + compiler + "&nbsp;&nbsp;" +
            "</p><p class='description'>" +
            "........."  +
            "</p></p>" +
            "<pre class='prettyprint linenums'><code class='javascript'></code>" + code + "</code></pre>" +
            "<div class='url text-success'>" +
            "<a href='http://www.etherscan.io//address/" + adr + "'><span class='url text-success'>http://www.etherscan.io//address/" + adr +  "</span><i class='fa fa-caret-down'></i>" +
            "</div>";
             
            sc_metricsHTML = "<table class='table table-bordered'>" +
            "<thead>" +
                "<tr>" +
                    "<th>Metric</th>" +
                    "<th>Value</th>" +
                "</tr>" +
            "</thead>" +
            "<tbody>" +
                "<tr>" +
                    "<td>Variables Declaration</td>" +
                    "<td>"+ variableDeclaration +"</td>" +
                "</tr>" +    
                    "<td>Function Calls</td>" +
                    "<td>"+ functionCall +"</td>" +
                "</tr>" +
                "</tr>" +    
                    "<td>If Statements</td>" +
                    "<td>"+ ifStatement +"</td>" +
                "</tr>" +
                "</tr>" +    
                    "<td>Function Definition</td>" +
                    "<td>"+ functionDefinition +"</td>" +
                "</tr>" +
                "</tr>" +    
                    "<td>FunctionDefinition:View</td>" +
                    "<td>"+ functionDefinitionView +"</td>" +
                "</tr>" +
                    "</tbody>" +
			                "</table>"
            
               // showContractCode(response.result[0]);
                $('div#contract-code').html(codeHTML);
                //$('textarea#sc-code').html("kjhkjhkjhkjh");
                $('div#sc_metrics').html(sc_metricsHTML);

              }  

        },
        error: function (er_response) {
            
        }
    });

}

function showContractCode(res){
    code = JSON.stringify(res);
    codeHTML +=   code + "</code></pre>" ;
}

function displayTimeLine(pdate, pname, purl, pversions) {
    resultHTML += "<li>" +
            "<div class='smart-timeline-icon bg-color-greenDark'>" +
            "<i class='fa fa-bar-chart-o'></i>" +
            "</div>" +
            "<div class='smart-timeline-time'>" +
            "<small>" + pdate + "</small>" +
            "</div>" +
            "<div class='smart-timeline-content'>" +
            "<p>" +
            "<strong class='txt-color-greenDark'>" + pname + "</strong>" +
            "</p>" +
            "<p>" +
            "<a href='_/php/_startProjectSession.php?pname=" + pname + "&githubpath=" + purl + "&versions=" + pversions + "' onclick='storeResults(\"" + pname + "\",\"" + purl + "\");'  class='btn btn-xs btn-primary'><i class='fa fa-file'></i>&nbsp;&nbsp" + pname + "</a>" +
            "<br>" + pversions + " Versions" +
            "</p>" +
            "</div>" +
            "</li>";

}

function runWizard() {
    $('#search-res').hide();
    $('#mailnotification').show();
    $('#project_analysis').show();

}


$("#triggerProjectAnalysis").click(function () {
    purl = $('#search-project').val();
    reciever_email = $('#email').val();
    if (reciever_email == "")
        reciever_email = "geomel@gmail.com";
    $('#triggerProjectAnalysis').hide();
    $('#loading').show();
    $('#project_analysis').hide();
    $.post("http://se.uom.gr:8080/seagle2/rs/project/analysis?purl=" + purl + "&requestorEmail=" + reciever_email, function (data, status) {
        $('#loading').hide();
        $("#completion_message").html("<p><h4>The analysis of the project has started and will complete shortly.</h4>");
    });
});

$("#triggerSmellDetection").click(function () {
    purl = $('#projectURL').val();
    
    $.post("http://se.uom.gr:8080/seagle2/rs/project/smells/identify?purl=" + purl , function (data, status) {
        console.log("Smell dection triggered for project "+purl);
        console.log(status);
    });
});

