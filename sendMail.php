<?php
// path du dossier PHPMailer % fichier d'envoi du mail
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
// lance les classes de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
function sendmail($objet, $contenu, $destinataire) { 
// on crée une nouvelle instance de la classe
    $mail = new PHPMailer(true);
  // puis on l’exécute avec un 'try/catch' qui teste les erreurs d'envoi
  try {
    /* DONNEES SERVEUR */
    $mail->setLanguage('fr', 'vendor/phpmailer/phpmailerlanguage/');   
    $mail->isSMTP();                                                            // envoi avec le SMTP du serveur
$mail->Mailer = "smtp";
    $mail->Host       = 'smtp.gmail.com';                            // serveur SMTP
    $mail->SMTPAuth   = true;                                            // le serveur SMTP nécessite une authentification ("false" sinon)
    $mail->SMTPSecure = "tls";
    $mail->Username   = 'safaabid.12@gmail.com';     // login SMTP
    $mail->Password   = 'jeaimemaman';   
    $mail->Port       = 587;                                              
    /* DONNEES DESTINATAIRES */
    $mail->setFrom('safaabid.12@gmail.com', 'MedSol');  //adresse de l'expéditeur (pas d'accents)
    $mail->addAddress($destinataire, 'Safa');        // Adresse du destinataire (le nom est facultatif)
    $mail->isHTML(true);                                      // email au format HTML
    $mail->Subject = utf8_decode($objet);      // Objet du message (éviter les accents là, sauf si utf8_encode)
    $mail->Body    = $contenu;          // corps du message en HTML - Mettre des slashes si apostrophes
    $mail->send();
    return true;
  }
  // si le try ne marche pas > exception ici
  catch (Exception $e) {
    // echo "Le Message n'a pas été envoyé. Mailer Error: {$mail->ErrorInfo}"; // Affiche l'erreur concernée le cas échéant
    return false;
  }  
} // fin de la fonction sendmail
?>