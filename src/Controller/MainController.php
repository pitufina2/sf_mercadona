<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/main")
 */
class MainController extends Controller
{
    /**
     * @Route("/", name="main_index")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
        ]);
    }

    /**
     * @Route("/recibirform", name="recibir_formulario")
     */
    public function recibirFormulario(Request $request)
    {
        $codigopostal = $request->request->get('cp');
        if ($codigopostal == '46001') {
            return $this->redirectToRoute ('tienda_home');
        }
        else{
            return $this->redirectToRoute ('main_index');
        }
    }
}