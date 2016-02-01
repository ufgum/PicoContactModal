Pico Contact Formular For Bootstrap Opens In Modal Window View
===================================================

Pico v.1.0 - ready!

Provides an online contact formular only for bootstrap driven sites.
I use bootstrap 3.1.1, but it should also run on newer versions


Install
-------

1. Extract a copy of the files to the folder "PicoContactModal" into your Pico install "plugins" folder. 
2. Place the following in your `config/config.php` file an insert your data
```
    // Modal Contact Form Configuration
    $config[ 'PicoContactModal' ] = [ 'enabled' => TRUE,
                                      // description in the modal above the form fields      
                                      'TitleH4' => 'Kontakt aufnehmen',
                                      'IntroTextForLaregeScreens' => 'Bitte füllen Sie folgende Formular Felder aus und klicken dann auf "jetzt senden". Bei erfolgeicher Übermittlung der Nachricht, bekommen Sie eine  Bestätigung eingeblendet.',
                                      'SubIntroTextForAllScreens' => 'Wir freuen uns auf Ihre Nachricht.',
                                      // text description left of the form fields      
                                      'TextForNameField' => 'Ihr Name',
                                      'TextForEmailField' => 'E-Mail Adresse',
                                      'TextForMessageField' => 'Ihre Nachricht',
                                      'TextOnSubmitButton' => 'jetzt senden',
                                      // error massages below the input fields      
                                      'MissingName' => 'Bitte ihren Namen eintragen',
                                      'MissingEmailAddress' => 'Bitte E-Mail Adresse angeben',
                                      'WrongEmailAddress' => 'Schreibfehler der E-Mail Adresse',
                                      'MissingMessage' => 'Bitte eine Nachricht schreiben',
                                      // alert messages after form is send 
                                      'MessageSendSuccessHeading' => 'Nachricht erfolgreich übertragen!',
                                      'MessageSendSuccessText' => 'Danke für Ihre Nachricht. Wir werden Ihr Anliegen zeitnah bearbeiten.',
                                      'MessageServerErrorHeading' => 'Server Fehler!',
                                      'MessageServerErrorText' => 'Bitte rufen Sie uns an und lassen Sie uns den Fehler wissen.',
                                      // the e-mail you will recive with contact information
                                      'MyMailSubject' => 'my company - Anfrage über Formular',
                                      'MyMailSomeSenderName' => 'Server - my.domain',
                                      'MyMailToAddress' => 'your@email.de',
                                      'MyMailLineDescForName' => 'Name:',
                                      'MyMailLineDescForEmail' => 'E-Mail:',
                                      'MyMailLineDescForMEssage' => 'Comment:' ];

```

3. uncomment bootstrap-alert in your index.html file within the themes/bootstrap/ folder, if not already uncommented
```
    <script src="{{ theme_url }}/assets/js/bootstrap/alert.js"></script>
```
    
4. to call the contact form, just enclose the text or button or anything else between %contact_start% and %contact_end%, eg:
```
%contact_start%get in touch%contact_end%
```

5. Thats it, have fun    :)

---
hope you like this. if something goes wrong, ask me
