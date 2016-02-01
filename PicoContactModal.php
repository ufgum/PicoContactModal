<?php
/**
 * @id PicoContactModal.php 30.Jan.2016
 * 
 * a pico plugin, which provides a ready to use contact form
 *     only for installation with bootstrap. for other themes
 *     there has to made some changes to get it running.
 *     
 *
 * @author Uwe Fritz
 * @link http://www.edor.de
 * @copyright Copyright (c) 2016 edor.de (Uwe Fritz)
 * @license GPL
 */


final class PicoContactModal extends AbstractPicoPlugin
{
    /**
     * This plugin is enabled by default?
     *
     * @see AbstractPicoPlugin::$enabled
     * @var boolean
     */
    protected $enabled = false;

    /**
     * This plugin depends on ...
     *
     * @see AbstractPicoPlugin::$dependsOn
     * @var string[]
     */
    protected $dependsOn = array();
    
    // some text from config
    private $title;
    private $intro;
    private $subintro;
    private $name;
    private $email;
    private $message;
    private $buttontext;
    private $missingName;
    private $missingEmail;
    private $wrongEmail;
    private $missingMessage;
    private $successMessageHeading;
    private $successMessage;
    private $serverErrorMessageHeading;
    private $serverErrorMessage;
    private $myMailSubject;
    private $myMailSomeSenderName;
    private $myMailToAddress;
    private $myMailLineDescForName;
    private $myMailLineDescForEmail;
    private $myMailLineDescForMEssage;
    private $pluginPath;
    private $pagetitle;

    /**
     * Triggered after Pico has loaded all available plugins
     *
     * This event is triggered nevertheless the plugin is enabled or not.
     * It is NOT guaranteed that plugin dependencies are fulfilled!
     *
     * @see    Pico::getPlugin()
     * @see    Pico::getPlugins()
     * @param  object[] &$plugins loaded plugin instances
     * @return void
     */
    public function onPluginsLoaded(array &$plugins)
    {
        // your code
    }

    /**
     * Triggered after Pico has read its configuration
     *
     * @see    Pico::getConfig()
     * @param  mixed[] &$config array of config variables
     * @return void
     */
    public function onConfigLoaded(array &$config)
    {

        // your code
        $this->title = $config['PicoContactModal']['TitleH4'];
        $this->intro = $config['PicoContactModal']['IntroTextForLaregeScreens'];
        $this->subintro = $config['PicoContactModal']['SubIntroTextForAllScreens'];
        $this->name = $config['PicoContactModal']['TextForNameField'];
        $this->email = $config['PicoContactModal']['TextForEmailField'];
        $this->message = $config['PicoContactModal']['TextForMessageField'];
        $this->buttontext = $config['PicoContactModal']['TextOnSubmitButton'];
        $this->missingName = $config['PicoContactModal']['MissingName'];
        $this->missingEmail = $config['PicoContactModal']['MissingEmailAddress'];
        $this->wrongEmail = $config['PicoContactModal']['WrongEmailAddress'];
        $this->missingMessage = $config['PicoContactModal']['MissingMessage'];
        $this->successMessageHeading = $config['PicoContactModal']['MessageSendSuccessHeading'];
        $this->successMessage = $config['PicoContactModal']['MessageSendSuccessText'];
        $this->serverErrorMessageHeading = $config['PicoContactModal']['MessageServerErrorHeading'];
        $this->serverErrorMessage = $config['PicoContactModal']['MessageServerErrorText'];
        $this->myMailSubject = $config['PicoContactModal']['MyMailSubject'];
        $this->myMailSomeSenderName = $config['PicoContactModal']['MyMailSomeSenderName'];
        $this->myMailToAddress = $config['PicoContactModal']['MyMailToAddress'];
        $this->myMailLineDescForName = $config['PicoContactModal']['MyMailLineDescForName'];
        $this->myMailLineDescForEmail = $config['PicoContactModal']['MyMailLineDescForEmail'];
        $this->myMailLineDescForMEssage = $config['PicoContactModal']['MyMailLineDescForMEssage'];
        $this->pluginPath = $config[ 'base_url' ]."plugins/PicoContactModal/";
    }

    /**
     * Triggered after Pico has evaluated the request URL
     *
     * @see    Pico::getRequestUrl()
     * @param  string &$url part of the URL describing the requested contents
     * @return void
     */
    public function onRequestUrl(&$url)
    {
        // your code
    }

    /**
     * Triggered after Pico has discovered the content file to serve
     *
     * @see    Pico::getBaseUrl()
     * @see    Pico::getRequestFile()
     * @param  string &$file absolute path to the content file to serve
     * @return void
     */
    public function onRequestFile(&$file)
    {
        // your code
    }

    /**
     * Triggered before Pico reads the contents of the file to serve
     *
     * @see    Pico::loadFileContent()
     * @see    DummyPlugin::onContentLoaded()
     * @param  string &$file path to the file which contents will be read
     * @return void
     */
    public function onContentLoading(&$file)
    {
        // your code
    }

    /**
     * Triggered after Pico has read the contents of the file to serve
     *
     * @see    Pico::getRawContent()
     * @param  string &$rawContent raw file contents
     * @return void
     */
    public function onContentLoaded(&$rawContent)
    {
        // your code
    }

    /**
     * Triggered before Pico reads the contents of a 404 file
     *
     * @see    Pico::load404Content()
     * @see    DummyPlugin::on404ContentLoaded()
     * @param  string &$file path to the file which contents were requested
     * @return void
     */
    public function on404ContentLoading(&$file)
    {
        // your code
    }

    /**
     * Triggered after Pico has read the contents of the 404 file
     *
     * @see    Pico::getRawContent()
     * @param  string &$rawContent raw file contents
     * @return void
     */
    public function on404ContentLoaded(&$rawContent)
    {
        // your code
    }

    /**
     * Triggered when Pico reads its known meta header fields
     *
     * @see    Pico::getMetaHeaders()
     * @param  string[] &$headers list of known meta header
     *     fields; the array value specifies the YAML key to search for, the
     *     array key is later used to access the found value
     * @return void
     */
    public function onMetaHeaders(array &$headers)
    {
        // your code
    }

    /**
     * Triggered before Pico parses the meta header
     *
     * @see    Pico::parseFileMeta()
     * @see    DummyPlugin::onMetaParsed()
     * @param  string   &$rawContent raw file contents
     * @param  string[] &$headers    known meta header fields
     * @return void
     */
    public function onMetaParsing(&$rawContent, array &$headers)
    {
        // your code
    }

    /**
     * Triggered after Pico has parsed the meta header
     *
     * @see    Pico::getFileMeta()
     * @param  string[] &$meta parsed meta data
     * @return void
     */
    public function onMetaParsed(array &$meta)
    {
        // your code
        $this->pagetitle =  $meta['title'];
    }

    /**
     * Triggered before Pico parses the pages content
     *
     * @see    Pico::prepareFileContent()
     * @see    DummyPlugin::prepareFileContent()
     * @see    DummyPlugin::onContentParsed()
     * @param  string &$rawContent raw file contents
     * @return void
     */
    public function onContentParsing(&$rawContent)
    {
        // your code
    }

    /**
     * Triggered after Pico has prepared the raw file contents for parsing
     *
     * @see    Pico::parseFileContent()
     * @see    DummyPlugin::onContentParsed()
     * @param  string &$content prepared file contents for parsing
     * @return void
     */
    public function onContentPrepared(&$content)
    {
        // generate link
        $url_first = "<a href=\"#\" data-toggle=\"modal\" data-target=\"#contactModal\"><span class=\"glyphicon glyphicon-link\"></span>";
        $url_last = "</a>";
        $content = preg_replace('/\%contact_start%(.*?)\%contact_end%/', "{$url_first}$1{$url_last}" , $content);
    }

    /**
     * Triggered after Pico has parsed the contents of the file to serve
     *
     * @see    Pico::getFileContent()
     * @param  string &$content parsed contents
     * @return void
     */
    public function onContentParsed(&$content)
    {
        $title = $this->title;
        $intro = $this->intro;
        $subintro = $this->subintro;
        $name = $this->name;
        $email = $this->email;
        $message = $this->message;
        $buttontext = $this->buttontext;
        
        // your code
        $content .= "\n";
        $content .= <<<EOT
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="close">X</button>
                <h4 class="modal-title">$title</h4>
                <p class="hidden-xs">$intro
                </p>
                <p>$subintro</p>
            </div>
            <div class="modal-body">
                <div id="thanks"></div>
                <form id="contactForm" method="post" class="form-horizontal" action="">
                    <div class="form-group">
                    <label for="yname" class="col-md-3 control-label">$name</label>
                        <div class="col-md-8">
                        <input type="text" name="yname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-md-3 control-label">$email</label>
                        <div class="col-md-8">
                        <input type="email" name="email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-md-3 control-label">$message</label>
                        <div class="col-md-8">
                        <textarea name="message" class="form-control" /></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="send" value="true">
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                        <button type="submit" class="btn btn-success"><i
                        class="glyphicon glyphicon-hand-right"></i>$buttontext</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
EOT;


        $subject = $this->myMailSubject;
        $senderName = $this->myMailSomeSenderName;
        $emailTo = $this->myMailToAddress;
        $lineName = $this->myMailLineDescForName;
        $lineMail = $this->myMailLineDescForEmail;
        $lineComment = $this->myMailLineDescForMEssage;
        
        // are you a stupid bot?
        if ( isset( $_POST[ 'send' ] ) && !empty( $_POST[ 'name' ] ) ) {
            die();
        }

        //If the form is submitted
        if ( isset( $_POST[ 'yname' ] ) ) {

            //Check to make sure comments were entered -> last field first
            if ( trim( $_POST[ 'message' ] ) == '' ) {
                $hasError = TRUE;
                // somebody try to cheat
                die();
            }
            else {
                if ( function_exists( 'stripslashes' ) ) {
                    $comments = stripslashes( trim( $_POST[ 'message' ] ) );
                }
                else {
                    $comments = trim( $_POST[ 'message' ] );
                }
            }

            //Check to make sure sure that a valid email address is submitted -> then second fieled
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

            if ( trim( $_POST[ 'email' ] ) == '' ) {
                $hasError = TRUE;
                // somebody try to cheat
                die();
            }
            else if ( !preg_match( $regex, trim( $_POST[ 'email' ] ) ) ) {
                $hasError = TRUE;
                // somebody try to cheat
                die();
            }
            else {
                $email = trim( $_POST[ 'email' ] );
            }

            //Check to make sure that the name field is not empty -> now the first field
            if ( trim( $_POST[ 'yname' ] ) == '' ) {
                $hasError = TRUE;
                // somebody try to cheat
                die();
            }
            else {
                $name = trim( $_POST[ 'yname' ] );
            }

            //If there is no error, send the email
            if ( !isset( $hasError ) ) {
                $body = "$lineName $name \n\n$lineMail $email \n\n\n$lineComment\n$comments";
                $headers = 'From: '.$senderName.' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

                if ( $this->pagetitle != "contactFormTest" ) mail($emailTo, $subject, $body, $headers);
            }
        }
    }

    /**
     * Triggered before Pico reads all known pages
     *
     * @see    Pico::readPages()
     * @see    DummyPlugin::onSinglePageLoaded()
     * @see    DummyPlugin::onPagesLoaded()
     * @return void
     */
    public function onPagesLoading()
    {
        // your code
    }

    /**
     * Triggered when Pico reads a single page from the list of all known pages
     *
     * The `$pageData` parameter consists of the following values:
     *
     * | Array key      | Type   | Description                              |
     * | -------------- | ------ | ---------------------------------------- |
     * | id             | string | relative path to the content file        |
     * | url            | string | URL to the page                          |
     * | title          | string | title of the page (YAML header)          |
     * | description    | string | description of the page (YAML header)    |
     * | author         | string | author of the page (YAML header)         |
     * | time           | string | timestamp derived from the Date header   |
     * | date           | string | date of the page (YAML header)           |
     * | date_formatted | string | formatted date of the page               |
     * | raw_content    | string | raw, not yet parsed contents of the page |
     * | meta           | string | parsed meta data of the page             |
     *
     * @see    DummyPlugin::onPagesLoaded()
     * @param  array &$pageData data of the loaded page
     * @return void
     */
    public function onSinglePageLoaded(array &$pageData)
    {
        // your code
    }

    /**
     * Triggered after Pico has read all known pages
     *
     * See {@link DummyPlugin::onSinglePageLoaded()} for details about the
     * structure of the page data.
     *
     * @see    Pico::getPages()
     * @see    Pico::getCurrentPage()
     * @see    Pico::getPreviousPage()
     * @see    Pico::getNextPage()
     * @param  array[]    &$pages        data of all known pages
     * @param  array|null &$currentPage  data of the page being served
     * @param  array|null &$previousPage data of the previous page
     * @param  array|null &$nextPage     data of the next page
     * @return void
     */
    public function onPagesLoaded(
        array &$pages,
        array &$currentPage = null,
        array &$previousPage = null,
        array &$nextPage = null
    ) {
        // your code
    }

    /**
     * Triggered before Pico registers the twig template engine
     *
     * @return void
     */
    public function onTwigRegistration()
    {
        // your code
    }

    /**
     * Triggered before Pico renders the page
     *
     * @see    Pico::getTwig()
     * @see    DummyPlugin::onPageRendered()
     * @param  Twig_Environment &$twig          twig template engine
     * @param  mixed[]          &$twigVariables template variables
     * @param  string           &$templateName  file name of the template
     * @return void
     */
    public function onPageRendering(Twig_Environment &$twig, array &$twigVariables, &$templateName)
    {
        // your code
    }

    /**
     * Triggered after Pico has rendered the page
     *
     * @param  string &$output contents which will be sent to the user
     * @return void
     */
    public function onPageRendered(&$output)
    {
        // your code
        $missingName = $this->missingName;
        $missingEmail = $this->missingEmail;
        $wrongEmail = $this->wrongEmail;
        $missingMessage = $this->missingMessage;
        $successMessageHeading = $this->successMessageHeading;
        $successMessage = $this->successMessage;
        $serverErrorMessageHeading = $this->serverErrorMessageHeading;
        $serverErrorMessage = $this->serverErrorMessage;
        
        $pluginPath = $this->pluginPath;
        
        // css in head
        $head = "\n";
        $head .= '<link href="'.$pluginPath.'assets/css/bootstrapValidator.min.css" rel="stylesheet">';
        $head .= "\n";
        $head .= "</head> ";
        $head .= "\n";
        $output = preg_replace('/(.*<\s*\/head[^>]*>)/i', $head, $output);
        
        
        $alertContainer = <<<EOT
<body>        
<div id="hideOnLoad" style="visibility: hidden;">
<div class="hidden-xs" style="position: fixed; left: 50%; top: 120px; margin: 10px; z-index: 2000;">
<div style="left: -50%; position: relative;">
    <div id="formResultContainer" class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" title="close">X</span></button><h4 id="formResultHeadingSmall"></h4> 
        <p id="formResultText"></p>
</div>
</div>
</div>
<div class="visible-xs" style="position: fixed; margin: 10px;  top: 80px; z-index: 2000;">
    <div id="formResultContainerSmall" class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">X</span></button><h4 id="formResultHeading"></h4>
        <p id="formResultTextSmall"></p>
</div>
</div>
</div>
EOT;
        $output .= "\n";
        $output = preg_replace('/(.*<\s*body[^>]*>)|(<\s*\/\s*body\s*\>.+)/i', $alertContainer, $output);
        $output .= "\n";
        

        $js = <<<EOT
<!--old and free (MIT lisenced) version of bootstrapValidator from: https://github.com/nghuuphuoc/bootstrapvalidator  -->      
<script src="{$pluginPath}assets/js/bootstrapValidator.min.js"></script>        
<script>
$(document).ready(function() {
    $('#contactModal').on('show.bs.modal', function() {
        $('#contactForm').bootstrapValidator('resetForm', true);
    });

    $('#contactForm').bootstrapValidator({
        message: 'This value is not valid',
        excluded: [':disabled'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitHandler: function(validator, form, submitButton) {

            $.ajax({
                type: "POST",
                url: "",
                data: $('#contactForm').serialize(),
                success: function () {
                    $("#contactModal").modal('hide');
                    // make success class
                    document.getElementById("formResultContainer").className = "alert alert-success alert-dismissible fade in";
                    document.getElementById("formResultContainerSmall").className = "alert alert-success alert-dismissible fade in";
                    // show the result div
                    document.getElementById("hideOnLoad").style.visibility = "visible";
                    formResultHeading.textContent = "$successMessageHeading";
                    formResultHeadingSmall.textContent = "$successMessageHeading";
                    formResultText.textContent = "$successMessage";
                    formResultTextSmall.textContent = "$successMessage";
                    
                },
                error: function () {
                    // show the result div
                    document.getElementById("hideOnLoad").style.visibility = "visible";
                    formResultHeading.textContent = "$serverErrorMessageHeading";
                    formResultHeadingSmall.textContent = "$serverErrorMessageHeading";
                    formResultText.textContent = "$serverErrorMessage";
                    formResultTextSmall.textContent = "$serverErrorMessage";
                }
            });
        },
        fields: {
            yname: {
                validators: {
                    notEmpty: {
                        message: '$missingName'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: '$missingEmail'
                    },
                    emailAddress: {
                        message: '$wrongEmail'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: '$missingMessage'
                    }
                }
            }
        }
    });
});
</script>
</body>
EOT;

        
        
        $output .= "\n";
        $output = preg_replace('/(.*<\s*\/body[^>]*>)/i', $js, $output);
        $output .= "\n";
    }
}
