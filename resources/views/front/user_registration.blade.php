@extends('front.layout.master')
@section('content')



<div id="breadcrumb">
    <a href="#">Home</a> &gt;
    <a href="#" class="hierarchyLink">User</a> &gt;
    <a href="#" class="current">Register</a></div>

<h2>Register</h2>


<div id="content">


    <form id="registerForm" method="post" action="welcome/save_user">

        <p>Fill in this form to register with this site.</p>

 <h3>Profile</h3>

 <table  width="100%">

            <tr valign="top">
                <td width="20%">
                   
                        Username *
                </td>
                <td width="80%" class="value"><input type="text" name="username" value="" id="username" size="20" maxlength="32" class="textField" /></td>
            </tr>
            <tr valign="top">
                <td></td>
                <td class="instruct">The username must contain only lowercase letters, numbers, and hyphens/underscores.</td>
            </tr>
            <tr valign="top">
                <td >
                   
                        Password *
                </td>
                <td class="value"><input type="password" name="password" value="" id="password" size="20" class="textField" /></td>
            </tr>

            <tr valign="top">
                <td></td>
                <td class="instruct">The password must be at least 6 characters.</td>
            </tr>


            <tr valign="top">
                <td>
                    
                        Full Name *
                </td>
                <td class="value"><input type="text" id="firstName" name="name" value="" size="20" maxlength="40" class="textField" /></td>
            </tr>





            <tr valign="top">
                <td>
                        Gender 
                </td>
                <td class="value">
                    <select name="gender" id="gender" size="1" class="selectMenu">
                        <option label="" value=""></option>
                        <option label="Male" value="Male">MALE</option>
                        <option label="Female" value="Female">FEMALE</option>
                        <option label="Other" value="Other">Other</option>

                    </select>
                </td>
            </tr>



            <tr valign="top">
                <td >
                   
                        Email *
                </td>
                <td class="value"><input type="text" id="email" name="email" value="" size="30" maxlength="90" class="textField" /> </td>
            </tr>
            <tr valign="top">
                <td >
                   
                       Additional Email *
                </td>
                <td class="value"><input type="text" id="email" name="additional_email" value="" size="30" maxlength="90" class="textField" /> </td>
            </tr>





            <tr valign="top">
                <td >
                    
                        Phone 
                </td>
                <td class="value"><input type="text" name="phone" id="phone" value="" size="15" maxlength="24" class="textField" /></td>
            </tr>


            <tr valign="top">
                <td >
                   
                        Country
                </td>
                <td class="value"><input type="text" name="country" id="country" value="" size="15" maxlength="24" class="textField" />
                    

           
                </td>
            </tr>



        </table>

        <br />
        <p><input type="submit" value="Register" class="button defaultButton" /> <input type="button" value="Cancel" class="button" onclick="document.location.href = 'http://www.irsbd.org'" /></p>

        <p><span class="formRequired">* Denotes required field</span></p>

    </form>

    <div id="privacyStatement">
        <h3>Privacy Statement</h3>
        <p>The names and email addresses entered in this journal site will be used exclusively for the stated purposes of this journal and will not be made available for any other purpose or to any other party.</p>
    </div>


@endsection