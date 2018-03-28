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
    var noEmail = $('#email').val();
    var one = document.getElementById('chckbx1').checked;
    var boardAddress = "";
    var c4 = '';
    var favorite = [];
    var furniture = [];
    var dialect = [];
    var skills = [];
    var disability = [];
    var problems = [];
    var handedness = [];
    var sibling = [];
    var sib = [];
    var province = '';
    var count = 0;
    var permanent = "";
    var present = "";
    var deceaseF = "";
    var deceaseM = "";
    var gender = "";
    var mStatus = "";
    var otherDialect = "";
    var otherSkills = "";
    var otherDisability = "";
    var otherProblems = "";
    var finalSibling = "";
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
        var fields = $('#first_step select[id=type], #first_step select[name=schoolYear], #first_step select[name=semester], #first_step input[name=lname], #first_step input[name=fname], #first_step input[name=s1], #first_step input[name=s2], #first_step input[name=s3], #first_step input[name=shouseNumber], #first_step input[name=ss1], #first_step input[name=ss2], #first_step input[name=ss3], #first_step input[name=sshouseNumber], #first_step select[name=course], #first_step input[name=nominee_one_dob], #first_step input[name=age], #first_step select[name=gender], #first_step select[name=status], #first_step input[name=nationality], #first_step input[name=height], #first_step input[name=weight], #first_step select[id=sibling2], #first_step input[id=sib], #first_step select[name=sibling], #first_step input[name=hsGraduated], #first_step select[name=yearGrad], #first_step select[name=hsType], #first_step select[name=stanine], #first_step input[name=contact]');
        var error = 0;

        fields.each(function(){
            var yearGrad = $(this).val();
            var email = $(this).val();
            var semester = $(this).val();
            var nationality = $(this).val();
            var height = $(this).val();
            var weight = $(this).val();
            var lname = $(this).val();
            var fname = $(this).val();
            var mname = $(this).val();
            var s1 = $(this).val();
            var s2 = $(this).val();
            var s3 = $(this).val();
            var shouseNumber = $(this).val();
            var ss1 = $(this).val();
            var ss2 = $(this).val();
            var ss3 = $(this).val();
            var sshouseNumber = $(this).val();
            var course = $(this).val();
            var gender = $(this).val();
            var status = $(this).val();
            var sib = $(this).val();
            var sibling = $(this).val();
            var hsType = $(this).val();
            var stanine = $(this).val();
            var hsGraduated = $(this).val();
            var contact = $(this).val();
            
            if(yearGrad == "-Year Graduated-" || nationality.length<1 || height.length<1 || weight.length<1 || lname.length<1 || fname.length<1 || mname.length<1 || s1 == "–– Select Province ––" || s2 == "–– Select City ––" || s3 == "–– Select Brgy ––" || shouseNumber == null  || ss1 == "–– Select Province ––" || ss2 == "–– Select City ––" || ss3 == "–– Select Brgy ––" || sshouseNumber == null || course == "–– Choose below ––" || gender == "–– Choose below ––" || status == "–– Choose below ––" || sib == "" || sibling == "–– Educational Attainment ––" || hsType == "–– Choose below ––" || stanine == "–– Choose below ––" || hsGraduated.length < 1 ||  contact.length <1) {
                $(this).removeClass('valid').addClass('error'); 

                error++;
            }

        else if (document.getElementById("spouse").disabled == false && document.getElementById("spouse").value == ''){
        alert ('If married, please indicate the name of spouse.');
        error++;
        return false;
    }

            else { 
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
                //update progress bar
                $('#progress').css('width','113px');
                $('#progress_text').html('33% Complete');
                $('#first_step').slideUp();
                $('#second_step').slideDown();
                $('html, body').animate({
            scrollTop: $("#container").offset().top
                            }, 1000);
                //slide steps
                       
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
         $('#second_step input').removeClass('error').removeClass('valid');

        //var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step select[name=ethnicSlct], #second_step input[name=fatherEd], #second_step select[name=fAttain], #second_step select[name=occupationF], #second_step input[name=motherEd], #second_step select[name=mAttain], #second_step select[name=occupationM], #second_step select[name=religion]');
        var error = 0;
        var one = document.getElementById('chckbx1').checked;
        var two = document.getElementById('chckbx2').checked;
        var three = document.getElementById('chckbx3').checked;
        var four = document.getElementById('chckbx4').checked;
        var five = document.getElementById('chckbx5').checked;
        var six = document.getElementById('chckbx6').checked;
        var seven = document.getElementById('chckbx7').checked;
        var others = document.getElementById('others').checked;

        var cOne = document.getElementById('c1').checked;
        var cTwo = document.getElementById('c2').checked;
        var cThree = document.getElementById('c3').checked;
        var cFour = document.getElementById('c4').checked;
        var cFive = document.getElementById('c5').checked;
        var cSix = document.getElementById('c6').checked;
        var cSeven = document.getElementById('c7').checked;
        var otherSkills = document.getElementById('otherSkills').checked;

        /*var chOne = document.getElementById('ch1').checked;
        var chTwo = document.getElementById('ch2').checked;
        var chThree = document.getElementById('ch3').checked;
        var chFour = document.getElementById('ch4').checked;
        var chFive = document.getElementById('ch5').checked;
        var chSix = document.getElementById('ch6').checked;
        var chSeven = document.getElementById('ch7').checked;*/
        var otherDisability = document.getElementById('otherDisability').checked;

        var chckbxOne = document.getElementById('checkbx1').checked;
        var chckbxTwo = document.getElementById('checkbx2').checked;

        var chbxOne = document.getElementById('chbx1').checked;
        var chbxTwo = document.getElementById('chbx2').checked;
        var chbxThree = document.getElementById('chbx3').checked;
        var chbxFour = document.getElementById('chbx4').checked;
        var chbxFive = document.getElementById('chbx5').checked;
        var chbxSix = document.getElementById('chbx6').checked;
        var chbxSeven = document.getElementById('chbx7').checked;
        var chbxEight = document.getElementById('chbx8').checked;
        var chbxNine = document.getElementById('chbx9').checked;
        var chbxTen = document.getElementById('chbx10').checked;
        var chbxEleven = document.getElementById('chbx11').checked;
        var otherProblems = document.getElementById('otherProblems').checked;

        fields.each(function(){
            var ethnicSlct = $(this).val();
            var fatherEd = $(this).val();
            var fAttain = $(this).val();    
            var occupationF = $(this).val();
            var motherEd = $(this).val();
            var mAttain = $(this).val();
            var occupationM = $(this).val();
            var religion = $(this).val();
            if( ethnicSlct == "–– Choose below ––" || fatherEd.length < 1 || fAttain == "–– Educational Attainment ––" || occupationF == "–– Choose below ––" || motherEd.length < 1 || mAttain == "–– Educational Attainment ––" || occupationM == "–– Choose below ––" || religion == "–– Choose below ––") {
                $(this).removeClass('valid').addClass('error'); 
                error++;
            }

            else if (one == false && two == false && three == false && four == false && five == false && six == false && seven == false && others == false) {
            alert ('You didn\'t choose any of the dialect(s). Please choose at least one dialect to proceed.');
            error++;
            return false;      
            }

            else if (cOne == false && cTwo == false && cThree == false && cFour == false && cFive == false && cSix == false && cSeven == false && otherSkills == false){
            alert ('You didn\'t choose any of the skill(s). Please choose at least one skill to proceed.');
            error++;
            return false; 
            }

            /*else if (chOne == false && chTwo == false && chThree == false && chFour == false && chFive == false && chSix == false && chSeven == false && otherDisability == false){
            alert ('You didn\'t choose any of the disability(ies). Please choose at least one disability to proceed.');
            error++;
            return false;
            }
            */
            else if (chckbxOne == false && chckbxTwo == false){
            alert ('You didn\'t choose any of the handedness. Please choose at least one handedness to proceed.');
            error++;
            return false;
            }

            else if (chbxOne == false && chbxTwo == false && chbxThree == false && chbxFour == false && chbxFive == false && chbxSix == false && chbxSeven == false && chbxEight == false && chbxNine == false && chbxTen == false && chbxEleven == false && otherProblems == false){
            alert ('You didn\'t choose any of the problem(s). Please choose at least one problem to proceed.');
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

            else if (document.getElementById("otherSkills").disabled == false && document.getElementById("otherSkills").value == ''){
            alert ('If others, please specify other skill(s).');
            error++;
            return false;
            }

            else if (document.getElementById("otherDisability").disabled == false && document.getElementById("otherDisability").value == ''){
            alert ('If others, please specify other disability.');
            error++;
            return false;
            }

            else if (document.getElementById("otherProblems").disabled == false && document.getElementById("otherProblems").value == ''){
            alert ('If others, please specify other problem(s).');
            error++;
            return false;
            }
// insert here the religion

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
          var otherFurniture = null;
        
        if ($('#otherDialect').val().length > 0){
            otherDialect = "Other Dialect/s: " + $('#otherDialect').val();
        }else{
            otherDialect = "";
        }

        if ($('#otherSkills').val().length > 0){
            otherSkills = "Other Skill/s: " + $('#otherSkills').val();
        }else{
            otherSkills = "";
        }

        if ($('#otherDisability').val().length > 0){
            otherDisability = "Other Disability: " + $('#otherDisability').val();
        }else{
            otherDisability = "";
        }

        if ($('#otherProblems').val().length > 0){
            otherProblems = "Other Problem/s: " + $('#otherProblems').val();
        }
        else{
            otherProblems = "";
        }

        if ($('#otherAppliances').val().length > 0){
            otherAppliance = "Other appliance(s) owned: " + $('#otherAppliances').val();
        }else{
            otherAppliance = "";
        }

        if ($('#otherFurniture').val().length > 0){
            otherFurniture = "Other furniture owned: " + $('#otherFurniture').val();
        }else{
            otherFurniture = "";
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

        var fOne = document.getElementById('f1').checked;
        var fTwo = document.getElementById('f2').checked;
        var fThree = document.getElementById('f3').checked;
        var fFour = document.getElementById('f4').checked;
        var fFive = document.getElementById('f5').checked;

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

            else if (box1 == false && box2 == false && box3 == false && box4 == false && box5 == false && box6 == false && box7 == false && box8 == false && box9 == false && box10 == false && box11 == false && box12 == false) {
            alert ('You didn\'t choose any of the appliances. Please choose at least one appliance to proceed.');
            error++;
            return false;
            }

            else if (fOne == false && fTwo == false && fThree == false && fFour == false && fFive == false) {
            alert ('You didn\'t choose any of the furniture. Please choose at least one furniture to proceed.');
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

            else if (document.getElementById("otherFurniture").disabled == false && document.getElementById("otherFurniture").value == ''){
            alert ('If others, text field that corresponds to furniture must be filled in.');
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

                //getting values from dropdown and text field of ethnic
                if (ethnic.value == "Others"){
                    finalEthnic = $('#ethnicInput').val();
                }
                else{
                    finalEthnic = $('#ethnicSlct').val();
                }

                //getting values from dropdown and text field of religion
                if (myReligion.value == "Other Christian groups"){
                    finalReligion = $('#religionTwo').val();
                }
                else{
                    finalReligion = $('#religion').val();
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
        
        var c1 = $('#chckbx1:checked').val();
        var c2 = $('#chckbx2:checked').val();
        var c3 = $('#chckbx3:checked').val();
    
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
            if(sibling.length < 1 && sib.length < 1){
                finalSibling = "None";
            }
            else{
                finalSibling = sib.join(", ") + '<br>(' + sibling.join(", ") + ')';
            }

            
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

            if (count >= 0){
                handedness = [];
                $.each($("input[name='chk4[]']:checked"), function(){            
                handedness.push($(this).val());
            });
            count++;
            }

            if($('#status').val() == "Married"){
                mStatus = "Married to " + $('#spouse').val();
            }
            else{
                mStatus = $('#status').val();
            }

            if ($('#s1').val() == 'DDN' || $('#ss1').val() == 'DDN')
            {
                province = 'Davao del Norte';
            }

            permanent = $('#shouseNumber').val() + ' ' + $('#s3').val() + ', ' + $('#s2').val() + ', ' + $('#s1').val();
            present = $('#sshouseNumber').val() + ' ' + $('#ss3').val() + ', ' + $('#ss2').val() + ', ' + $('#ss1').val();

            if (noEmail == "") {
                noEmail = "N/A";
            }

            var b = document.getElementById('board').checked;

            if (b == true) {
                boardAddress = "(Boarding house address)";
            }

        var fields = new Array(
            '______________________________________',
            $('#type').val(),
            $('#schoolYear').val() + ', ' + $('#semester').val(),
            $('#lname').val() + ', ' + $('#fname').val() + ' ' + $('#mname').val(),
            permanent,
            present + " " + boardAddress,
            $('#course').val(),
            $('#nominee_one_dob').val() + ' (' + $('#age').val() + ' years old)',
            $('#gender').val(),
            mStatus,
            $('#nationality').val(),
            $('#height').val(),
            $('#weight').val(),
            finalSibling,
            $('#sibling2').val(),
            $('#hsGraduated').val() + ', '+ $('#yearGrad').val(),
            $('#hsType').val(),
            $('#stanine').val(),
            $('#email').val(),
            $('#contact').val(),
            '______________________________________',
            finalEthnic,
            $('#fatherEd').val() + ' (' + $('#fAttain').val() +') <br>' + $('#occupationF').val(),
            $('#motherEd').val() + ' (' + $('#mAttain').val() +') <br>' + $('#occupationM').val(),
            finalReligion,
            dialect.join(", ") + "<br>" + otherDialect,
            skills.join(", ") + "<br>" + otherSkills,
            disability.join(", ") + "<br>" + otherDisability,
            handedness.join(", "),
            problems.join(", ") + "<br>" + otherProblems,
            '______________________________________',
            $('#income').val(),
            $('#house').val(),
            $('#lot').val(),
            finalLight,
            $('#water').val(),
            $('#toilet').val(),
            finalTransport,
            favorite.join(", ") + "<br>" + otherAppliance,
            furniture.join(", ") + "<br>" + otherFurniture
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

$('#submit_fourth').click(function(){
       $(function()
{
        $.post("validate.php",
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
                height: $('#height').val(),
                weight: $('#weight').val(),
                siblingsName: sib.join(", "),
                siblingsEduc: sibling.join(", "),
                numSibling: $('#sibling2').val(),
                hs: $('#hsGraduated').val(),
                yearGrad: $('#yearGrad').val(),
                hstype: $('#hsType').val(),
                stanine: $('#stanine').val(),
                email: $('#email').val(),
                contact: $('#contact').val(),
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
                otherProblems: $('#otherProblems').val(),
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
            window.location.href = "savedProfile.php";
        });
    });
    });
});