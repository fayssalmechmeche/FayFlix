<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DownloadController extends AbstractController
{
    #[Route('/download', name: 'app_download')]
    public function download(): Response
    {
        $version = time();
        return $this->render('download/index.html.twig', [
            'version' => $version
        ]);
    }
}
