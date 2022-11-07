<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DownloadController extends AbstractController
{
    #[Route('/download/{slug}', name: 'app_download')]
    public function index(): Response
    {
        return $this->render('download/index.html.twig', []);
    }
}
