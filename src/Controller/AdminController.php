<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    #[Route('/admin/chartsadmin', name: 'chartsadmin')]
    public function charts() : Response
    {
        return $this->render('admin/charts/chartjs.html.twig');
    }
    #[Route('/admin/doc', name: 'doc')]
    public function doc() : Response
    {
        return $this->render('admin/documentation/documentation.html.twig');
    }
    #[Route('/admin/form', name: 'form')]
    public function form() : Response
    {
        return $this->render('admin/forms/basicelements.html.twig');
    }
    #[Route('/admin/icon', name: 'icon')]
    public function icon() : Response
    {
        return $this->render('admin/icons/mdi.html..twig');
    }
    #[Route('/admin/eror404', name: 'eror404')]
    public function eror404() : Response
    {
        return $this->render('admin/samples/error-404.html.twig');
    }
    #[Route('/admin/error-500', name: 'error500')]
    public function error500() : Response
    {
        return $this->render('admin/samples/error-500.html.twig');
    }
    #[Route('/admin/tables', name: 'tables')]
    public function tables() : Response
    {
        return $this->render('admin/tables/basictable.html.twig');
    }
    #[Route('/admin/button', name: 'button')]
    public function button() : Response
    {
        return $this->render('admin/ui-features/buttons.html.twig');
    }
    #[Route('/admin/dropdowns', name: 'dropdowns')]
    public function dropdowns() : Response
    {
        return $this->render('admin/ui-features/dropdowns.html.twig');
    }
    #[Route('/admin/typography', name: 'typography')]
    public function typography() : Response
    {
        return $this->render('admin/ui-features/typography.html.twig');
    }
}
