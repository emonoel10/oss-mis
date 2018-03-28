$(function(){
    //original field values
    var field_values = {
            //id        :  name
            'lname'  : 'lname',
            'fname'  : 'fname',
            'mname' : 'mname',
            'brgy'  : 'brgy',
            'city'  : 'city',
            'age'  : 'age',
            'sibling'  : 'sibling',
            'tel'  : 'tel',
            'cel'  : 'cel'
    };

    var finalAppliance = "";
    var otherEthnic = "";
    var c5 = $('#otherDialect').val();
    var c4 = '';
    var favorite = [];
    var furniture = [];
    var language = [];
    var sibling = [];
    var siblingAttain = [];
    var province = '';
    var count = 0;
    var permanent = "";
    var present = "";
    var tel = "";
    var sibName = "";
    var sibEduc = "";
    //inputfocus
    //$('input#lname').inputfocus({ name: field_values['password'] });
    //$('input#cpassword').inputfocus({ name: field_values['cpassword'] }); 
    //$('input#lastname').inputfocus({ name: field_values['lastname'] });
    //$('input#firstname').inputfocus({ name: field_values['firstname'] });
    //$('input#email').inputfocus({ name: field_values['email'] }); 
    
    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');
    
    //Change the value of an empty field
    

    
    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step input[name=lname], #first_step input[name=fname], #first_step input[name=mname], #first_step select[name=country], #first_step select[name=state], #first_step select[name=city], #first_step select[name=course], #first_step select[name=gender], #first_step input[type = number], #first_step select[name=status], #first_step select[name=sibling2], #first_step select[name=nSibling], #first_step input[name=hsGraduated], #first_step select[name=yearGrad], #first_step select[name=hsType], #first_step select[name=stanine], #first_step input[name=cel]');
        var error = 0;

        fields.each(function(){
            var lname = $(this).val();
            var fname = $(this).val();
            var mname = $(this).val();
            var province = $(this).val();
            var city = $(this).val();
            var brgy = $(this).val();
            var course = $(this).val();
            var gender = $(this).val();
            var age = $(this).val();
            var status = $(this).val();
            var hsGraduated = $(this).val();
            var yearGrad = $(this).val();
            var hsType = $(this).val();
            var stanine = $(this).val();
            var cel = $(this).val();
            
            if( lname.length<1 || fname.length<1 || lname.length<1 || province == "–– Select Province ––" || city == "–– Select City ––" || brgy == "–– Select Brgy ––" || course == "–– Choose below ––" || gender == "–– Choose below ––" || age.length < 1 || age < 0 || status == "–– Choose below ––" || hsGraduated.length < 1 || yearGrad == "-Year Graduated-" || hsType == "–– Choose below ––" || stanine == "–– Choose below ––" || cel.length <1) {
                $(this).removeClass('valid').addClass('error'); 
                  
                error++;
            }

            
            else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if ($('#cel').length > 0){
            
            if ($('#cel').length = 11){
                 $('#first_step input[name = cel] ').each(function(){
                        $(this).addClass('valid');
                    });
            }
            }
            
            
            if ($('#tel').length > 0){
                 $('#first_step input[name = tel] ').each(function(){
                        $(this).addClass('valid');
                    
                    });
            }
        
            if ( $('#sibling').val() < 0){
                 $('#first_step input[type=number] ').each(function(){
                        $(this).removeClass('valid').addClass('error');
                    
                    });
                     return false;
            }
            
            if( $('#sibling').val() < 0 || $('#age').val() < 0) {
                if ( $('#age').val() < 0 ) {
                      $('#first_step input[name = age] ').each(function(){
                        $(this).removeClass('valid').addClass('error');
                     
                    });
                }
                
                else if ( $('#sibling').val() < 0 ) {
                      $('#first_step input[name = sibling] ').each(function(){
                        $(this).removeClass('valid').addClass('error');
                    
                    });
                }
                return false;
            }
            
            else {   
                //update progress bar
                $('#progress').css('width','113px');
                $('#progress_text').html('33% Complete');
                $('#first_step').slideUp();
                $('#second_step').slideDown();
                $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
               
                
                //slide steps
                 
            }               
        } else return false;
    });
    
    $('#prev').click(function(){
        $('#first_step').slideDown();
        $('#second_step').slideUp();  
        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
    });
    
    
    $('#prev2').click(function(){
        $('#second_step').slideDown();
        $('#third_step').slideUp();  
        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
    });
    
    $('#prev3').click(function(){
        $('#third_step').slideDown();
        $('#fourth_step').slideUp();  
        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
    });
    
    $('#submit_second').click(function(){
    
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        //var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step select[name=ethnicSlct], #second_step input[name=fatherEd], #second_step select[name=fAttain], #second_step select[name=occupationF], #second_step select[name=statusF], #second_step input[name=motherEd], #second_step select[name=mAttain], #second_step select[name=occupationM], #second_step select[name=statusM], #second_step input[id=nsib], #second_step input[id=sib], #second_step select[name=sibling], #second_step select[name=religion]');
        var error = 0;
        var x = document.getElementById('chckbx1').checked;
        var y = document.getElementById('chckbx2').checked;
        var z = document.getElementById('chckbx3').checked;
        var a = document.getElementById('chckbx4').checked;
        var input = $('#ethnicInput').val();
        fields.each(function(){
            var ethnicSlct = $(this).val();
            var home = $(this).val();
            var nSibling = $(this).val();
            var fatherEd = $(this).val();
            var fAttain = $(this).val();    
            var occupationF = $(this).val();
            var statusF = $(this).val();
            var motherEd = $(this).val();
            var mAttain = $(this).val();
            var occupationM = $(this).val();
            var statusM = $(this).val();
            var nsib = $(this).val();
            var mysibling = $(this).val();
            var sibAttain = $(this).val();
            var religion = $(this).val();
            if( ethnicSlct == "–– Choose below ––" || home == "–– Choose below ––" || fatherEd.length < 1 || fAttain == "–– Educational Attainment ––" || occupationF == "–– Choose below ––" || statusF == "–– Choose below ––" || motherEd.length < 1 || mAttain == "–– Educational Attainment ––" || occupationM == "–– Choose below ––" || statusM == "–– Choose below ––" || nsib < 0 || mysibling == "" || sibAttain == "–– Educational Attainment ––" || religion == "–– Choose below ––") {
                $(this).removeClass('valid').addClass('error');
                
                error++;
            }
            else if (x == false && y == false && z == false && a == false) 
    {
        alert ('You didn\'t choose any of the dialect(s). Please choose at least one dialect to proceed.');
        error++;
        return false;
       
    }

    else if (document.getElementById("ethnicInput").disabled == false && document.getElementById("ethnicInput").value == ''){
        alert ('If others, text field that corresponds to ethnic must be filled in.');
        error++;
        return false;
    }

    else if (document.getElementById("otherDialect").disabled == false && document.getElementById("otherDialect").value == ''){
        alert ('If others, please specify other dialect(s).');
        error++;
        return false;
    }

    else if (document.getElementById("religionTwo").disabled == false && document.getElementById("religionTwo").value == ''){
        alert ('If other religon groups, text field that corresponds to religion must be filled in.');
        error++;
        return false;
    }

             else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                $('#second_step').slideUp();
                $('#third_step').slideDown();

        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
              
                //slide steps
               
        } else return false;

    });


    $('#submit_third').click(function(){
          var otherAppliance = null; 
        if ($('#otherAppliances').val().length > 0){
            otherAppliance = "Other appliance(s) owned: " + $('#otherAppliances').val();
        }
        else {
            otherAppliance = "";
        }

        //remove classes
        $('#third_step input').removeClass('error').removeClass('valid');
 
        var fields = $('#third_step select[name = income], #third_step select[name=house], #third_step select[name=lot], #third_step select[name=light], #third_step select[name=water], #third_step select[name=toilet], #third_step select[name=transport]');
        var error = 0;
        var box1 = document.getElementById('check1').checked;
        var box2= document.getElementById('check2').checked;
        var box3 = document.getElementById('check3').checked;
        var box4= document.getElementById('check4').checked;
        var box5 = document.getElementById('check5').checked;
        var box6 = document.getElementById('check6').checked;
        var box7= document.getElementById('check7').checked;
        var box8 = document.getElementById('check8').checked;
        var box9 = document.getElementById('check9').checked;
        var box10 = document.getElementById('check10').checked;
        var box11 = document.getElementById('check11').checked;
        var box12 = document.getElementById('check12').checked;
        fields.each(function(){
            var income = $(this).val();
            var house = $(this).val();
            var lot = $(this).val();
            var light = $(this).val();
            var water = $(this).val();
            var toilet = $(this).val();
            var transport = $(this).val();
            if(income == "–– Choose below ––" || house == "–– Choose below ––" || lot == "–– Choose below ––" || light == "–– Choose below ––" || water == "–– Choose below ––" || toilet == "–– Choose below ––" || transport == "–– Choose below ––") {
                $(this).removeClass('valid').addClass('error');
                
                 
                error++;
            }

            else if (box1 == false && box2 == false && box3 == false && box4 == false && box5 == false && box6 == false && box7 == false && box8 == false && box9 == false && box10 == false && box11 == false && box12 == false) 
    {
        alert ('You didn\'t choose any of the appliances! Please choose at least one appliance to proceed.');
        error++;
        return false;
       
    }

        else if (document.getElementById("otherLight").disabled == false && document.getElementById("otherLight").value == ''){
        alert ('If others, text field that corresponds to light must be filled in.');
        error++;
        return false;
    }

    else if (document.getElementById("otherAppliances").disabled == false && document.getElementById("otherAppliances").value == ''){
        alert ('If others, please specify what other appliance(s) owned.');
        error++;
        return false;
    }

    else if (document.getElementById("otherTransport").disabled == false && document.getElementById("otherTransport").value == ''){
        alert ('If others, text field that corresponds to transportation must be filled in.');
        error++;
        return false;
    }

             else {
                $(this).addClass('valid');
            }
        });


    if(!error) {
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','339px');
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();  
        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
        
        
    } else return false;
        //prepare the fourth step

        var ethnic = document.getElementById('ethnicSlct');
        var finalEthnic = "";
        var myReligion = document.getElementById('religion');
        var finalReligion = "";
        var myLight = document.getElementById('light');
        var finalLight = "";
        var myTransport = document.getElementById('transport');
        var finalTransport = "";
        var input1 = document.getElementById('tel');
        var input2 = document.getElementById('cel');


               // check if telephone and celphone fields are empty
                if(input1.value.length == 0 && input2.value.length == 0){
                input1.value = "None";
                input2.value = "None";
                }
                else if (input1.value.length == 0){
                input1.value = "None";
                }
    
                else if (input2.value.length == 0){
                input2.value = "None";
                }

                //getting values from dropdown and text field of ethnic
                if (ethnic.value == "Others"){
                    finalEthnic = $('#ethnicInput').val();
                }
                else if (ethnic.value == "Davawenyo"){
                    finalEthnic = "Davawenyo";
                }
                else if(ethnic.value == "Muslim"){
                    finalEthnic = "Muslim";
                }
                else if(ethnic.value == "Visaya"){
                    finalEthnic = "Visaya";
                }
                else{
                    finalEthnic = "Tagalog";
                }

                //getting values from dropdown and text field of religion
                if (myReligion.value == "Other Christian groups"){
                    finalReligion = $('#religionTwo').val();
                }
                else if (myReligion.value == "Catholic"){
                    finalReligion = "Catholic";
                }
                else if(myReligion.value == "Protestant/Evangelical"){
                    finalReligion = "Protestant/Evangelical";
                }
                else{
                    finalReligion = "Muslim/Islam";
                }

                //getting values from dropdown and text field of light facilities
                if (myLight.value == "Others"){
                    finalLight = $('#otherLight').val();
                }
                else if (myLight.value == "Electricity"){
                    finalLight = "Electricity";
                }
                else{
                    finalLight = "Petroleum";
                }

                //getting values from dropdown and text field of transportation
               if (myTransport.value == "Others"){
                    finalTransport = $('#otherTransport').val();
                }
                else if (myTransport.value == "Car"){
                    finalTransport = "Car";
                }
                else if (myTransport.value == "Jeep"){
                    finalTransport = "Jeep";
                }
                else if (myTransport.value == "Motorcycle/Tricycle"){
                    finalTransport = "Motorcycle/Tricycle";
                }
                else if (myTransport.value == "Trisikad/Bicycle"){
                    finalTransport = "Trisikad/Bicycle";
                }
                else {
                    finalTransport = "None";
                }

        var fields = new Array(
            $('#lname').val() + ', ' + $('#fname').val() + ' ' + $('#mname').val(),
            $('#brgy').val() + ', ' + $('#city').val() + ', ' + $('#province').val(),
            $('#course').val(),
            $('#gender').val(),
            $('#age').val(),
            $('#status').val(),
            $('#sibling').val(),
            $('#stanine').val(),
            'Telephone: ' + $('#tel').val() + '<br>Cellphone: ' + $('#cel').val(),

            $('#hsGraduated').val() + ', '+ $('#yearGrad').val(),
            $('#hsType').val(),
            finalEthnic,
            $('#nSibling').val(),
            $('#fatherEd').val() + ' (' + $('#fAttain').val() +')',
            $('#motherEd').val() + ' (' + $('#mAttain').val() +')',
            $('#religion').val()                       
        );
        var tr = $('#fourth_step tr');

        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
        
        

            if(count >= 0){
                sibling = [];
            $.each($("input[name='mytext[]']"), function(){            
                sibling.push($(this).val());
            });
}
            if(count >= 0){
                siblingAttain = [];
            $.each($("select[name='mySib']"), function(){            
                siblingAttain.push($(this).val());
            });
}

            if ($('#s1').val() == 'DDN' || $('#ss1').val() == 'DDN')
            {
                province = 'Davao del Norte';
            }

        var fields = new Array(
            '______________________________________',
            $('#schoolYear').val(),
            $('#lname').val() + ', ' + $('#fname').val() + ' ' + $('#mname').val(),
            permanent,
            present,
            $('#course').val(),
            $('#nominee_one_dob').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#status').val(),
            $('#hsGraduated').val() + ', '+ $('#yearGrad').val(),
            $('input[name=hsType]:checked').val(),
            $('#stanine').val(),
            '______________________________________',
            finalEthnic,
            finalReligion,
            c4,
            '______________________________________',
            $('#income').val(),
            $('#house').val(),
            $('#lot').val(),
            finalLight,
            $('#water').val(),
            $('#toilet').val(),
            finalTransport,
            favorite.join(", ") + "<br>" + otherAppliance
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();        
        $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);    
    });
        
$('#cancel').click(function(){
 window.location.href = "view.php";
});


$('#update_socio').click(function(){
     if (count >= 0){
                favorite = [];
                $.each($("input[name='check[]']:checked"), function(){            
                favorite.push($(this).val());
            });
            count++;
            }

     if (count >= 0){
                furniture = [];
                $.each($("input[name='furniture[]']:checked"), function(){            
                furniture.push($(this).val());
            });
            count++;
            }

       $(function()
{
        $.post("updateSocioQuery.php",
        {
                username: $('#user').text(),
                income: $('#income').val(),
                houseStatus: $('#house').val(),
                lotStatus: $('#lot').val(),
                light: $('#light').val(),
                otherLight: $('#otherLight').val(),
                water: $('#water').val(),
                toilet: $('#toilet').val(),
                transport: $('#transport').val(),
                otherTransport: $('#otherTransport').val(),
                appliances: favorite.join(", "),
                otherAppliances: $('#otherAppliances').val(),
                furniture: furniture.join(", "),
                otherFurniture: $('#otherFurniture').val()
        },
        function(data, textStatus)
        {
            if (data == "Updated successfully!"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "view.php";
        }
            else {
            var x = document.getElementById("forError")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    });
    });

$('#update_personal').click(function(){
                if(count >= 0){
                sib = [];
            $.each($("input[name='mytext[]']"), function(){            
                sib.push($(this).val());
            });
}
            if(count >= 0){
                sibling = [];
            $.each($("select[name='sibling']"), function(){            
                sibling.push($(this).val());
            });
}
       $(function()
{
        $.post("updateQuery.php",
        {
                username: $('#user').text(),
                type: $('#type').val(),
                schoolYear: $('#schoolYear').val(),
                semester: $('#semester').val(),
                lname: $("#lname").val(),
                fname: $("#fname").val(),
                mname: $("#mname").val(),
                permanentNum: $('#shouseNumber').val(),
                permanentBrgy: $('#s3').val(),
                permanentCity: $('#s2').val(),
                permanentProvince: $('#s1').val(),
                presentNum: $('#sshouseNumber').val(),
                presentBrgy: $('#ss3').val(),
                presentCity: $('#ss2').val(),
                presentProvince: $('#ss1').val(),
                course: $('#course').val(),
                bdate: $('#nominee_one_dob').val(),
                gender: $('#gender').val(),
                age: $('#age').val(),
                status: $('#status').val(),
                spouse: $('#spouse').val(),
                nationality: $('#nationality').val(),
                siblingsName: sib.join(", "),
                siblingsEduc: sibling.join(", "),
                numSibling: $('#sibling2').val(),
                hs: $('#hsGraduated').val(),
                yearGrad: $('#yearGrad').val(),
                hstype: $('#hsType').val(),
                stanine: $('#stanine').val(),
                email: $('#email').val(),
                contact: $('#contact').val()
        },
        function(data, textStatus)
        {
            if (data == "Updated successfully!"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "view.php";
        }
            else {
            var x = document.getElementById("forError")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    });
    });

$('#update_parent').click(function(){
        if (count >= 0){
                skills = [];
                $.each($("input[name='chk2[]']:checked"), function(){            
                skills.push($(this).val());
            });
            count++;
            }

        if (count >= 0){
                dialect = [];
                $.each($("input[name='chk1[]']:checked"), function(){            
                dialect.push($(this).val());
            });
            count++;
            }

        if (count >= 0){
                disability = [];
                $.each($("input[name='chk3[]']:checked"), function(){            
                disability.push($(this).val());
            });
            count++;
            }
        if (count >= 0){
                problems = [];
                $.each($("input[name='chk5[]']:checked"), function(){            
                problems.push($(this).val());
            });
            count++;
            }

        if (count >= 0){
                handedness = [];
                $.each($("input[name='chk4[]']:checked"), function(){            
                handedness.push($(this).val());
            });
            count++;
            }
   $(function()
{       
        $.post("updateParentQuery.php",
        {
                username: $('#user').text(),
                ethnic: $('#ethnicSlct').val(),
                otherethnic: $('#ethnicInput').val(),
                father: $('#fatherEd').val(),
                attainfather: $('#fAttain').val(),
                fatherOccup: $('#occupationF').val(),
                mother: $('#motherEd').val(),
                attainmother: $('#mAttain').val(),
                motherOccup: $('#occupationM').val(),
                religion: $('#religion').val(),
                otherreligion: $('#religionTwo').val(),
                dialect: dialect.join(", "),
                otherdialect: $('#otherDialect').val(),
                skills: skills.join(", "),
                otherSkills: $('#otherSkills').val(),
                disability: disability.join(", "),
                otherDisability: $('#otherDisability').val(),
                handedness: handedness.join(", "),
                problems: problems.join(", "),
                otherProblems: $('#otherProblems').val()
        },
        function(data, textStatus)
        {
            if (data == "Updated successfully!"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "view.php";
        }
            else {
            var x = document.getElementById("forError")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    });
    });


});