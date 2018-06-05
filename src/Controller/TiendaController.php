<?php

namespace App\Controller;

use App\Entity\Producto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
     * @Route("/tienda")
     */
class TiendaController extends Controller
{
    /**
     * @Route("/", name="tienda_home")
     */
    public function index()
    {
        $productos = $this->getDoctrine()->getRepository(Producto::class)->findAll();

        return $this->render('tienda/index.html.twig', [
            'productos' => $productos,
            

        ]);
    }
}
