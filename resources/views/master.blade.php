<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?> | International Journal of Innovative Research</title>
        <meta name="description" content="International Journal of Innovative Research (IJIR) is an open-access triannual (three times in a year), peer-reviewed and multidisciplinary journal devoted to publication of original research articles, short communication and reviews on all aspects of innovative research. It is published by the Innovative Research Syndicate (IRS). " />
        <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">

        <meta name="description" content="The International Journal of Innovative Research (IJER) is a periodically published journal of eSci Journals Publishing." />
        <meta name="keywords" content="entomology, entomology journal, insect biodiversity, medical entomology, human entomology, plant entomology" />
        <meta name="generator" content="Open Journal Systems 2.4.8.1" />
        <link rel="icon" type="images/ico" href="<?php echo base_url(); ?>images/favicon.png">

        <link rel="stylesheet" href="<?php echo base_url()?>css/vanilla.css" type="text/css" />


    </head>
    <body id="pkp-common-openJournalSystems">
        <div id="container">

            <div id="header">
                <div id="headerTitle">
                    <?php foreach ($cover_image as $v_image) { ?>
                        <h1>
                            <img src="<?php echo base_url(); ?><?php echo $v_image->image_location; ?>" width="1100" height="163" alt="International Journal of Innovative Research" />
                        </h1>
                    <?php } ?>
                </div>
            </div>

            <div id="body">

                <div id="sidebar">
                    <div id="leftSidebar">
                        <div class="block" id="sidebarUser">
                            <span class="blockTitle">Journal Menu</span>


                            <ul class="sidemenu">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url() ?>welcome/manuscript_submission">Manuscript Submission </a></li>
                                <li><a href="<?php echo base_url() ?>welcome/author_guidelines">Author Guidelines</a></li>
                                <li><a href="<?php echo base_url() ?>welcome/help_desk">Help Desk</a></li>
                            </ul>

                        </div>
                        <div class="block" id="sidebarUser">
                            <span class="blockTitle">Current Issue</span> <?php foreach ($banner_image as $v_banner) { ?>
                                <p align="justify"> <img  src="<?php echo base_url(); ?><?php echo $v_banner->image_location; ?>" width="160" height="200" /><?php } ?>
                                </ul>
                                <br>
                                    <br>
                                        <span class="blockTitle">Wise Words</span>

                                        <?php foreach ($wise_word as $v_word) { ?>
                                            <hp>&quot;<?php echo $v_word->text ?>&quot;</p>
                                            <p class="align-right">-<?php echo $v_word->writer ?></p>

                                        <?php } ?> 
                                        </div>
                                        </div>
                                        </div>
                <div id="sidebar">
                                        <div id="rightSidebar">

                                            <div class="block" id="sidebarUser">
                                                <span class="blockTitle"> &nbsp; Call For Paper</span>

                                                <p  margin-left="2px"><?php foreach ($call_paper as $v_paper) { ?>
                                                        <p align="justify">&quot;<?php echo $v_paper->text ?>&quot;</p>


                                                    <?php } ?> </p>
                                                <p>  </p>

                                            </div>
                                            
                                            <div class="block" id="sidebarUser">
                                                <span class="blockTitle">User</span>

                                                <form method="post" action="<?php echo base_url() ?>user/check_user_login">
                                                    <table>
                                                        <tr>
                                                            <td><label for="sidebar-username">Email</label></td>
                                                            <td><input type="text" id="sidebar-username" name="email" value="" size="12" maxlength="32" class="textField" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="sidebar-password">Password</label></td>
                                                            <td><input type="password" id="sidebar-password" name="password" value="" size="12" class="textField" /></td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"><input type="submit" value="Login" class="button" /></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                            
                                            <div class="block" id="sidebarNavigation">
                                                <span class="blockTitle"> &nbsp; Translate</span>

                                                <div id="google_translate_element"></div>

                                                <script type="text/javascript">
                                                  function googleTranslateElementInit() {
                                                   new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                                       }
                                                </script>

                                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                                            </div>

                                        </div>
                                      </div>
                                  
                                        <div id="main">
                                            <div id="navbar">
                                                <ul class="menu">
                                                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                                                    <li> <a href="<?php echo base_url() ?>welcome/irs_member">IRS Member</a></li>
                                                    <li> <a href="<?php echo base_url() ?>welcome/editorial_team">Editorial Team</a></li>
                                                    <li> <a href="<?php echo base_url() ?>welcome/current">Current</a></li>
                                                    <li> <a href="<?php echo base_url() ?>welcome/view">Archive</a></li>
                                                    <li> <a href="<?php echo base_url() ?>super_user/submit_paper">Submit Article</a></li>

                                                    <li> <a href="<?php echo base_url() ?>welcome/user_registration">Sign Up</a></li>
                                                    <li><a href="<?php echo base_url() ?>user">Login</a></li>
                                                    <li> <a href="<?php echo base_url() ?>welcome/contact">Contact</a></li></ul>
                                            </div>

                                            <div style="margin-left: 15px;margin-top: 15px;margin-right: 15px;"> <?php echo $maincontent; ?></div>


                                            <!-- /Google Analytics -->

                                            <h2> 	
                                                <br>
                                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                 <div id="footer">   International Journal of Innovative Research. <b>ISSN:2520-5919<b>  (Online),  (Print).<br> © IRS Executive Committee . All Rights Reserved.</h2></div>
                                                                                                                                                                                                        <!-- content -->
                                                  </div><!-- main -->
                                                         </div><!-- body -->

                                                  </div><!-- container -->
                                             </body>
                                                   </html>