<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {

        return Dashboard::new()
            // the name visible to end users
            ->setTitle('ADMIN PAGE.')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img src="https://thekreativezone.com/main/wp-content/uploads/2018/01/logo-design2.jpg" style="width: 50px;height: 50px;"> ACME <span class="text-small">Corp.</span>')
            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')
            // etc.
            ;
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        //yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);

        return [
            MenuItem::linkToDashboard('Dashboard', 'fa-home'),

            MenuItem::section('Blog'),
            //MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
//            MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

//            MenuItem::section('Users'),
//            MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
//            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
