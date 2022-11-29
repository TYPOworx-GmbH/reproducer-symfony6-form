<?php
namespace App\Controller;

use App\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    #[Route('/')]
    public function index (Request $request) : Response
    {
        $entity = new Address();

        $form = $this->createFormBuilder($entity)
            ->add('firstname', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->getForm()
        ;

        return $this->render(
            'example.html.twig', [
               'form' => $form->createView()
            ]
         );
    }
}