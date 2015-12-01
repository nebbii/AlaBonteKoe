<?php

include_once ("include/config.php");

class Reservering extends Table
{
    protected $id;
    protected $naam;
    protected $email;
    protected $datum;
    protected $tijd;
    protected $aantalPersonen;
    protected $opmerking;
    public $table = "reserveringen";
    
    function __construct() 
    {
        
    }
            
    function setId($id)
    {
        $this->id = $id;
    }
    
    function setNaam($naam)
    {
        $this->naam = $naam;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setDatum($datum)
    {
        $this->datum = $datum;
    }
    
    function setTijd($tijd)
    {
        $this->tijd = $tijd;
    }
    
    function setAantalPersonen($aantalPersonen)
    {
        $this->aantalPersonen = $aantalPersonen;
    }
    
            
    function setOpmerking($opmerking)
    {
        $this->opmerking = $opmerking;
    }
    
    function getId()
    {
        return $this->id;
    }
    
    function getNaam()
    {
        return $this->naam;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function getDatum()
    {
        return $this->datum;
    }
    
    function getTijd()
    {
        return $this->tijd;
    }
    
    function getAantalPersonen()
    {
        return $this->aantalPersonen;
    }
    
            
    function getOpmerking()
    {
        return $this->opmerking;
    }
    
    function mailReservering()
    {
        $ontvanger = $this->email;
        $afzenderNaam = RESTAURANTMAILNAAM;
        $afzenderMail = RESTAUREANTMAIL;
        $onderwerp = "Dank voor uw reservering bij de uitgaanscentrum de Bonte Koe";
        $inhoud = "Beste $this->naam, <br />
                    <p>Bedankt voor uw reservering bij restaurant de Bonte Koe.</p>
                    
                    Wij hebben de volgende reservering ontvangen:<br />
                    <table>
                        <tr>
                            <td>Naam:</td>
                            <td>$this->naam</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>$this->email</td>
                        </tr>
                        <tr>
                            <td>Datum:</td>
                            <td>$this->datum</td>
                        </tr>
                        <tr>
                            <td>Tijd:</td>
                            <td>$this->tijd</td>
                        </tr>
                        <tr>
                            <td>Aantal Personen</td>
                            <td>$this->aantalPersonen</td>
                        </tr>
                        <tr>
                            <td>Opmerking:</td>
                            <td>$this->opmerking</td>
                        </tr>
                    </table>
                    <p>Mochten er gegevens niet kloppen, neem dan contact met ons op!</p>
                    <a href=\"http://www.facebook.com/uitgaanscentrumdebontekoe\" target=\"_blank\">
                    <img src=\"http://michelvolwater.nl/debontekoe.nl/imgages/facebook.png\" alt=\"Facebook\">
                    </a>";
        $header = "MIME-Version: 1.0' .\"\r\n";
        $header .= "Content-type: text/html; charset=iso-8859-1' . \"\r\n";
        $header .= "From: ". $afzenderNaam ." <". $afzenderMail .">\r\n";
    }
}



?>