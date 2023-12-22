<?php 

namespace Application\Controller;

use mikehaertl\pdftk\Pdf;

class GeneratePdf extends Module
{
    // Fonction pour générer le pdf entreprise 
    // avec $data correspondant à la donnée json
    public function entrepriseGenerate($data)
    {
        $pdfEG = new Pdf('./pdf/cerfa_16216_01.pdf');
        $pdfEG->fillForm(
            $data
        )
        ->needAppearances()
        ->execute();
        return $pdfEG;
    }

    // Fonction pour envoyer le résultat au client 
    // avec $result correspondant aux pdf génerer dans la méthode avec entrepriseGenerate($data)
    // Utilisation : $pdfGenerator = new Application\Controller\GeneratePdf();
    //               $result = $pdfGenerator->entrepriseGenerate($data);
    //               $pdfGenerator->entrepriseSend($result);
    public function entrepriseSend($result)
    {
        $pdfIS = new Pdf($result);
        $pdfIS->saveAs('./new.pdf');
    }

    // Fonction pour générer le pdf particulier 
    // avec $data correspondant à la donnée json
    public function individualGenerate($data)
    {
        $pdfIG = new Pdf('./pdf/cerfa_11580_05.pdf');
        $resultIG = $pdfIG->fillForm(
            $data
        )
        ->execute();
    }

    // Fonction pour envoyer le résultat au client 
    // avec $result correspondant aux pdf génerer dans la méthode avec particulierGenerate($data)
    // Utilisation : $pdfGenerator = new Application\Controller\GeneratePdf();
    //               $result = $pdfGenerator->individualGenerate($data);
    //               $pdfGenerator->individualSend($result);
    public function individualSend($result)
    {
        $pdfES = new Pdf($result);
        $pdfES->send($result);
    }
}