<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

final class HugoController extends AbstractController{
    #[Route('/hugo', name: 'app_hugo')]
    public function index(): Response
    {
        return $this->render('hugo/index.html.twig', [
            'controller_name' => 'HugoController',
        ]);
    }

    #[Route('/cv', name: 'cv')]
    public function cv(): Response
    {
        return $this->render('hugo/cv.html.twig', [
            'controller_name' => 'HugoController',
        ]);
    }

    #[Route('/eportfolio', name: 'eportfolio')]
    public function eportfolio(): Response
    {
        return $this->render('hugo/eportfolio.html.twig', [
            'controller_name' => 'HugoController',
        ]);
    }

    #[Route('/infosup', name: 'infosup')]
    public function infosup(): Response
    {
        return $this->render('hugo/infosup.html.twig', [
            'controller_name' => 'HugoController',
        ]);
    }

    #[Route('/mecontacter', name: 'mecontacter')]
    public function mecontacter(): Response
    {
        return $this->render('hugo/mecontacter.html.twig', [
            'controller_name' => 'HugoController',
        ]);
    }

    #[Route("/download", name: "download_pdf")]
    public function downloadPdf(): Response
    {
        // Nom du fichier
        $fileName = 'CV_Hugo_BERTIN.pdf';
        
        // Chemin complet du fichier
        $filePath = $this->getParameter('kernel.project_dir') . '/templates/hugo/' . $fileName;

        // Vérification si le fichier existe
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException("Le fichier $fileName est introuvable.");
        }

        // Retourne le fichier pour téléchargement
        return $this->file($filePath, $fileName, ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }
}